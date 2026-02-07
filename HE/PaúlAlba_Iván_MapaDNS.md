---
title: "A08. Mapa DNS y Recopilación OSINT"
author: "Nombre del Alumno"
date: "Febrero 2026"
---

# Portada

**Asignatura:** Auditoría de Seguridad  
**Actividad:** A08 – Mapa DNS  
**Alumno:** *TU NOMBRE*  
**Curso:** *Curso / Grupo*  
**Fecha:** *Fecha de entrega*  

---

# Índice

1. [Introducción](#1-introducción)  
2. [Objetivo del Proyecto](#2-objetivo-del-proyecto)  
3. [Metodología y Herramientas](#3-metodología-y-herramientas)  
4. [Recopilación de Información](#4-recopilación-de-información)  
5. [Información Whois](#5-información-whois)  
6. [Análisis de Servidores DNS](#6-análisis-de-servidores-dns)  
7. [Servidores de Correo](#7-servidores-de-correo)  
8. [Búsqueda de Subdominios](#8-búsqueda-de-subdominios)  
9. [Información Adicional Relevante](#9-información-adicional-relevante)  
10. [Análisis y Justificación](#10-análisis-y-justificación)  
11. [Conclusión](#11-conclusión)

---

# 1. Introducción

En este trabajo realizo una primera fase de auditoría de seguridad utilizando técnicas de OSINT (Open Source Intelligence). El objetivo es recopilar información pública disponible en internet sobre la empresa “El POZO”, sin realizar ningún tipo de ataque ni acción intrusiva.

Como estudiante de ciberseguridad, este ejercicio me permite entender la importancia de la fase de reconocimiento, ya que antes de analizar o proteger un sistema es fundamental conocer qué información está expuesta públicamente.

---

# 2. Objetivo del Proyecto

El objetivo principal de esta actividad es aprender a recopilar información relevante sobre la infraestructura digital de una empresa mediante fuentes abiertas. A lo largo del trabajo se identifican datos de registro del dominio, servidores DNS, servidores de correo, subdominios y otra información pública que puede resultar útil en una auditoría de seguridad.

---

# 3. Metodología y Herramientas

Para la realización de este proyecto he utilizado una metodología basada en OSINT, apoyándome principalmente en el uso de comandos desde la terminal y servicios públicos accesibles desde internet. Todas las herramientas empleadas permiten obtener información sin necesidad de autenticación y de forma completamente legal.

Gran parte del proceso se ha documentado mediante capturas de pantalla, especialmente del uso del comando `whois`, para dejar constancia clara de los pasos realizados.

---

# 4. Recopilación de Información

La recopilación de información se ha llevado a cabo de forma progresiva, comenzando por los datos más generales del dominio y avanzando hacia información más específica como servidores de correo y subdominios. Esta forma de trabajo ayuda a construir poco a poco un mapa de la infraestructura expuesta públicamente.

---

# 5. Información Whois

La primera consulta realizada fue una búsqueda Whois del dominio principal de la empresa. Para ello utilicé el comando `whois` desde la terminal, que permite obtener información pública asociada al registro del dominio.

📸 **Captura 1 – Consulta Whois del dominio**

En esta captura debe verse el comando ejecutado y el resultado completo devuelto por la herramienta.


**[INSERTAR AQUÍ CAPTURA TERMINAL WHOIS DOMINIO]**

Tras analizar el resultado, me centré en localizar información relevante como el registrador, las fechas de creación y expiración y posibles referencias al proveedor de red.

📸 **Captura 2 – Detalle de información relevante del Whois**

**[INSERTAR AQUÍ CAPTURA DETALLE WHOIS]**

A partir de los datos obtenidos, realicé consultas adicionales sobre direcciones IP que aparecían asociadas al dominio.

📸 **Captura 3 – Consulta Whois sobre una dirección IP**


**[INSERTAR AQUÍ CAPTURA WHOIS IP]**

Este paso permite identificar qué entidad gestiona esa IP y obtener información adicional sobre la infraestructura.

---

# 6. Análisis de Servidores DNS

Después de obtener la información Whois, continué analizando los servidores DNS del dominio. Este análisis permite saber qué servidores se encargan de resolver los nombres asociados a la empresa.

📸 **Captura 4 – Identificación de servidores DNS**

**[INSERTAR AQUÍ CAPTURA DNS / NS]**

El uso de servidores DNS bien configurados es fundamental para el correcto funcionamiento y la seguridad del dominio.

---

# 7. Servidores de Correo

En esta fase analicé los servidores de correo electrónico asociados al dominio mediante la consulta de registros MX. Estos registros indican qué servidores reciben los correos de la empresa.

📸 **Captura 5 – Consulta de registros MX**

**[INSERTAR AQUÍ CAPTURA MX]**

El correo electrónico es un servicio crítico y suele ser uno de los principales objetivos en ataques de seguridad, por lo que su análisis resulta especialmente relevante.

---

# 8. Búsqueda de Subdominios

Posteriormente realicé una búsqueda de subdominios asociados al dominio principal. Estos subdominios pueden corresponder a distintos servicios ofrecidos por la empresa.

📸 **Captura 6 – Resultados de búsqueda de subdominios**

**[INSERTAR AQUÍ CAPTURA SUBDOMINIOS]**

El descubrimiento de subdominios ayuda a ampliar el conocimiento sobre la infraestructura expuesta públicamente.

---

# 9. Información Adicional Relevante

Además de la información técnica, busqué datos públicos adicionales como la presencia de la empresa en redes sociales o páginas corporativas. Esta información aporta contexto sobre la organización y puede ser útil en auditorías de tipo social.

📸 **Captura 7 – Presencia pública de la empresa**

**[INSERTAR AQUÍ CAPTURA WEB O RED SOCIAL]**

---

# 10. Análisis y Justificación

Toda la información recopilada durante esta fase es relevante para una auditoría de seguridad, ya que permite construir una visión general de la infraestructura digital de la empresa. El uso de Whois ayuda a identificar quién gestiona los recursos, los DNS muestran la estructura del dominio y los subdominios revelan posibles servicios adicionales.

Esta fase es clave antes de realizar análisis más técnicos o pruebas de seguridad.

---

# 11. Conclusión

Con la realización de este trabajo he aprendido a utilizar técnicas de OSINT para recopilar información pública de una empresa de forma ética y organizada. He comprobado que es posible obtener una gran cantidad de datos útiles sin necesidad de realizar acciones intrusivas.

Este ejercicio me ha permitido entender mejor la importancia de la fase de reconocimiento dentro de una auditoría de seguridad y me prepara para trabajos más avanzados en el ámbito de la ciberseguridad.

---

