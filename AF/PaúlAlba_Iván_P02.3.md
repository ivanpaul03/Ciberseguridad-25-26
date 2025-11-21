# Informe Forense - Análisis Técnico y Ejecutivo

## INFORME EJECUTIVO

### 1. Resumen del Caso

Este informe recoge el análisis forense realizado sobre una máquina
comprometida proporcionada en formato .ova. El objetivo del análisis fue
identificar vestigios digitales relevantes, clasificarlos, documentar la
cadena de custodia y garantizar la integridad de toda evidencia.
Se analizaron tres fuentes principales: **disco duro**, **memoria RAM**,
y **triaje inicial**.

### 2. Hallazgos Clave

-   Archivo sospechoso encontrado en el escritorio del usuario
    administrador, con instrucciones relacionadas con un programa
    vulnerable.
-   Captura completa de la **memoria RAM**, permitiendo revisar el
    estado exacto del sistema en el momento de la obtención.
-   Evidencias del triaje incluyendo archivos de texto con comandos
    (`tasklist`, `netstat`, `ipconfig`, `systeminfo`, `dir /s`, `wmic`)
    y un exploit identificado (`crea_user.py`).
-   Toda la evidencia almacenada de forma segura y acompañada de sus
    valores hash.

### 3. Conclusiones

-   Se confirma actividad maliciosa mediante uso de un exploit y
    presencia de archivos anómalos.
-   El análisis del disco, la RAM y el triaje permitió entender el
    comportamiento del sistema durante el incidente.
-   La evidencia está íntegra y debidamente registrada.

### 4. Recomendaciones

-   Aplicar medidas de seguridad adicionales en la máquina.
-   Revisar y corregir vulnerabilidades existentes.
-   Mantener controles regulares de registro y monitorización.

------------------------------------------------------------------------

## INFORME TÉCNICO

### 1. Recolección y Almacenamiento de Evidencias -- DISCO DURO

#### 1.1 Localización y adquisición

Se recibió una copia de la máquina en formato `.ova`.
Pasos realizados: 1. Importación de la máquina virtual. 2. Extracción
del archivo `.vmdk`. 3. Conversión a `.raw` mediante `qemu-img`. 4.
Análisis del contenido usando FTK Imager.

Se encontró un archivo sospechoso en el escritorio del usuario
administrador que contenía instrucciones relacionadas con el incidente.

#### 1.2 Tipo de evidencia

-   Evidencia digital almacenada.
-   Archivo creado manualmente.
-   Evidencia relevante.

#### 1.3 Cadena de custodia

-   Ubicación del hallazgo: Escritorio del administrador.
-   Fecha de hallazgo: **14/11/2025**.
-   Copia guardada en directorio de evidencias.

#### 1.4 Conservación

-   Archivo guardado en directorio seguro.
-   Hash generado para verificación.
-   La imagen `.raw` se mantuvo sin modificaciones.

#### 1.5 Metodología aplicada

-   Conversión del disco.
-   Análisis del sistema de archivos.
-   Extracción de archivo sospechoso.
-   Registro completo del proceso.

------------------------------------------------------------------------

### 2. Recolección y Almacenamiento -- MEMORIA RAM

#### 2.1 Obtención de la RAM

Se utilizó VirtualBox para generar la copia:

    VBoxManage debugvm "VM-Nombre" dumpvmcore --filename dump_ram.raw

#### 2.2 Tipo de evidencia

-   Volátil.
-   Generada automáticamente.
-   Relevante para el estado temporal del sistema.

#### 2.3 Cadena de custodia

-   Realizada por: Iván Paúl Alba
-   Herramienta: VirtualBox
-   Se registró fecha, hora y ubicación de almacenamiento.

#### 2.4 Conservación

-   Archivo sin alterar.
-   Valor hash calculado.
-   Guardado en repositorio seguro.

#### 2.5 Metodología aplicada

-   Ejecución del comando.
-   Registro de la operación.
-   Revisión posterior de memoria.
-   Preservación segura.

------------------------------------------------------------------------

### 3. TRIAJE -- Carpeta Compartida en Red

#### 3.1 Recolección

Comandos ejecutados: - `tasklist`
- `netstat -nao`
- `ipconfig /all`
- `systeminfo`
- `dir /s`
- `wmic useraccount get name,sid`

Se guardaron las salidas y el exploit `crea_user.py` en una carpeta
compartida en red.

#### 3.2 Tipo de evidencia

-   Digital estable.
-   Representa el estado del sistema en el triaje.
-   Incluye información clave de procesos, red, usuarios y archivos.

#### 3.3 Cadena de custodia

-   Analista: Iván Paúl Alba
-   Fecha: **17/11/2025**
-   Ubicación original: Sistema comprometido
-   Almacenamiento final:

```{=html}
<!-- -->
```
    \\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\

-   Custodia actual: Iván Paúl Alba

#### 3.4 Almacenamiento

Estructura final:

    TriajeEvidencias/
     ├── crea_user.py
     ├── tasklist.txt
     ├── netstat.txt
     ├── ipconfig.txt
     ├── systeminfo.txt
     ├── dirs.txt
     └── wmic.txt

#### 3.5 Metodología aplicada

-   Carga de la máquina.
-   Ejecución de comandos.
-   Exportación de resultados.
-   Almacenamiento seguro.
-   Documentación del proceso.

#### 3.6 Registro del triaje

-   Analista: **Iván Paúl Alba**
-   Inicio: 14/11/2025 12:00
-   Cierre: 17/11/2025 13:30

------------------------------------------------------------------------

## ANEXO -- Índice de Hallazgos

aaa
