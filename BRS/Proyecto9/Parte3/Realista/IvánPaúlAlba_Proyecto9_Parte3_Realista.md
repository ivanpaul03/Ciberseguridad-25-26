# Parte 3: Auditoría y Análisis Real de Seguridad SSL

***Fecha:*** 26 de abril de 2026<br>
***Autor:*** Iván Paúl Alba

---

## Índice
1. [Análisis de mi sitio web](#1-análisis-de-mi-sitio-web)
2. [¿Por qué mi certificado es válido?](#2-por-qué-mi-certificado-es-válido)
3. [Análisis de certificados erróneos](#3-análisis-de-certificados-erróneos)
4. [Conclusiones de la auditoría](#4-conclusiones-de-la-auditoría)

---

## 1. Análisis de mi sitio web
Para terminar la práctica, he querido poner a prueba mi servidor de AWS usando **SSL Labs**, que es como un "examen médico" para la seguridad de las webs. He metido mi dominio `ivan-proyecto-bastionado.duckdns.org` y, tras unos minutos de análisis, el resultado ha sido fantástico: ¡tengo una **A**!

Esto me da mucha tranquilidad porque significa que no solo tengo el candado puesto, sino que la configuración por dentro es robusta y segura contra ataques modernos.

**Captura de mi nota en SSL Labs:**
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/50395851-d195-41f7-8d85-f63e4cc5b104" />

## 2. ¿Por qué mi certificado es válido?
Según el análisis detallado que me ha dado la herramienta y lo que he aprendido en sitios como RedesZone, mi certificado se marca como **VÁLIDO** por estos motivos principales:

* **Confianza total:** Está firmado por una autoridad que todos los navegadores reconocen (Let's Encrypt), así que no hay alertas de "sitio no seguro".
* **Protocolos al día:** He configurado Nginx para que use TLS 1.2 y 1.3, evitando protocolos viejos que ya están rotos.
* **Fuerza del cifrado:** Las "llaves" que usamos para proteger los datos son largas y difíciles de romper para un atacante.

## 3. Análisis de certificados erróneos
Para entender mejor los peligros de internet, he usado la web `badssl.com` para analizar tres casos donde los certificados fallan. En estos casos, SSL Labs me da una **"T"** (error de confianza):

### Caso 1: Certificado Caducado (Expired)
He analizado una web cuyo certificado ya ha pasado su fecha de vencimiento. 
* **Por qué falla:** Los certificados tienen fecha límite para asegurar que el dueño sigue siendo quien dice ser. Si se pasa la fecha, el navegador bloquea la entrada por precaución.
  
<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/b433c9b0-14f7-455d-9f4f-15ce259685eb" />

### Caso 2: Certificado Auto-firmado (Self-signed)
En este caso, el certificado no lo ha dado ninguna entidad oficial, sino que lo ha creado el propio administrador.
* **Por qué falla:** Como no hay nadie externo que garantice quién es el dueño, el navegador no se fía. Es como si yo me fabrico mi propio carnet de identidad; no tiene validez oficial.

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/e96985c3-8dab-4fb1-8bd6-c45307f0fb90" />

### Caso 3: Entidad no reconocida (Untrusted Root)
Aquí el certificado lo firma alguien que no está en la lista de "autoridades de confianza" del navegador.
* **Por qué falla:** Es un error de cadena de confianza. Si el navegador no conoce a quien firma el certificado, considera que la conexión podría estar siendo interceptada.

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/59da5aeb-4cf8-4d56-ac39-ad8277871ff8" />

## 4. Conclusiones de la auditoría
Hacer estos escaneos me ha servido para ver la diferencia entre "tener un certificado" y "tenerlo bien puesto". Mi servidor en AWS ha pasado con nota porque nos hemos molestado en usar herramientas oficiales y configuraciones modernas. 

Ahora entiendo que cuando mi navegador me saca un aviso rojo, suele ser por uno de estos tres motivos que he analizado. ¡Práctica terminada y servidor seguro!
