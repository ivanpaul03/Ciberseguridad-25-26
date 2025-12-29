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

<img width="959" height="413" alt="1" src="https://github.com/user-attachments/assets/3ef8619a-552e-4f5c-a2d1-9bb3e67078df" />

> Mensaje de error SQL mostrado al introducir `'` en el campo usuario.

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

<img width="959" height="539" alt="2" src="https://github.com/user-attachments/assets/76593c5e-9479-4b5f-8d59-7488358e9d49" />

> Resultado del ataque de fuerza bruta mostrando acceso exitoso.

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

<img width="624" height="317" alt="3" src="https://github.com/user-attachments/assets/9715f0ca-4cf5-4e5a-96b9-2d2742c4b03d" />

> Código fuente mostrando el uso incorrecto de `SQLite3::escapeString()`.

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

<img width="650" height="274" alt="4" src="https://github.com/user-attachments/assets/2c421967-3e96-4d63-a236-7dcb4660314c" />

> Código fuente de `add_comment.php~.php` mostrando el uso directo de `$_COOKIE['userId']`.

---

## 3. Cross Site Scripting (XSS)

### 3.1. Prueba de XSS en comentarios

Al añadir un comentario con código JavaScript, por ejemplo un `alert`, y acceder a `show_comments.php`, el código se ejecuta.

Esto ocurre porque el comentario se muestra directamente con:

```php
echo $row['body'];
```

Sin ningún tipo de filtrado.

<img width="959" height="539" alt="5" src="https://github.com/user-attachments/assets/67aa3203-1599-4ae7-8472-b49e8c1407fc" />

<img width="959" height="538" alt="5 2" src="https://github.com/user-attachments/assets/f641e7f1-354e-49bd-b799-88d759ac989f" />

> Comentario con código JavaScript inyectado.

<img width="959" height="539" alt="6" src="https://github.com/user-attachments/assets/d426777e-e17d-47cc-b112-243ab9cbe371" />

> Ejecución del script mostrando un `alert` en el navegador.

### 3.2. Problema en show_comments.php

El problema principal es que:

- Se muestran datos introducidos por usuarios sin escapar.
- El navegador interpreta el contenido como HTML y JavaScript.

**Solución:**

- Escapar la salida con `htmlspecialchars()`.
- Nunca mostrar directamente datos de usuarios.

<img width="695" height="248" alt="7" src="https://github.com/user-attachments/assets/5395154f-1d35-4231-8289-ba32221ae544" />

> Código fuente de `show_comments.php` mostrando `echo $row['body'];` sin filtrado.

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

<img width="470" height="266" alt="8" src="https://github.com/user-attachments/assets/f27054aa-271c-43a6-b88e-97fee5e494fb" />

> Código de `register.php` mostrando almacenamiento de contraseñas en texto plano.

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

<img width="959" height="539" alt="9" src="https://github.com/user-attachments/assets/35b37e8a-c942-4327-9daf-12e874d3113c" />

> Acceso directo a la carpeta `private` desde el navegador.

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

<img width="959" height="539" alt="10" src="https://github.com/user-attachments/assets/85a8dc2f-2e6c-42be-8785-d9eaf88a35f4" />

> Código del formulario malicioso inyectado en el perfil del jugador.

### 5.2. Ataque sin interacción del usuario

Mediante un comentario con carga automática (por ejemplo usando HTML), el ataque puede ejecutarse sin que el usuario haga clic en nada.

<img width="956" height="539" alt="11" src="https://github.com/user-attachments/assets/34e101b2-213c-42a4-b527-c14964a7af4e" />

> Ejemplo de ataque CSRF automático sin interacción del usuario.

### 5.3. Condición para que funcione

Para que la donación se realice:

- El usuario debe estar autenticado en `web.pagos`.
- Su sesión debe estar activa en el navegador.

**Solución real:**

- Uso de tokens CSRF únicos por sesión.
- Validación del origen de las peticiones.
- Implementación de SameSite en cookies.

---

## 6. Seguridad del Servidor

Durante la auditoría se analizaron todos los componentes del servidor que aloja la aplicación. Se identificaron 8 elementos con problemas de seguridad que requieren atención.

### 1. Servidor Web Apache

**Problema encontrado:** El servidor está revelando su versión exacta en cada respuesta, lo que facilita a los atacantes buscar vulnerabilidades específicas. Además, permite ver el contenido de las carpetas directamente desde el navegador.

**Solución:** Configurar el servidor para ocultar esta información y desactivar la visualización de carpetas. También se recomienda instalar un sistema de protección adicional tipo cortafuegos para aplicaciones web.

### 2. Lenguaje PHP

**Problema encontrado:** PHP está mostrando mensajes de error detallados cuando algo falla, revelando rutas internas y detalles del código. Además, la versión instalada ya no recibe actualizaciones de seguridad.

**Solución:** Configurar PHP para que los errores se guarden en archivos internos en lugar de mostrarse al usuario. Actualizar a una versión moderna que siga recibiendo parches de seguridad.

### 3. Base de Datos

**Problema encontrado:** El archivo que contiene toda la base de datos está ubicado en una carpeta pública y cualquiera puede descargarlo. No existen copias de seguridad.

**Solución:** Mover el archivo de base de datos fuera de las carpetas accesibles por internet y establecer permisos restrictivos. Crear un sistema de copias de seguridad automáticas.

### 4. Configuración de Seguridad del Navegador

**Problema encontrado:** El servidor no envía instrucciones de seguridad al navegador, dejándolo sin protecciones adicionales contra diversos tipos de ataques.

**Solución:** Configurar el servidor para que incluya instrucciones que le indiquen al navegador cómo proteger mejor al usuario, como forzar HTTPS siempre, evitar que la página se pueda incrustar en otros sitios, y restringir qué recursos puede cargar.

### 5. Registro de Actividad

**Problema encontrado:** No se están guardando registros detallados de lo que ocurre en el servidor, ni existe ningún sistema que detecte y bloquee ataques automáticamente.

**Solución:** Activar el registro completo de todas las peticiones y errores. Instalar un sistema que analice estos registros y bloquee automáticamente direcciones IP que muestren comportamiento sospechoso, como múltiples intentos de login fallidos.

### 6. Control de Acceso a la Red

**Problema encontrado:** Todos los puertos del servidor están abiertos a internet, exponiendo servicios innecesarios que podrían ser atacados.

**Solución:** Activar el cortafuegos del sistema y configurarlo para que solo permita el acceso a través de los puertos estrictamente necesarios para el funcionamiento de la aplicación web.

---

## 7. Informe de Pentesting

**Alcance de la evaluación:**
- Aplicación web completa (frontend y backend PHP)
- Configuración del servidor web (Apache 2.4 + PHP 7.4)
- Base de datos SQLite y gestión de datos
- Sistema de autenticación y gestión de sesiones
- Configuración de red y permisos del sistema

**Metodología aplicada:**
- **OWASP Testing Guide v4.2** - Framework de testing de seguridad web
- **PTES (Penetration Testing Execution Standard)** - Metodología de pentesting
- **Automated Scanning** - Herramientas: OWASP ZAP, Burp Suite Community

---

## 8. Referencias

### Estándares y Documentación Oficial

1. **OWASP Top 10 2021.** (2021). *Open Web Application Security Project*. Disponible en: https://owasp.org/Top10/

2. **OWASP SQL Injection Prevention Cheat Sheet.** Disponible en: https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html

3. **OWASP Cross Site Scripting Prevention Cheat Sheet.** Disponible en: https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html

4. **OWASP Session Management Cheat Sheet.** Disponible en: https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html

5. **OWASP CSRF Prevention Cheat Sheet.** Disponible en: https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html
