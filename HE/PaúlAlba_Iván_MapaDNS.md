<h1 align="center">Mapa DNS "EL POZO"</h1>

<p align="center">
  <img width="310" height="163" alt="image" src="https://github.com/user-attachments/assets/d4fe2181-82bf-4ee6-a2be-6a2a10abb392" />
</p>

**Actividad:** A08 – Mapa DNS  
**Alumno:** *Iván Paúl Alba*  
**Fecha:** *07/02/2026*  

---

## Índice

1. [Introducción](#1-introducción)  
2. [Objetivo del Proyecto](#2-objetivo-del-proyecto)  
3. [Metodología y Herramientas](#3-metodología-y-herramientas)  
4. [Información Whois](#4-información-whois)  
5. [Análisis de Servidores DNS](#5-análisis-de-servidores-dns)  
6. [Servidores de Correo](#6-servidores-de-correo)  
7. [Búsqueda de Subdominios](#7-búsqueda-de-subdominios)  
8. [Información Adicional Relevante](#8-información-adicional-relevante)  
9. [Análisis y Justificación](#9-análisis-y-justificación)  
10. [Conclusión](#10-conclusión)

---

## 1. Introducción

En este trabajo hago una primera fase de auditoría usando técnicas de OSINT. Básicamente consiste en recopilar información pública de "El POZO" que hay disponible en internet, sin hacer ningún ataque ni nada intrusivo.

Este ejercicio me sirve para entender lo importante que es la fase de reconocimiento antes de cualquier auditoría de seguridad.

---

## 2. Objetivo del Proyecto

El objetivo es aprender a recopilar información pública sobre la infraestructura de una empresa. Voy a buscar datos del dominio, servidores DNS, servidores de correo, subdominios y otra información útil para una auditoría.

---

## 3. Metodología y Herramientas

He usado técnicas de OSINT con comandos de terminal y páginas web públicas. Todo legal y sin autenticación.

Los comandos principales que usé fueron whois para ver el registro del dominio, nslookup y dig para consultar DNS y registros MX, y ping para verificar IPs.

En cuanto a herramientas web, usé DNSDumpster para buscar subdominios, crt.sh para ver certificados SSL y theHarvester para recopilar emails y nombres.

---

## 4. Información Whois

Empecé por lo más general del dominio. Lo primero que hice fue un whois para ver quién ha registrado el dominio y obtener información básica sobre su infraestructura.

Ejecuté whois elpozo.es y me salió bastante información.

<img width="600" alt="1-1" src="https://github.com/user-attachments/assets/777f730a-e110-4851-bb4d-ceb15b2ce62f" />

Aquí pude ver el registrador del dominio, las fechas de creación y expiración, los servidores de nombres configurados, el estado del dominio y datos de contacto.

<img width="600" alt="2-1" src="https://github.com/user-attachments/assets/91cbbaea-05a4-4194-8343-f6025400ce5f" />

Luego hice whois de las IPs que aparecían asociadas para ver quién las gestiona.

<img width="500" alt="3-1" src="https://github.com/user-attachments/assets/8a0fdf08-1d75-42db-9c0f-dc721cce9af9" />

Con esto saqué información sobre el ASN, el ISP, el rango de IPs de la empresa y la ubicación de los servidores. Me sirve para saber quién administra realmente todo y si usan hosting externo o propio.

También hice un nslookup del dominio para obtener más detalles:

<img width="300" alt="12-1" src="https://github.com/user-attachments/assets/4bb4cf0b-5f19-485e-b3e9-a2dbd127aff5" />

Esta consulta me dio información adicional sobre las IPs asociadas al dominio y me permitió verificar la resolución DNS del dominio principal.

---

## 5. Análisis de Servidores DNS

Después del whois, analicé los servidores DNS. Usé nslookup y dig para ver qué servidores DNS tiene configurados El POZO.

<img width="550" alt="4-2" src="https://github.com/user-attachments/assets/36bd41d1-70e0-4c1b-876f-dc066eda66a3" />

Aquí hice la consulta de los registros NS del dominio para identificar los servidores de nombres. Luego consulté más detalles sobre los DNS:

<img width="600" alt="5-1" src="https://github.com/user-attachments/assets/64764eae-e0bd-4c3f-8e08-12e47c6ea6e2" />

---

## 6. Servidores de Correo

Luego consulté los registros MX para ver qué servidores de correo usan. Ejecuté nslookup -type=MX elpozo.es y dig MX elpozo.es.

<img width="500" alt="6-1" src="https://github.com/user-attachments/assets/3201fa0e-295a-4f84-9b71-6ea75bbdbc5f" />

Esta consulta me mostró los servidores de correo configurados con sus prioridades. También hice consultas adicionales:

<img width="500" alt="7-1" src="https://github.com/user-attachments/assets/8dd888e0-01f3-4e41-b903-a8071e0eb197" />

Los registros MX me dijeron qué servidores reciben los emails de la empresa. Normalmente hay varios con diferentes prioridades por si uno falla. Esto es importante porque el correo es la puerta de entrada más común para ataques de phishing y malware. También me dice si usan servicios externos como Google o Microsoft, o si tienen servidores propios.

---

## 7. Búsqueda de Subdominios

Luego busqué subdominios asociados al dominio principal. Usé DNSDumpster, Sublist3r, crt.sh y búsquedas en Google con site:*.elpozo.es.

<img width="650" alt="8-1" src="https://github.com/user-attachments/assets/c37096a7-f0c6-4042-9cad-985fb8bcfdcf" />

Esta búsqueda me mostró varios subdominios activos. También probé con otras herramientas:

<img width="550" alt="9-1" src="https://github.com/user-attachments/assets/8cc61568-d8e4-4e95-b46f-998ad035a1fe" />

Y continué explorando más subdominios:

<img width="800" alt="10-1" src="https://github.com/user-attachments/assets/b7ce4c00-b94e-4221-bc39-849a9052803c" />

Aquí fui encontrando diferentes subdominios relacionados con distintos servicios:

<img width="700" alt="11-1" src="https://github.com/user-attachments/assets/399b216a-cdf0-4bf5-a834-8d270f580cbb" />

---

## 8. Información Adicional Relevante

Además de lo técnico, busqué información en redes sociales y páginas corporativas. Revisé LinkedIn para ver empleados, puestos de IT y qué tecnologías usan. En sus perfiles a veces mencionan si usan Windows Server, Linux, etc. También miré Facebook, Twitter e Instagram por si había algo filtrado.

Recopilé información sobre la presencia online de la empresa y posibles datos públicos con TinEye Search:

<img width="800" alt="13-1" src="https://github.com/user-attachments/assets/834836d8-c7a3-4fa0-b728-8f999e0a3949" />

También usé herramientas de OSINT para recopilar más información de las redes sociales (Social Searcher):

<img width="800" alt="14-1" src="https://github.com/user-attachments/assets/2dd8b166-30f7-4bca-b694-d22ac81f7879" />

Y finalmente hice búsquedas adicionales para completar el perfil (Spider):

<img width="550" alt="15-1" src="https://github.com/user-attachments/assets/7223ac32-e0cb-4b00-ab04-9eee1d3f7ae0" />

Busqué ofertas de empleo que revelan qué tecnologías buscan, documentos PDF que pueden tener metadatos con nombres de usuarios, y usé Wayback Machine para ver versiones antiguas de la web. Con theHarvester recopilé emails y nombres de forma automática. Todo esto me da contexto sobre la organización y posibles vectores de ataque más sociales.

---

## 9. Análisis y Justificación

Toda esta información es relevante para la auditoría porque me da una visión general de la infraestructura de la empresa.

El Whois me dice quién gestiona el dominio y dónde están los servidores. Si el dominio expira, un atacante podría comprarlo. Los DNS son críticos porque si los comprometen pueden redirigir todo el tráfico a sitios falsos. Los servidores de correo son importantes porque la mayoría de ataques empiezan por email. Si usan Google o Microsoft probablemente tengan mejor protección que con servidores propios.

Los subdominios son puertas de entrada potenciales. Muchas veces hay subdominios antiguos olvidados que están sin actualizar y son vulnerables. La información de empleados y redes sociales me da contexto sobre la organización y qué tecnologías usan internamente.

En resumen, todo este reconocimiento pasivo me permite saber qué tienen expuesto, quién lo gestiona, qué tecnologías usan y cuáles son los puntos débiles potenciales. Es como hacer un mapa antes de empezar cualquier análisis más técnico.

---

## 10. Conclusión

Con este trabajo he aprendido a usar técnicas de OSINT para recopilar información pública de una empresa. Me ha sorprendido la cantidad de datos útiles que se pueden conseguir sin hacer ningún ataque activo.

Lo más destacable es que hay muchísima información pública disponible, más de la que pensaba. Las herramientas como whois o nslookup son fáciles de usar y no hace falta ser un experto. También he visto que la seguridad no es solo técnica, mucha información útil está en redes sociales o ofertas de empleo.

Me he dado cuenta de que antes de cualquier auditoría hay un trabajo grande de investigación y reconocimiento. Sin esta fase, cualquier análisis estaría incompleto.

---
