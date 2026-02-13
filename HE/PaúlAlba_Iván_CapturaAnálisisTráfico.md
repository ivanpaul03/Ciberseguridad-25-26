<h1 align="center">A15 - Captura y Análisis de Tráfico</h1>

<h1 align="center"><img width="250" height="259" alt="image" src="https://github.com/user-attachments/assets/183857a0-6d67-4b7e-8209-5b0512cbcaae" /></h1>

***Fecha**: 13/02/2026  
**Autor**: Iván Paúl Alba

---

## Índice

1. [Introducción](#1-introducción)  
2. [POC 1 – Obtención de IP mediante llamada de Telegram](#2-poc-1--obtención-de-ip-mediante-llamada-de-telegram)  
3. [POC 2 – Captura de credenciales en autenticación web](#3-poc-2--captura-de-credenciales-en-autenticación-web)  
4. [POC 3 – Captura de credenciales del router en red local](#4-poc-3--captura-de-credenciales-del-router-en-red-local)  
5. [POC 4 – Captura de credenciales en conexión TELNET](#5-poc-4--captura-de-credenciales-en-conexión-telnet)  
6. [Conclusiones](#6-conclusiones)  

---

# 1. Introducción

En esta práctica he realizado varias pruebas de captura y análisis de tráfico de red utilizando Wireshark. El objetivo ha sido comprobar cómo, cuando las comunicaciones no están bien protegidas, es posible obtener información sensible como direcciones IP o credenciales de usuario.

Durante la práctica he aprendido cómo funciona el tráfico en una red y cómo se puede analizar fácilmente si no está cifrado. Todo se ha hecho en un entorno controlado y con fines educativos.

---

# 2. POC 1 – Obtención de IP mediante llamada de Telegram

En esta primera prueba he comprobado cómo se puede obtener la IP pública de otra persona realizando una llamada a través de Telegram cuando está activada la opción P2P.

Telegram utiliza el protocolo STUN, que permite descubrir la IP pública cuando se realiza una llamada directa entre dos personas.

## Proceso seguido

1. Activamos la opción Peer-to-peer (P2P) en Telegram.
2. Inicié la captura de tráfico con Wireshark.
3. Realicé una llamada a la otra persona.
4. Filtré en Wireshark por el protocolo STUN.
5. Busqué en los paquetes el campo donde aparece la dirección IP.

---

## Captura 1 – Llamada realizada

<img width="548" height="415" alt="image" src="https://github.com/user-attachments/assets/e21d562d-58d3-400c-8ab9-9252e1ace76f" />

---

## Captura 2 – Análisis en Wireshark (STUN)

En esta captura se debe ver:

- El protocolo STUN
- El mapeo de puertos
- El campo XOR-PEER-ADDRESS
- La IP detectada

<img width="959" height="539" alt="image" src="https://github.com/user-attachments/assets/2f8f1659-b6a8-4a03-9024-68aaadd6fea5" />

---

## Explicación

En los paquetes STUN aparece la dirección IP pública del otro participante. Si la persona usa VPN, aparecerá la IP de la VPN.

Esto demuestra que, si no se configuran bien las opciones de privacidad, es posible obtener la IP real simplemente realizando una llamada.

---

# 3. POC 2 – Captura de credenciales en autenticación web

En esta prueba he comprobado cómo se pueden capturar usuario y contraseña cuando una página web no utiliza HTTPS.

## 3.1 Captura de login y contraseña sin HTTPS

### Proceso seguido

1. Inicié captura en Wireshark.
2. Accedí a una página web sin HTTPS.
3. Introduje usuario y contraseña.
4. Filtré por protocolo HTTP.
5. Busqué el paquete donde se envían los datos del formulario.

En los paquetes HTTP se pueden ver claramente los campos:

- username
- password

---

## Captura – Credenciales en texto plano

<img width="1919" height="1079" alt="image" src="https://github.com/user-attachments/assets/c71d08a5-2c24-491f-8bd7-0e2e1d4ccf31" />


---

## 3.2 ¿Qué ocurre cuando la web usa HTTPS?

Cuando la página utiliza HTTPS, los datos viajan cifrados.

En Wireshark:

- No se puede leer el usuario ni la contraseña.
- Solo aparece tráfico TLS cifrado.
- El contenido del paquete no es entendible.

Esto demuestra la importancia de usar HTTPS en cualquier web.

---

# 4. POC 3 – Captura de credenciales del router en red local

Muchos routers permiten acceder mediante una página web interna (por ejemplo 192.168.1.1). Si esa página no usa HTTPS, las credenciales pueden viajar sin cifrar.

## Proceso seguido

1. Inicié captura en Wireshark.
2. Accedí al router desde el navegador.
3. Introduje usuario y contraseña.
4. Filtré por HTTP.
5. Busqué el paquete donde se enviaban los datos.

---

## Captura – Login del router

<img width="1919" height="1079" alt="image" src="https://github.com/user-attachments/assets/a60a4230-fec0-48a5-9749-7502aa7e8cf8" />

<img width="1911" height="1079" alt="image" src="https://github.com/user-attachments/assets/7184f132-bd0f-41fc-80a8-ff5736aa4f44" />

---

## Explicación

Si el acceso al router no está cifrado, cualquier persona conectada a la red podría interceptar esas credenciales.

Esto demuestra lo importante que es:

- Activar HTTPS en el router.
- Cambiar las contraseñas por defecto.

---

# 5. POC 4 – Captura de credenciales en conexión TELNET

TELNET es un protocolo antiguo que no cifra la información. Todo lo que se escribe viaja en texto plano.

## Proceso seguido

1. Inicié captura en Wireshark.
2. Establecí una conexión TELNET con otra máquina.
3. Introduje usuario y contraseña.
4. En Wireshark filtré por TELNET.
5. Busqué en los paquetes las credenciales enviadas.

---

## Captura – Credenciales en TELNET

[ESPACIO PARA CAPTURA DE PANTALLA – TRAFICO TELNET CON USER Y PASSWORD]


---

## Explicación

En los paquetes TELNET se puede leer directamente:

- Login
- Password

Esto demuestra que TELNET no es seguro y que hoy en día debería utilizarse SSH, que sí cifra la comunicación.

---

# 6. Conclusiones

Después de realizar estas pruebas he podido comprobar que:

- Si una comunicación no está cifrada, es muy fácil interceptar información sensible.
- Protocolos como HTTP o TELNET son inseguros.
- HTTPS y SSH protegen la información porque cifran los datos.
- En llamadas P2P de Telegram se puede obtener la IP pública si no se configura correctamente la privacidad.

Esta práctica me ha ayudado a entender mejor cómo funciona el tráfico en red y la importancia del cifrado para proteger la información.
