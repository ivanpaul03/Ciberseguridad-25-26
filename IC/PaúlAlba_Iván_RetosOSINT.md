<h1 align="center">Retos OSINT</h1>

<img width="1400" height="788" alt="image" src="https://github.com/user-attachments/assets/0da2e58b-3add-4c8a-bacd-f4b44169cf70" />

---

## Índice

1. [*Caso 1 – Jirafa en peligro de extinción*](#1-caso-1--jirafa-en-peligro-de-extinci%C3%B3n)
2. [*Caso 2 – Verificación de un tweet sobre un ataque en Pakistán*](#2-caso-2--verificaci%C3%B3n-de-un-tweet-sobre-un-ataque-en-pakist%C3%A1n)
3. [*Caso 3 – Identificación de una estación de tren*](#3-caso-3--identificaci%C3%B3n-de-una-estaci%C3%B3n-de-tren)
4. [*Caso 4 – Geolocalización de un vídeo en Tirana*](#4-caso-4--geolocalizaci%C3%B3n-de-un-v%C3%ADdeo-en-tirana)
5. [*Write-up final del trabajo OSINT*](#5-write-up-final-del-trabajo-osint)

---

## 1. ***Caso 1 – Jirafa en peligro de extinción***

### Introducción del caso

En este primer caso se nos facilita la imagen de una jirafa recién nacida perteneciente a una especie en peligro de extinción. A partir de esta imagen, el objetivo es obtener información pública sobre el animal, concretamente su lugar y fecha de nacimiento, su residencia actual y una prueba visual de su hábitat actual.

Este caso permite aplicar un proceso OSINT básico utilizando únicamente fuentes abiertas y herramientas sencillas.

---

### Análisis del caso

Tras revisar los cuatro supuestos del documento, este caso se centra en el análisis de una imagen y la obtención de información asociada a ella. El alcance de la investigación es limitado y no requiere el uso de fuentes privadas ni técnicas avanzadas, únicamente búsquedas en Internet y verificación de la información encontrada.

---

### Planificación del proceso OSINT

Antes de comenzar la investigación, planifiqué los siguientes pasos:

- Realizar una búsqueda inversa de la imagen para localizar su origen.
- Buscar información en fuentes públicas relacionadas con zoológicos y conservación animal.
- Confirmar los datos encontrados comparando varias fuentes.
- Localizar una imagen o vídeo reciente del animal en su ubicación actual.

---

### Fuentes y herramientas utilizadas

**Fuentes de información:**
- Blogs especializados en zoológicos.
- Artículos informativos en páginas web.
- Plataformas de vídeo de acceso público.

**Herramientas OSINT:**
- TinEye (búsqueda inversa de imágenes).
- Google Search.
- Navegador web.

---

### Ejecución de la investigación

El primer paso fue realizar una búsqueda inversa de la imagen utilizando TinEye. Esta búsqueda permitió localizar un artículo donde se indicaba que la jirafa nació en el **Virginia Zoo**, en **Norfolk, Virginia (EE. UU.)**, el **21 de octubre de 2009**.

<img width="959" height="539" alt="1" src="https://github.com/user-attachments/assets/93493de6-53f7-449b-baf0-6abb69dd5894" />

A continuación, realicé búsquedas adicionales para obtener más información sobre el animal. Mediante palabras clave relacionadas con el nacimiento y traslado de jirafas, encontré que la jirafa se llama **Willow**.

Posteriormente, localicé información que indicaba que Willow fue trasladada a **Disney’s Animal Kingdom**, en Florida, como parte de un programa de conservación, llegando allí el **12 de octubre de 2010**.

<img width="959" height="539" alt="2" src="https://github.com/user-attachments/assets/85be5531-0792-4cd5-bb65-fac292a49b4d" />

Luego, busqué imágenes y vídeos recientes para confirmar su ubicación actual. Encontré un vídeo donde se puede ver a Willow en su hábitat actual dentro de Disney’s Animal Kingdom.

<img width="600" height="403" alt="3" src="https://github.com/user-attachments/assets/298791ea-f84c-464b-863c-fb97769f90b3" />

Por último, encontré en la imagen una marca en el cuello de la jirafa con forma de corazón que también se puede apreciar en la jirafa del vídeo anterior.

<img width="371" height="326" alt="4" src="https://github.com/user-attachments/assets/0ce9c5e8-9395-4d9f-bf3c-9092338ae554" />

---

### Documentación del proceso

**Herramientas y fuentes utilizadas:**
- TinEye  
- Google Search  
- Artículos de blogs especializados  
- Vídeos en plataformas públicas  

**Datos recopilados:**
- Lugar y fecha de nacimiento.
- Nombre del animal.
- Residencia actual.
- Fecha de llegada.
- Evidencia visual.

**Análisis realizado:**
La información encontrada coincide en varias fuentes distintas, lo que permite confirmar que los datos obtenidos son correctos.

**Dificultades encontradas:**
Algunas fuentes no indicaban fechas concretas. Para solucionarlo, comparé varias páginas hasta encontrar información coincidente.

---

### Resultados obtenidos

| Pregunta | Respuesta |
|--------|----------|
| Lugar y fecha de nacimiento | Virginia Zoo, Norfolk (21 de octubre de 2009) |
| Residencia actual | Disney’s Animal Kingdom, Florida |
| Fecha de llegada | 12 de octubre de 2010 |
| Evidencia visual | Vídeo del animal en su hábitat actual |

---

### Conclusiones

Este caso demuestra que es posible obtener información fiable utilizando únicamente fuentes abiertas y herramientas básicas. La búsqueda inversa de imágenes ha sido clave para localizar el origen de la información y completar la investigación.

---

### Reflexión final

La principal limitación de este caso es depender de información ya publicada. Sin embargo, el ejercicio resulta útil para aprender a seguir un proceso OSINT ordenado y documentar correctamente los pasos realizados.

---

## 2. ***Caso 2 – Verificación de un tweet sobre un ataque en Pakistán***

### Introducción del caso

En este segundo caso se analiza un tweet publicado el 19 de enero de 2023 por un periodista con un gran número de seguidores. En el mensaje se afirma que se ha producido un ataque suicida en un puesto policial en la ciudad de Khyber, Pakistán, acompañado de una imagen de un vehículo destruido entre humo y fuego.

El objetivo de este caso es comprobar si la imagen utilizada en el tweet corresponde realmente al hecho descrito.

---

### Análisis del caso

Tras revisar el enunciado, este caso se centra en la **verificación de información difundida en redes sociales**. A partir de una imagen compartida en un tweet, se debe comprobar si esta ha sido utilizada correctamente o si se trata de una imagen sacada de contexto.

El alcance del caso se limita a la identificación del origen real de la imagen y su comparación con la información afirmada en el tweet.

---

### Planificación del proceso OSINT

Antes de comenzar la investigación, definí los siguientes pasos:

- Localizar el tweet original publicado por el periodista.
- Descargar la imagen utilizada en el tweet.
- Realizar una búsqueda inversa de la imagen para conocer su origen real.
- Comparar la información encontrada con la afirmación realizada en el tweet.
- Verificar fechas y localizaciones para confirmar o desmentir la noticia.

---

### Fuentes y herramientas utilizadas

**Fuentes de información:**
- Twitter (X).
- Artículos de prensa y páginas informativas.
- Resultados de búsqueda en Internet.

**Herramientas OSINT:**
- Búsqueda avanzada de Twitter.
- TinEye (búsqueda inversa de imágenes).
- Google Search.
- Navegador web.

---

### Ejecución de la investigación

El primer paso fue localizar el tweet original utilizando la **búsqueda avanzada de Twitter**, introduciendo el texto exacto del mensaje. De esta forma pude acceder a la publicación original y descargar la imagen utilizada.

<img width="291" height="404" alt="5" src="https://github.com/user-attachments/assets/8ac2fe97-4a43-492c-a9de-1bbfccdb1bfb" />

A continuación, realicé una **búsqueda inversa de la imagen** con TinEye. Los resultados mostraron que la imagen ya había sido publicada años antes en varios artículos de prensa.

<img width="341" height="407" alt="6" src="https://github.com/user-attachments/assets/9ba4f497-210c-4c82-8755-15cdd417c7b1" />

Investigando uno de los resultados más antiguos, encontré un artículo que indicaba que la imagen corresponde a un **ataque ocurrido en Irak en el año 2016**, y no a un ataque en Pakistán en 2023 como afirmaba el tweet.

<img width="959" height="539" alt="7" src="https://github.com/user-attachments/assets/accd4637-ac20-4aa5-b05f-158fa128db2b" />

La comparación de fechas y localización confirma que la imagen fue reutilizada fuera de contexto para ilustrar un suceso distinto.

---

### Documentación del proceso

**Herramientas y fuentes utilizadas:**
- Twitter (búsqueda avanzada).
- TinEye.
- Google Search.
- Artículos de prensa.

**Datos recopilados:**
- Fecha de publicación del tweet.
- Imagen utilizada en el tweet.
- Fecha y lugar reales de la imagen.
- Contexto original del suceso.

**Análisis realizado:**
La búsqueda inversa demuestra que la imagen no corresponde al ataque descrito en el tweet, sino a un suceso ocurrido años antes en otro país.

**Dificultades encontradas:**
Algunos resultados mostraban la imagen sin contexto claro. Para solucionarlo, busqué las publicaciones más antiguas hasta encontrar la fuente original.

---

### Resultados obtenidos

| Pregunta | Respuesta |
|--------|----------|
| ¿La imagen corresponde al ataque descrito? | No |
| Origen real de la imagen | Ataque ocurrido en Irak en 2016 |
| Uso de la imagen | Imagen utilizada fuera de contexto |

---

### Conclusiones

Este caso demuestra la importancia de verificar imágenes compartidas en redes sociales antes de dar una información por válida. Mediante herramientas OSINT básicas es posible detectar imágenes reutilizadas y evitar la difusión de información falsa.

---

### Reflexión final

La principal limitación de este caso es la dependencia de imágenes ya publicadas en Internet. Sin embargo, el ejercicio es muy útil para aprender a detectar desinformación y aplicar un proceso OSINT sencillo en redes sociales.

---

## 3. ***Caso 3 – Identificación de una estación de tren***

### Introducción del caso

En este tercer caso se nos proporciona una imagen compartida en redes sociales en la que se puede ver claramente una estación de tren. El objetivo es identificar el nombre de la estación que aparece en la imagen y determinar cuál es la estructura más alta visible, indicando también su altura.

Este caso se centra principalmente en la observación visual y la comparación con información disponible en mapas y fuentes abiertas.

---

### Análisis del caso

Tras revisar el enunciado, este caso consiste en identificar un lugar concreto a partir de una imagen. No se proporciona ningún dato adicional, por lo que toda la investigación debe basarse en los elementos visibles en la fotografía y en su comparación con información pública.

El alcance del caso es limitado y permite aplicar técnicas OSINT sencillas, centradas en la observación y la verificación visual.

---

### Planificación del proceso OSINT

Antes de comenzar la investigación, definí los siguientes pasos:

- Analizar la imagen en detalle para identificar posibles pistas visuales.
- Buscar el nombre de la estación si aparecía algún cartel o elemento identificativo.
- Utilizar mapas online para localizar la estación y comparar el entorno.
- Identificar los edificios visibles en la imagen.
- Buscar información pública para determinar cuál es la estructura más alta y su altura.

---

### Fuentes y herramientas utilizadas

**Fuentes de información:**
- Google Maps.
- Información pública sobre edificios y estaciones.
- Resultados de búsqueda en Internet.

**Herramientas OSINT:**
- Google Search.
- Google Maps.
- Google Street View.
- Navegador web.

---

### Ejecución de la investigación

El primer paso fue observar la imagen con detenimiento. En ella se aprecia claramente un cartel con el nombre **“Flinders Street”**, lo que permitió identificar directamente la estación como **Flinders Street Station**, situada en **Melbourne, Australia**.

<img width="642" height="492" alt="Imagen3" src="https://github.com/user-attachments/assets/a98a77b3-c457-4099-b80b-46516d84ae51" />

Para confirmar la ubicación, busqué la estación en **Google Maps** y utilicé **Street View**, comprobando que tanto la fachada como el entorno coinciden con los de la imagen proporcionada.

<img width="602" height="414" alt="8" src="https://github.com/user-attachments/assets/f0983b0d-074c-4769-8c17-96d384bddb14" />

Una vez identificada la estación, analicé los edificios que aparecen al fondo de la imagen. Comparando el skyline visible con el entorno real de Melbourne mediante Google Maps y búsquedas adicionales, se identificó como estructura más alta visible el edificio **Focus Apartments (también conocido como Focus Melbourne)**.

<img width="959" height="539" alt="9" src="https://github.com/user-attachments/assets/b71743db-4b08-4022-97c4-42b2f677f774" />

Buscando información pública sobre este edificio, se comprobó que tiene una altura aproximada de **167 metros**.

<img width="959" height="539" alt="10" src="https://github.com/user-attachments/assets/de390ebd-0a9b-4a32-97bc-30bf1af56b43" />

---

### Documentación del proceso

**Herramientas y fuentes utilizadas:**
- Google Search.
- Google Maps.
- Google Street View.
- Páginas informativas sobre edificios.

**Datos recopilados:**
- Nombre de la estación.
- Ubicación de la estación.
- Identificación del edificio más alto visible.
- Altura aproximada del edificio.

**Análisis realizado:**
La identificación se basó en elementos visibles en la imagen y su comparación con mapas y fotografías reales, lo que permitió confirmar tanto la estación como la estructura más alta.

**Dificultades encontradas:**
Algunos edificios del skyline son similares entre sí. Para evitar errores, comparé varias vistas y fuentes hasta confirmar cuál era el edificio correcto.

---

### Resultados obtenidos

| Pregunta | Respuesta |
|--------|----------|
| Nombre de la estación | Flinders Street Station (Melbourne, Australia) |
| Estructura más alta visible | Focus Apartments (Focus Melbourne) |
| Altura aproximada | 167 metros |

---

### Conclusiones

Este caso demuestra que una buena observación de una imagen, junto con el uso de mapas y herramientas básicas, puede ser suficiente para identificar un lugar concreto y elementos relevantes de su entorno.

---

### Reflexión final

La principal limitación de este caso es depender únicamente de lo que se ve en la imagen. Aun así, el ejercicio resulta útil para mejorar la capacidad de observación y el uso de herramientas OSINT sencillas para la identificación de lugares.

---

## 4. ***Caso 4 – Geolocalización de un vídeo en Tirana***

### Introducción del caso

En este cuarto caso se nos proporciona un vídeo publicado por la cuenta de Twitter **@VisitTirana** el 16 de febrero de 2023. En el vídeo se puede ver a una persona caminando por una calle de la ciudad de Tirana.

El objetivo de este caso es:
- Estimar a qué hora se grabó el vídeo.
- Determinar las coordenadas exactas del lugar por donde caminaba la persona en el momento de la grabación.

---

### Análisis del caso

Tras revisar el enunciado, este caso se centra en la **geolocalización de un vídeo** utilizando únicamente la información visual que aparece en él. No se dispone de metadatos relevantes, por lo que la investigación debe basarse en la observación del entorno y la comparación con mapas y fuentes abiertas.

El alcance del caso es limitado y permite aplicar técnicas OSINT sencillas basadas en la observación y la verificación visual.

---

### Planificación del proceso OSINT

Antes de comenzar la investigación, planifiqué los siguientes pasos:

- Analizar el vídeo y sus capturas para identificar edificios, señales, farolas u otros elementos reconocibles.
- Localizar el tweet original y comprobar la hora de publicación.
- Comparar la iluminación y las sombras visibles en el vídeo para estimar la hora de grabación.
- Utilizar Google Maps y Street View para localizar la calle exacta.
- Consultar la hora de la puesta de sol en Tirana para confirmar la estimación.
- Obtener las coordenadas exactas del lugar.

---

### Fuentes y herramientas utilizadas

**Fuentes de información:**
- Twitter (X).
- Google Maps.
- Páginas web con información sobre horarios solares.

**Herramientas OSINT:**
- Google Search.
- Google Maps.
- Google Street View.
- Navegador web.

---

### Ejecución de la investigación

El primer paso fue localizar el **tweet original** publicado por la cuenta @VisitTirana. En el tweet se indica una hora de publicación de **11:07 PM**, pero esta información solo refleja el momento de subida del vídeo, no el momento en el que fue grabado.

<img width="959" height="539" alt="11" src="https://github.com/user-attachments/assets/8eaf53af-e138-4377-9010-ebc78a3ca5ee" />

A continuación, analicé las capturas del vídeo. En ellas se pueden identificar varios elementos clave del entorno, como fachadas de edificios, farolas y señales, que permiten comparar el lugar con mapas online.

Utilizando **Google Maps y Street View**, comparé estos elementos hasta localizar el punto exacto: la intersección de **Rruga e Kavajës con Rruga 28 Nëntori**, en **Tirana, Albania**. Una vez identificado el lugar, obtuve las coordenadas.

<img width="959" height="539" alt="12" src="https://github.com/user-attachments/assets/90c20098-d9ad-4886-a61c-32ffab45ea37" />

Las coordenadas del lugar son: **41.3268985° N, 19.8069296° E**.

Para estimar la hora real de grabación, comparé la **iluminación y las sombras visibles en el vídeo** con la posición del sol en Tirana el 16 de febrero de 2023. Consultando información pública sobre la puesta de sol, comprobé que esta se produce alrededor de las **18:47**.

Observando el tipo de luz y la longitud de las sombras, concluí que el vídeo fue grabado aproximadamente **dos horas antes de la puesta de sol**, es decir, entre las **16:47 y 16:50**.

<img width="959" height="539" alt="14" src="https://github.com/user-attachments/assets/cb7890c3-26c7-4c42-87c3-3c6444e8f720" />

---

### Documentación del proceso

**Herramientas y fuentes utilizadas:**
- Twitter.
- Google Maps.
- Google Street View.
- Páginas de información solar.

**Datos recopilados:**
- Hora de publicación del tweet.
- Elementos visibles del entorno.
- Ubicación exacta del lugar.
- Hora de la puesta de sol en Tirana.
- Estimación de la hora de grabación.

**Análisis realizado:**
La comparación entre el entorno visible en el vídeo, los mapas y la información solar permitió identificar tanto el lugar exacto como una estimación razonable de la hora de grabación.

**Dificultades encontradas:**
No se disponía de metadatos del vídeo. Para solucionarlo, fue necesario basarse únicamente en la observación visual y la comparación con fuentes externas.

---

### Resultados obtenidos

| Pregunta | Respuesta |
|--------|----------|
| Hora aproximada de grabación | 16:47 – 16:50 (hora local de Tirana, 16 de febrero de 2023) |
| Coordenadas del lugar | 41.3268985° N, 19.8069296° E |

---

### Conclusiones

Este caso demuestra que, incluso sin metadatos, es posible geolocalizar un vídeo utilizando observación visual y herramientas OSINT básicas. La comparación del entorno y el análisis de la luz han sido claves para resolver el ejercicio.

---

### Reflexión final

La principal limitación de este caso es la falta de información técnica del vídeo. Aun así, el ejercicio resulta muy útil para aprender a geolocalizar contenido audiovisual utilizando únicamente fuentes abiertas.

---

## 5. ***Write-up final del trabajo OSINT***

### Introducción general

En este trabajo se han resuelto cuatro casos prácticos de OSINT utilizando únicamente fuentes abiertas y herramientas accesibles. Cada caso plantea un tipo de problema distinto, lo que permite aplicar diferentes técnicas básicas de investigación, como la búsqueda inversa de imágenes, la verificación de información en redes sociales, la identificación de lugares a partir de imágenes y la geolocalización de vídeos.

El objetivo principal del trabajo es demostrar la capacidad de seguir un proceso OSINT ordenado, documentar correctamente los pasos realizados y extraer conclusiones basadas en información pública verificable.

---

### Metodología empleada

La metodología utilizada en todos los casos ha seguido una estructura común:

1. **Análisis del caso**  
   Se revisó cada enunciado para comprender el objetivo y el alcance de la investigación.

2. **Planificación**  
   Antes de comenzar, se definieron los pasos a seguir y las herramientas necesarias en cada caso.

3. **Ejecución de la investigación**  
   Se utilizaron herramientas OSINT básicas como motores de búsqueda, búsqueda inversa de imágenes, redes sociales y mapas online para recopilar la información.

4. **Verificación**  
   Los datos obtenidos se contrastaron con varias fuentes siempre que fue posible para evitar errores o información fuera de contexto.

5. **Documentación**  
   Se registraron las herramientas usadas, los datos encontrados, el análisis realizado y las dificultades encontradas en cada caso.

---

### Resultados obtenidos

Los resultados de cada caso han sido los siguientes:

- **Caso 1:** Identificación del lugar y fecha de nacimiento de una jirafa en peligro de extinción, su residencia actual y una prueba visual de su hábitat.
- **Caso 2:** Verificación de un tweet y detección del uso de una imagen fuera de contexto relacionada con un ataque falso.
- **Caso 3:** Identificación de una estación de tren y del edificio más alto visible en la imagen, junto con su altura aproximada.
- **Caso 4:** Geolocalización exacta de un vídeo en Tirana y estimación de la hora aproximada de grabación.

---

### Tabla resumen de respuestas

| Caso | Resultado principal |
|------|-------------------|
| Caso 1 | Jirafa Willow nacida en Virginia Zoo y trasladada a Disney’s Animal Kingdom |
| Caso 2 | Imagen reutilizada de un ataque en Irak (2016), no corresponde al tweet |
| Caso 3 | Flinders Street Station (Melbourne) y edificio Focus Apartments (167 m) |
| Caso 4 | Ubicación en Tirana (41.3268985° N, 19.8069296° E) y hora aproximada 16:47–16:50 |

---

### Conclusiones y recomendaciones

Este trabajo demuestra que es posible obtener información fiable utilizando únicamente fuentes abiertas y herramientas OSINT sencillas. La clave ha sido seguir un proceso ordenado, observar con atención y verificar siempre la información encontrada.

Como recomendación, es importante no confiar en una sola fuente y contrastar los datos siempre que sea posible, especialmente cuando se trabaja con contenido de redes sociales.

---

### Reflexión final y posibles mejoras

La principal limitación en todos los casos ha sido la dependencia de información ya publicada y la ausencia de metadatos en algunos contenidos. En futuras investigaciones, se podría profundizar en el uso de más herramientas OSINT o ampliar el número de fuentes para mejorar la precisión de los resultados.

En general, el ejercicio ha sido útil para comprender cómo aplicar OSINT de forma práctica y estructurada en situaciones reales.
