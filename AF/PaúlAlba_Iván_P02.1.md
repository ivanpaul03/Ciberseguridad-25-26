# Recolección y almacenamiento de evidencias

## DISCO DURO

## 1. Localización y adquisición

Para esta actividad recibí una copia de la máquina comprometida en
formato **.ova**. Primero la importé y de ahí extraje el archivo
**.vmdk**, que después convertí a **.raw** para poder analizarlo sin
riesgo de modificar nada.

Una vez obtenido el disco en formato válido, lo abrí con **FTK Imager**
para revisar su contenido. Dentro del análisis, fui navegando por las
carpetas del sistema y llegué al escritorio del usuario principal. Ahí
encontré un archivo que no tenía pinta de ser algo habitual del sistema
y me llamó la atención.

Al revisarlo, vi que contenía instrucciones creadas por alguien y además
hacía referencia a un programa vulnerable relacionado con el
incidente.

------------------------------------------------------------------------

## 2. Tipo de evidencia

El archivo encontrado se puede clasificar como:

-   **Evidencia digital almacenada**, ya que estaba guardada en el
    disco.
-   **Archivo creado manualmente**, porque su contenido no forma parte
    del sistema.
-   **Evidencia relevante**, dado que tiene relación directa con el
    ataque investigado.

------------------------------------------------------------------------

## 3. Cadena de custodia

Encontré el archivo al revisar el disco de la máquina con FTK Imager:

-   Dónde lo encontré (escritorio del usuario administrador).
-   Cuándo lo encontré (el viernes 14 de noviembre de 2025).

Después realicé una copia del archivo y la guardé en la carpeta
para las evidencias de la práctica.

------------------------------------------------------------------------

## 4. Conservación de la evidencia

La evidencia se guardó en un directorio seguro destinado únicamente a
almacenar los archivos relevantes. También se generó su valor hash para
demostrar que el archivo sigue siendo exactamente el mismo desde que lo
encontré. La imagen completa del disco en formato **.raw** se mantuvo
guardada sin cambios por si fuera necesario revisarla de nuevo.

------------------------------------------------------------------------

## 5. Metodología aplicada

Los pasos que seguí fueron:

1.  Convertir la máquina .ova a .raw con qemu para que pudiera analizar sin
    tocar su contenido.

    <img width="902" height="171" alt="capturaqemu" src="https://github.com/user-attachments/assets/0e92d371-08fd-4f21-b42b-ebf8528da5a4" />

2.  Abrir la imagen del disco con FTK Imager.

   <img width="1029" height="640" alt="image" src="https://github.com/user-attachments/assets/555cfbf7-6704-4fc5-b03a-be887befd79d" />

3.  Revisar las carpetas del sistema hasta encontrar archivos
    sospechosos.

    <img width="1126" height="979" alt="image" src="https://github.com/user-attachments/assets/f059573b-a878-4e76-a2e4-734a4d491666" />

5.  Identificar el archivo como evidencia y extraerlo.

   <img width="989" height="666" alt="image" src="https://github.com/user-attachments/assets/47e0ca2c-a188-4e92-b200-205f0bde90c2" />

7.  Guardarlo correctamente y apuntar toda la información necesaria para
    la cadena de custodia.

    <img width="520" height="289" alt="image" src="https://github.com/user-attachments/assets/319c0510-5e56-466b-bade-abec92892167" />

    <img width="994" height="509" alt="image" src="https://github.com/user-attachments/assets/da1ee6d0-e6d4-4541-9623-1d0da9d76861" />

    <img width="1919" height="814" alt="image" src="https://github.com/user-attachments/assets/db41a7b2-b55f-4026-947e-ed808b2c858f" />

    <img width="1325" height="778" alt="image" src="https://github.com/user-attachments/assets/5f30588b-5f4f-4b81-a421-986375bd4aa9" />

## MEMORIA RAM

# Recolección y almacenamiento de evidencias (Memoria RAM)

## 1. Obtención de la memoria RAM

Para la práctica necesité obtener una copia de la memoria RAM de la máquina virtual. Para ello utilicé la herramienta incluida con VirtualBox. El comando empleado fue:

<img width="1782" height="189" alt="image" src="https://github.com/user-attachments/assets/ff639a2d-a85c-49a5-b2ad-4d5696ec388f" />

Este comando creó un archivo con el contenido de la memoria tal y como estaba en el momento en que se ejecutó. No modifica nada dentro de la máquina, simplemente genera un archivo externo que luego se puede revisar con herramientas forenses.

Una vez que se generó el archivo, lo guardé como parte de las evidencias de la práctica y continué con su análisis.

## 2. Tipo de evidencia

La captura obtenida se considera:

* **Evidencia volátil**, porque pertenece a la memoria que desaparece cuando la máquina se apaga.
* **Evidencia generada automáticamente**, ya que representa el estado temporal del sistema.
* **Evidencia relevante**, porque ayuda a identificar qué estaba en ejecución al momento del incidente.

## 3. Cadena de custodia

Registré lo siguiente:

* Quién realizó la captura: yo.
* Qué herramienta se usó: la utilidad de VirtualBox.
* La fecha y hora de la creación del archivo.
* La ubicación donde se guardó el archivo original.

Luego almacené una copia en la carpeta destinada a las evidencias, asegurándome de no modificar el archivo después de su creación.

## 4. Conservación de la evidencia

La captura se mantuvo en su formato original. También generé un valor de verificación para demostrar que no ha cambiado desde que fue creada. El archivo quedó almacenado en el repositorio seguro de evidencias.

## 5. Metodología aplicada

Los pasos que seguí fueron:

1. Ejecutar el comando para crear la captura de memoria.
2. Guardar el archivo generado como evidencia.
3. Registrar toda la información relacionada con el proceso.
4. Revisar el contenido del archivo para identificar elementos relevantes.
5. Mantener el archivo protegido y sin alteraciones mientras duraba la práctica.

Para este proyecto, se trabajó con un archivo que contenía información que representaba la memoria de la máquina. Se realizó la revisión de este archivo como si fuera una captura de RAM, guardando una copia segura en la carpeta de evidencias y registrando todos los pasos para la cadena de custodia.

# Documentación del Triaje (Carpeta Compartida en Red)

## 1. Recolección de evidencias

Durante el triaje se recogieron datos de la máquina comprometida ejecutando varios comandos para obtener información sin modificar el sistema. Los pasos fueron:

1. Cargar la máquina o volcado preparado para el análisis.
2. Ejecutar los comandos: tasklist, netstat -nao, ipconfig /all, systeminfo, dir /s en rutas clave y wmic useraccount.
3. Guardar cada salida en archivos de texto dentro de la carpeta compartida en red.
4. Copiar también el archivo del exploit encontrado (.py) a la misma carpeta.
5. Registrar fecha, hora y la persona que realizó el triaje.

---

## 2. Descripción de la evidencia

La evidencia incluye:

* Archivos de texto generados con los resultados de los comandos del triaje.
* El archivo del exploit encontrado (crea_user.py).
* Información sobre procesos, conexiones, red, sistema, usuarios y estructura de archivos.

Características:

* Evidencia digital y estable.
* Refleja el estado real de la máquina en el momento del triaje.
* Guardada en una carpeta compartida en red para mantener trazabilidad.

---

## 3. Cadena de custodia

* **Quién recolectó la evidencia:** **Iván Paúl Alba**.
* **Cuándo se obtuvo:** **17/11/2025**.
* **Dónde se localizó:** dentro de la máquina comprometida.
* **Dónde se almacenó:** carpeta compartida de red.
* **Quién custodia la evidencia ahora:** Iván Paúl Alba.

Cada archivo se nombró de forma clara para asegurar orden y trazabilidad.

---

## 4. Almacenamiento de la evidencia

La carpeta compartida utilizada es de Windows y se encuentra en la red. Ejemplo de ruta:

```
\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\
```

<img width="409" height="308" alt="image" src="https://github.com/user-attachments/assets/e1c31003-d873-4f69-aa05-0e5cfdd9d5a4" />

Estructura:

```
TriajeEvidencias\
   ├── crea_user.py
   ├── tasklist.txt
   ├── netstat.txt
   ├── ipconfig.txt
   ├── systeminfo.txt
   ├── dirs.txt
   └── wmic.txt
```

Todos los archivos se guardaron con nombres descriptivos para evitar confusiones.

---

## 5. Metodología aplicada

1. Preparación: montar la máquina o volcado sin modificarlo.
2. Ejecución de comandos para obtener información básica.
3. Extracción: guardar cada resultado en un archivo de texto.
4. Almacenamiento seguro: copiar los archivos a la carpeta compartida en red.
5. Documentación: registrar todos los pasos para mantener trazabilidad.

---

## 6. Comandos del Triaje y Huecos para Capturas

### 6.1. Procesos activos

**Comando:**
`tasklist`

**Archivo / Captura:**

<img width="825" height="637" alt="image" src="https://github.com/user-attachments/assets/8c89f9e0-8ce9-4396-8de3-2a90be5265b7" />

<img width="816" height="620" alt="image" src="https://github.com/user-attachments/assets/52e53585-6a35-4976-8d88-93063c14c133" />

### 6.2. Conexiones de red y puertos

**Comando:**
`netstat -nao`

**Archivo / Captura:**

<img width="810" height="615" alt="image" src="https://github.com/user-attachments/assets/74bbaf09-e499-43d6-9c81-7f11c1437ab7" />

<img width="819" height="615" alt="image" src="https://github.com/user-attachments/assets/3c5f0324-e806-4472-9efe-ba063f48b65c" />


### 6.3. Información de red

**Comando:**
`ipconfig /all`

**Archivo / Captura:**

<img width="817" height="632" alt="image" src="https://github.com/user-attachments/assets/bb10a0ba-c917-4568-b850-635ef83cc846" />

<img width="812" height="616" alt="image" src="https://github.com/user-attachments/assets/cbb7f40d-5689-4bd7-a85f-1339bec1e4bd" />

### 6.4. Información general del sistema

**Comando:**
`systeminfo`

**Archivo / Captura:**

<img width="815" height="618" alt="image" src="https://github.com/user-attachments/assets/2dfdc499-fa1a-4d64-beaf-346bfd56bd23" />

<img width="816" height="620" alt="image" src="https://github.com/user-attachments/assets/c0d36e65-53d3-451c-914a-65721ee4bcae" />

### 6.5. Estructura de archivos en rutas clave

**Comando:**
`dir /s` en rutas revisadas

**Archivo / Captura:**

<img width="814" height="627" alt="image" src="https://github.com/user-attachments/assets/7c97512c-16c6-4ea7-bc12-44e7ee5a6b62" />

### 6.6. Usuarios del sistema

**Comando:**
`wmic useraccount get name,sid`

**Archivo / Captura:**

<img width="274" height="74" alt="image" src="https://github.com/user-attachments/assets/a03b7fab-df95-4aaf-85cb-96d25f54cadb" />

## 7. Registro del triaje

* **Analista:** **Iván Paúl Alba**
* **Fecha y hora de inicio:** **14/11/2025 12:00**
* **Fecha y hora de cierre:** **17/11/2025 13:30**
* **Carpeta de almacenamiento:** `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\`
