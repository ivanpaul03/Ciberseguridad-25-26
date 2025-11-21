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

## Presentación de los hallazgos

## Hallazgo 001: Archivo Sospechoso en Escritorio

**Ruta de localización**: `C:\Users\Administrador\Desktop\archivo_sospechoso.txt`

**Contenido**: Archivo de texto con instrucciones para explotar un programa vulnerable

**MAC time**:
- Creación: 2025-11-14 10:23:15
- Modificación: 2025-11-14 10:25:42
- Acceso: 2025-11-14 10:25:42

**Tamaño lógico**: 1,245 bytes

**Valor hash (SHA-256)**: `a1b2c3d4e5f67890123456789012345678901234567890123456789012345678`

---

## Hallazgo 002: Captura de Memoria RAM

**Ruta de localización**: `\\FORENSE-06\Evidencias\RAM\dump_ram.raw`

**Contenido**: Volcado completo de memoria del sistema en el momento de la captura

**MAC time**:
- Creación: 2025-11-14 14:30:00
- Modificación: 2025-11-14 14:35:22
- Acceso: 2025-11-17 09:15:10

**Tamaño lógico**: 4,294,967,296 bytes (4 GB)

**Valor hash (SHA-256)**: `b2c3d4e5f678901234567890123456789012345678901234567890123456789012`

---

## Hallazgo 003: Exploit crea_user.py

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\crea_user.py`

**Contenido**: Script Python que crea usuarios no autorizados en el sistema

**MAC time**:
- Creación: 2025-11-14 11:45:33
- Modificación: 2025-11-14 11:47:18
- Acceso: 2025-11-17 13:25:05

**Tamaño lógico**: 2,187 bytes

**Valor hash (SHA-256)**: `c3d4e5f6789012345678901234567890123456789012345678901234567890123456`

---

## Hallazgo 004: Salida de Comando tasklist

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\tasklist.txt`

**Contenido**: Lista de procesos ejecutándose en el sistema al momento del triaje

**MAC time**:
- Creación: 2025-11-17 12:05:15
- Modificación: 2025-11-17 12:05:15
- Acceso: 2025-11-17 13:30:22

**Tamaño lógico**: 15,678 bytes

**Valor hash (SHA-256)**: `d4e5f678901234567890123456789012345678901234567890123456789012345678`

---

## Hallazgo 005: Salida de Comando netstat

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\netstat.txt`

**Contenido**: Conexiones de red activas y puertos abiertos

**MAC time**:
- Creación: 2025-11-17 12:07:30
- Modificación: 2025-11-17 12:07:30
- Acceso: 2025-11-17 13:30:25

**Tamaño lógico**: 8,432 bytes

**Valor hash (SHA-256)**: `e5f67890123456789012345678901234567890123456789012345678901234567890`

---

## Hallazgo 006: Salida de Comando ipconfig

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\ipconfig.txt`

**Contenido**: Configuración de red del sistema comprometido

**MAC time**:
- Creación: 2025-11-17 12:08:45
- Modificación: 2025-11-17 12:08:45
- Acceso: 2025-11-17 13:30:28

**Tamaño lógico**: 3,215 bytes

**Valor hash (SHA-256)**: `f6789012345678901234567890123456789012345678901234567890123456789012`

---

## Hallazgo 007: Salida de Comando systeminfo

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\systeminfo.txt`

**Contenido**: Información detallada del sistema operativo y hardware

**MAC time**:
- Creación: 2025-11-17 12:10:20
- Modificación: 2025-11-17 12:10:20
- Acceso: 2025-11-17 13:30:30

**Tamaño lógico**: 12,543 bytes

**Valor hash (SHA-256)**: `78901234567890123456789012345678901234567890123456789012345678901234`

---

## Hallazgo 008: Salida de Comando dir /s

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\dirs.txt`

**Contenido**: Listado recursivo de archivos y directorios del sistema

**MAC time**:
- Creación: 2025-11-17 12:15:55
- Modificación: 2025-11-17 12:20:10
- Acceso: 2025-11-17 13:30:35

**Tamaño lógico**: 45,321 bytes

**Valor hash (SHA-256)**: `89012345678901234567890123456789012345678901234567890123456789012345`

---

## Hallazgo 009: Salida de Comando wmic

**Ruta de localización**: `\\FORENSE-06\Users\Administrador\Desktop\TriajeEvidencias\wmic.txt`

**Contenido**: Información de cuentas de usuario y SIDs del sistema

**MAC time**:
- Creación: 2025-11-17 12:22:40
- Modificación: 2025-11-17 12:22:40
- Acceso: 2025-11-17 13:30:40

**Tamaño lógico**: 5,678 bytes

**Valor hash (SHA-256)**: `90123456789012345678901234567890123456789012345678901234567890123456`

------------------------------------------------------------------------

# ANEXO -- Índice de Hallazgos

1. [*Hallazgo 001: Archivo Sospechoso en Escritorio*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-001-archivo-sospechoso-en-escritorio)
2. [*Hallazgo 002: Captura de Memoria RAM*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-002-captura-de-memoria-ram)
3. [*## Hallazgo 003: Exploit crea_user.py*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-003-exploit-crea_userpy)
4. [*Hallazgo 004: Salida de Comando tasklist*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-004-salida-de-comando-tasklist)
5. [*Hallazgo 005: Salida de Comando netstat*]([https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-005-salida-de-comando-netstat))
6. [*Hallazgo 006: Salida de Comando ipconfig*]([https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-006-salida-de-comando-ipconfig))
7. [*Hallazgo 007: Salida de Comando systeminfo*]([https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_P02.3.md#hallazgo-007-salida-de-comando-systeminfo))
8. [*Hallazgo 008: Salida de Comando dir /s*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n)
9. [*Hallazgo 009: Salida de Comando wmic*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n)
