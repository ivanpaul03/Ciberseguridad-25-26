# Talent ScoutTech

**Alumno:** Iván Paúl Alba  
**Fecha:** 28/12/2025

---

## 1. Introducción

En este proyecto he realizado una auditoría de seguridad web sobre la aplicación **Talent ScoutTech**, cuyo objetivo es gestionar jugadores deportivos y permitir a los usuarios añadir comentarios sobre ellos.

El trabajo se ha centrado en identificar vulnerabilidades reales presentes en el código y en la configuración de la aplicación.  

---

## 2. SQL Injection (SQLi)

### 2.1. Error provocado en el formulario de login

Al acceder a la aplicación sin estar autenticado, aparece el formulario de login gestionado por `private/auth.php`.

Probé a introducir un carácter especial en el campo usuario:

- **Usuario:** `'`
- **Contraseña:** cualquiera

La aplicación devuelve un mensaje de error de base de datos indicando una consulta inválida y mostrando el valor introducido por el usuario.

> **[CAPTURA 1]**: Mensaje de error SQL mostrado al introducir `'` en el campo usuario.

Esto demuestra que:
- El valor del usuario se concatena directamente en la consulta SQL.
- La consulta se rompe cuando se introduce un carácter no esperado.

La consulta que se ejecuta realmente es:

```sql
SELECT userId, password FROM users WHERE username = "<usuario>"
```

El campo vulnerable es `username`, mientras que la contraseña no forma parte de la consulta SQL, sino que se compara después en PHP.

### 2.2. Ataque usando un diccionario de contraseñas

Gracias a la SQL Injection anterior, sabemos que el formulario es vulnerable y que existe una tabla `users`.

Como no conocemos los usuarios registrados, el ataque consiste en:

- Forzar que la consulta devuelva algún usuario válido.
- Probar contraseñas comunes del diccionario.

La aplicación no tiene:

- Límite de intentos
- Bloqueo por fuerza bruta
- Hash de contraseñas

Esto permite acabar autenticado como un usuario válido (por ejemplo `luis`) si su contraseña es débil, como `1234`.

> **[CAPTURA 2]**: Resultado del ataque de fuerza bruta mostrando acceso exitoso.

### 2.3. Error en el uso de SQLite3::escapeString()

En la función `areUserAndPasswordValid()` se usa:

```php
$query = SQLite3::escapeString(
  'SELECT userId, password FROM users WHERE username = "' . $user . '"'
);
```

El error es que:

- Se está escapando la consulta completa, no los datos.
- La consulta sigue construyéndose mediante concatenación.
- Esto no evita SQL Injection.

**Cómo corregirlo:**

- Usar consultas preparadas.
- Separar el SQL de los datos del usuario.
- No comparar contraseñas en texto plano.

> **[CAPTURA 3]**: Código fuente mostrando el uso incorrecto de `SQLite3::escapeString()`.

### 2.4. Vulnerabilidad en add_comment.php~.php

Mediante fuerza bruta de nombres de archivo se puede acceder a `add_comment.php~.php`, que el servidor no interpreta y muestra como texto.

Al revisar el código se observa que:

- El `userId` se obtiene directamente de la cookie `$_COOKIE['userId']`.
- No se valida que esa cookie sea legítima.

**Ataque:**

- Modificar manualmente la cookie `userId`.
- Enviar un comentario.
- El comentario se guarda como si fuera de otro usuario.

Esto permite **suplantación de identidad**.

> **[CAPTURA 4]**: Código fuente de `add_comment.php~.php` mostrando el uso directo de `$_COOKIE['userId']`.

---

## 3. Cross Site Scripting (XSS)

### 3.1. Prueba de XSS en comentarios

Al añadir un comentario con código JavaScript, por ejemplo un `alert`, y acceder a `show_comments.php`, el código se ejecuta.

Esto ocurre porque el comentario se muestra directamente con:

```php
echo $row['body'];
```

Sin ningún tipo de filtrado.

> **[CAPTURA 5]**: Comentario con código JavaScript inyectado.

> **[CAPTURA 6]**: Ejecución del script mostrando un `alert` en el navegador.

### 3.2. Problema en show_comments.php

El problema principal es que:

- Se muestran datos introducidos por usuarios sin escapar.
- El navegador interpreta el contenido como HTML y JavaScript.

**Solución:**

- Escapar la salida con `htmlspecialchars()`.
- Nunca mostrar directamente datos de usuarios.

> **[CAPTURA 7]**: Código fuente de `show_comments.php` mostrando `echo $row['body'];` sin filtrado.

### 3.3. Otras páginas afectadas

Buscando páginas que muestran datos introducidos por usuarios, se observa que el mismo problema se repite en otras secciones donde se imprimen valores directamente desde la base de datos sin filtrado.

---

## 4. Control de acceso, autenticación y sesiones

### 4.1. Seguridad en el registro (register.php)

**Problemas detectados:**

- No se validan correctamente los datos.
- No se obliga a contraseñas seguras.
- Las contraseñas se almacenan en texto plano.

**Medidas necesarias:**

- Validación de campos.
- Uso de `password_hash()`.
- Reglas de contraseñas fuertes.

> **[CAPTURA 8]**: Código de `register.php` mostrando almacenamiento de contraseñas en texto plano.

### 4.2. Seguridad en el login

**Problemas:**

- No hay límite de intentos.
- Mensajes de error poco claros.
- Uso de cookies para credenciales.

**Mejoras:**

- Limitar intentos.
- Mensajes genéricos.
- Usar sesiones en lugar de cookies.

### 4.3. Acceso libre a register.php

Cualquier usuario puede acceder al registro, cuando la aplicación no debería permitirlo.

**Soluciones:**

- Restringir el acceso.
- Registro solo por administrador.
- Desactivar el registro público.

### 4.4. Protección de la carpeta private

En local, la carpeta `private` es accesible.

**Medidas:**

- Configurar Apache para bloquear el acceso.
- Usar `.htaccess`.
- Mover archivos sensibles fuera del directorio web.

> **[CAPTURA 9]**: Acceso directo a la carpeta `private` desde el navegador.

### 4.5. Gestión de sesiones

**Problemas detectados:**

- No se regeneran IDs de sesión.
- Se usan cookies inseguras.
- No hay flags de seguridad.

**Mejoras:**

- `session_regenerate_id()`.
- Cookies `HttpOnly` y `Secure`.
- Gestión correcta del logout.

---

## 5. Cross-Site Request Forgery (CSRF)

### 5.1. Botón malicioso "Profile"

Se puede modificar un jugador para añadir un formulario que envía al usuario a:

```
http://web.pagos/donate.php?amount=100&receiver=attacker
```

Al hacer clic, se realiza la acción sin validación.

> **[CAPTURA 10]**: Código del formulario malicioso inyectado en el perfil del jugador.

### 5.2. Ataque sin interacción del usuario

Mediante un comentario con carga automática (por ejemplo usando HTML), el ataque puede ejecutarse sin que el usuario haga clic en nada.

> **[CAPTURA 11]**: Ejemplo de ataque CSRF automático sin interacción del usuario.

### 5.3. Condición para que funcione

Para que la donación se realice:

- El usuario debe estar autenticado en `web.pagos`.
- Su sesión debe estar activa en el navegador.

**Solución real:**

- Uso de tokens CSRF únicos por sesión.
- Validación del origen de las peticiones.
- Implementación de SameSite en cookies.

---

## 6. Conclusiones

La aplicación Talent ScoutTech presenta múltiples vulnerabilidades graves que afectan a la autenticación, la integridad de los datos y la seguridad de los usuarios.

Este proyecto me ha servido para entender cómo errores básicos en el código pueden provocar problemas de seguridad importantes, y la importancia de aplicar buenas prácticas desde el inicio del desarrollo.
