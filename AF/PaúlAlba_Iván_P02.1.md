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

Para este proyecto, se trabajó con un archivo que contenía información que representaba la memoria de la máquina. Se realizó la revisión de este archivo como si fuera una captura de RAM, guardando una copia segura en la carpeta de evidencias y registrando todos los pasos para la cadena de custodia.

## Triaje de la evidencia

## 1. Revisión inicial

Antes de hacer un análisis detallado, realicé un triaje para identificar rápidamente lo más relevante. Este paso me permitió ubicar la evidencia más importante sin revisar todo el contenido.

## 2. Pasos que seguí

1. Localicé el archivo de memoria en el escritorio del usuario.
2. Hice una copia de ese archivo para trabajar sobre ella sin modificar el original.
3. Revisé su contenido para identificar datos relevantes relacionados con la actividad sospechosa.
4. Registré que lo encontré yo, cuándo y dónde estaba.
5. Guardé la copia en la carpeta de evidencias específica para la práctica.

## 3. Resultado del triaje

El triaje me permitió identificar rápidamente la evidencia de la memoria, asegurando que estaba protegida y lista para el posterior análisis.
