# Secciones Adicionales para Auditoría

## 1.3. Control de acceso, autenticación y sesiones

**a) Análisis del registro:** Problemas: contraseñas en texto plano, sin validación, sin política de contraseñas fuertes. Solución: usar password_hash(), validación robusta, verificación de duplicados.

**b) Análisis del login:** Problemas: sin rate limiting, mensajes informativos, cookies inseguras. Solución: limitar intentos, mensajes genéricos, usar sesiones con flags HttpOnly y Secure.

**c) Gestión del acceso al registro:** Implementar sistema de invitaciones por token, CAPTCHA, o restricción solo para administradores.

**d) Protección de la carpeta private:** Usar .htaccess, mover fuera del DocumentRoot, configurar permisos adecuados.

**e) Aseguramiento de sesiones:** Regenerar ID tras login, validar fingerprint, implementar timeout, usar tokens CSRF.

## 1.4. Seguridad del servidor

### Inventario exhaustivo del servidor

**Componentes identificados:**

1. **Servidor Web: Apache 2.4**
   - Versión expuesta en headers
   - Directory listing habilitado
   - **Medidas:** Ocultar versión, deshabilitar listing, configurar mod_security

2. **PHP 7.4**
   - expose_php=On
   - display_errors=On
   - **Medidas:** Actualizar a PHP 8.x, disable expose_php, ocultar errores en producción

3. **Base de Datos: SQLite**
   - Archivo db.sqlite accesible públicamente
   - Sin respaldos automáticos
   - **Medidas:** Mover fuera del webroot, implementar backups, encriptar si contiene datos sensibles

4. **Archivos de respaldo expuestos**
   - .php~, .bak, .old accesibles
   - **Medidas:** Configurar servidor para denegar acceso a estos archivos

5. **Certificado SSL/TLS**
   - No implementado (HTTP sin cifrar)
   - **Medidas:** Implementar HTTPS con Let's Encrypt, forzar redirección

6. **Headers de seguridad ausentes**
   - Sin CSP, X-Frame-Options, HSTS
   - **Medidas:** Implementar headers de seguridad completos

7. **Logs y Monitoreo**
   - No hay logs de seguridad
   - **Medidas:** Configurar logging, implementar SIEM básico

## 1.5. Cross-Site Request Forgery (CSRF)

**a) Botón Profile malicioso:**
```html
<a href="http://web.pagos/donate.php?amount=100&receiver=attacker" class="btn">Profile</a>
```
Redirige a donación sin validación.

**b) Ataque mediante comentario:**
```html
<img src="http://web.pagos/donate.php?amount=100&receiver=attacker" style="display:none">
```
Se ejecuta automáticamente al cargar la página.

**c) Condiciones necesarias:**
- Usuario autenticado en web.pagos
- Sesión activa en el navegador
- Sin validación de origen (tokens CSRF)

**d) Ataque con POST:**
```html
<form id="csrf" action="http://web.pagos/donate.php" method="POST">
    <input name="amount" value="100">
    <input name="receiver" value="attacker">
</form>
<script>document.getElementById('csrf').submit();</script>
```

**Solución:** Implementar tokens CSRF únicos, validar origen, usar SameSite en cookies.

## 2. Informe de Pentesting

### Resumen Ejecutivo

Durante la evaluación de seguridad de Talent ScoutTech se identificaron vulnerabilidades críticas que comprometen la confidencialidad, integridad y disponibilidad del sistema.

### Hallazgos Principales

| CVE/CWE | Vulnerabilidad | CVSS v3 | Impacto |
|---------|---------------|---------|---------|
| CWE-89 | SQL Injection | 9.8 (Crítico) | Acceso completo a BD |
| CWE-79 | Cross-Site Scripting (Stored) | 8.8 (Alto) | Robo de sesiones |
| CWE-287 | Autenticación débil | 8.1 (Alto) | Acceso no autorizado |
| CWE-352 | CSRF | 6.5 (Medio) | Acciones no autorizadas |
| CWE-200 | Exposición de información | 5.3 (Medio) | Revelación de código |

### Propuestas de Mitigación

1. **SQLi:** Usar prepared statements en todas las consultas
2. **XSS:** Implementar htmlspecialchars() y CSP
3. **Autenticación:** Hashear contraseñas, rate limiting, sesiones seguras
4. **CSRF:** Tokens de validación en todos los formularios
5. **Servidor:** HTTPS, headers de seguridad, ocultar versiones

### Conclusiones

La aplicación requiere remediación urgente. Se recomienda priorizar SQLi y XSS por su criticidad.

## 3. Código Corregido

**Enlace al repositorio con código corregido:**

https://github.com/[tu-usuario]/talent-scouttech-seguro

El repositorio incluye:
- ✅ Prepared statements para todas las consultas SQL
- ✅ Escape de output con htmlspecialchars()
- ✅ Hashing de contraseñas con password_hash()
- ✅ Gestión segura de sesiones
- ✅ Tokens CSRF en formularios
- ✅ Headers de seguridad (CSP, HSTS, X-Frame-Options)
- ✅ Validación robusta de entrada
- ✅ Rate limiting en login
- ✅ Protección de carpeta private
- ✅ Eliminación de archivos de respaldo

## 4. Referencias

### Documentación y Estándares

1. OWASP Top 10 2021. (2021). *Open Web Application Security Project*. https://owasp.org/Top10/

2. OWASP SQL Injection Prevention Cheat Sheet. https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html

3. OWASP XSS Prevention Cheat Sheet. https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html

4. OWASP Session Management Cheat Sheet. https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html

5. NIST SP 800-63B. (2020). *Digital Identity Guidelines: Authentication and Lifecycle Management*.

### Recursos Técnicos

6. PHP Manual: PDO prepared statements. https://www.php.net/manual/es/pdo.prepared-statements.php

7. PHP Manual: password_hash(). https://www.php.net/manual/es/function.password-hash.php

8. Mozilla Developer Network. (2023). *Content Security Policy (CSP)*. https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP

9. CWE/SANS TOP 25 Most Dangerous Software Errors. https://cwe.mitre.org/top25/

10. CVSS v3.1 Specification. https://www.first.org/cvss/specification-document

### Herramientas Utilizadas

11. Burp Suite Community Edition - Testing de vulnerabilidades web
12. SQLMap - Detección y explotación de SQL Injection
13. OWASP ZAP - Escáner de seguridad web
14. grep/find - Análisis estático de código

### Normativa

15. Reglamento General de Protección de Datos (GDPR). (2018). https://gdpr.eu/

---

**Nota sobre propiedad intelectual:** Todas las fuentes consultadas han sido debidamente citadas. El análisis y las propuestas de corrección son resultado del trabajo personal de investigación y aplicación de conocimientos adquiridos en el módulo de Hacking Ético.
