# Informe Forense - Análisis de Disco en Formato .AD1

## INFORME EJECUTIVO

### Resumen del Caso

Realicé un análisis forense de una imagen de disco para buscar actividades sospechosas o software no autorizado. La investigación se enfocó en revisar el historial de programas ejecutados, los registros del sistema y la estructura general del disco.

### Hallazgo Crítico

**KMSAUTO NET.EXE** - Software ilegal de activación de licencias Microsoft detectado en análisis Prefetch. Confirmada su ejecución múltiple en el sistema.

### Otros Hallazgos

- 211 archivos Prefetch analizados (actividad sept 2020 - feb 2021)
- 33,750 eventos de seguridad registrados
- Actualizaciones regulares de Windows instaladas en el período
- Evidencia preservada con hash SHA-256

### Recomendaciones Urgentes

1. Eliminar inmediatamente KMSAUTO NET.EXE y todos los archivos relacionados
2. Adquirir licencias legítimas de Windows y Office
3. Hacer un escaneo completo del equipo para detectar malware, ya que este tipo de herramientas suelen venir acompañadas de virus
4. Investigar cuándo y quién instaló este software en el equipo
5. Revisar los permisos de las cuentas de usuario y asegurarse de que no haya accesos no autorizados

---

## METODOLOGÍA

### 1. Evidencia Analizada

Para este análisis trabajé con el archivo Disk_image.ad1, que es una copia exacta del disco original preservada para mantener la evidencia intacta. El análisis lo realicé el 11 de enero de 2026, asegurándome de no modificar ningún archivo original.

### 2. Herramientas Utilizadas

Utilicé tres programas especializados para el análisis:
- **FTK Imager**: Para abrir y examinar la imagen del disco sin alterarla
- **WinPrefetchView**: Para revisar el historial de programas ejecutados
- **Visor de Eventos de Windows**: Para consultar los registros de actividad del sistema

### 3. Proceso de Análisis

**Montaje de evidencia:**

Primero monté la imagen del disco en FTK Imager para poder acceder a su contenido sin modificar nada. El programa me permitió ver todos los archivos como si fuera un disco normal, pero sin riesgo de alterar la evidencia original.

<img width="959" height="539" alt="captura1" src="https://github.com/user-attachments/assets/4fd96fa4-f239-4bc3-8534-e3fddd2504d4" />


La imagen se montó como unidad virtual en modo solo lectura, lo que garantizó que toda la información permaneciera intacta durante el análisis.

**Análisis de Prefetch:**

Una vez montada la imagen, utilicé WinPrefetchView para examinar los archivos Prefetch del sistema. Estos archivos guardan un registro de todos los programas que se han ejecutado en el equipo.

<img width="959" height="539" alt="captura2" src="https://github.com/user-attachments/assets/95f44a6d-e521-4bac-a3cd-57fc92cb1760" />

Configuré la herramienta para que leyera la carpeta Prefetch de la imagen montada y encontré 211 archivos que cubren el período de septiembre 2020 a febrero 2021. Entre todos los programas analizados, identifiqué el ejecutable KMSAUTO NET.EXE, que es el hallazgo más importante de este análisis.

**Análisis de registros del sistema:**

También revisé los registros de seguridad de Windows, que guardan información sobre inicios de sesión y actividades administrativas.

<img width="959" height="539" alt="captura3" src="https://github.com/user-attachments/assets/9130e447-4446-4f0a-b2c5-914965af0458" />

El sistema tenía registrados 33,750 eventos de seguridad hasta el 26 de febrero de 2021, incluyendo inicios de sesión, cambios en cuentas de usuario y accesos con privilegios especiales.

**Generación de reportes:**

Finalmente, exporté toda la información de los archivos Prefetch a un reporte en formato HTML.

<img width="959" height="539" alt="captura4" src="https://github.com/user-attachments/assets/11703b8d-bdc4-4aef-8380-c448d0b51cbb" />

Este reporte lista todos los programas ejecutados con sus fechas y número de ejecuciones, creando un documento que se puede guardar y compartir fácilmente. El período de actividad registrado va desde octubre 2020 hasta febrero 2021, con la última actualización del sistema el 25 de febrero de 2021.

## HALLAZGOS PRINCIPALES

### 1. Software Ilegal Detectado

El hallazgo más importante fue la detección de **KMSAUTO NET.EXE**, un programa utilizado para activar copias ilegales de Windows y Office sin pagar licencia. Este tipo de software:

- Viola los términos de uso de Microsoft
- Frecuentemente contiene virus o programas maliciosos ocultos
- Puede abrir puertas traseras para accesos no autorizados al equipo
- Confirmo que este programa se ejecutó varias veces en el sistema
**Evidencia adicional de los logs del sistema:**

Al revisar los registros de aplicaciones, encontré múltiples intentos fallidos de activación por volumen (VL) de Office. El sistema registró repetidamente el error **0x800705B4** al intentar contactar un servidor KMS para activación. Esto confirma que:

- El sistema usó una **clave de activación por volumen GVLK** (típica de herramientas como KMSAUTO)
- El equipo intentó repetidamente conectarse a un servidor KMS que no existía
- La licencia de Office (ID: d450596f-894d-49e0-966a-fd39ed4c4c64) mostraba activación temporal con fecha de gracia hasta agosto 2021

Estos intentos fallidos se registraron cada vez que el usuario "testx" iniciaba sesión o cuando había conexión de red disponible.
**Acción requerida**: Eliminación inmediata del programa y obtención de licencias legítimas.

### 2. Actividad General del Sistema

Revisé 211 archivos que registran la ejecución de programas entre septiembre 2020 y febrero 2021. Entre los programas más ejecutados encontré:

- Procesos normales de Windows (servicios de audio, actualizaciones, tareas en segundo plano)
- Línea de comandos (CMD.EXE)
- Varios programas del sistema que se ejecutaron entre 1 y 50 veces

En total identifiqué 206 programas diferentes que dejaron rastro de su actividad.

### 3. Registros de Seguridad y Usuario del Sistema

El sistema guardó 33,750 registros de eventos de seguridad hasta el 26 de febrero de 2021. Estos registros incluyen:

- Inicios de sesión en el equipo
- Accesos con permisos de administrador
- Cambios en cuentas de usuario

**Usuario principal identificado:**

Los registros de seguridad muestran que el usuario principal del equipo era **"testx"** en el equipo llamado **DESKTOP-M7V081J**. Este usuario:

- Tenía privilegios administrativos completos
- Realizaba inicios de sesión regulares durante el período analizado
- Su actividad coincide con los momentos en que el sistema intentaba activar Office ilegalmente

Esta información es útil para rastrear quién usó el equipo, cuándo y establecer responsabilidad sobre la instalación del software ilegal.

### 4. Actualizaciones del Sistema

El equipo recibió actualizaciones de Windows de forma regular durante el período analizado. La última actualización detectada fue el 25 de febrero de 2021 a las 12:33:45. Esto indica que el sistema se mantuvo actualizado con parches de seguridad de Microsoft.

## CONCLUSIONES

Después de revisar la evidencia y analizar los logs del sistema, puedo confirmar lo siguiente:

1. **Hallazgo crítico confirmado con evidencia múltiple**: Se detectó KMSAUTO NET.EXE en los archivos Prefetch, y los logs de aplicaciones confirman intentos repetidos de activación ilegal de Office usando claves por volumen (GVLK) con errores constantes al intentar contactar servidores KMS inexistentes.

2. **Usuario responsable identificado**: El usuario "testx" del equipo DESKTOP-M7V081J aparece como el usuario principal durante el período en que ocurrieron las activaciones ilegales y la ejecución del software malicioso.

3. **Período de actividad**: El equipo estuvo activo entre octubre 2020 y febrero 2021, con 211 programas diferentes ejecutándose durante ese tiempo.

4. **Mantenimiento del sistema**: El equipo recibió actualizaciones de seguridad de forma regular (KB4535680, KB4577586, KB4598301, entre otras), lo que indica mantenimiento regular pero no impidió la instalación de software ilegal.

5. **Riesgos identificados**: Además de la violación de licencias, existe riesgo de que el programa ilegal haya instalado virus adicionales o puertas traseras. Los logs muestran que el sistema intentaba comunicarse con servidores KMS externos, lo que podría haber expuesto el equipo a ataques.

6. **Preservación de evidencia**: Toda la información se mantuvo intacta durante el análisis, incluyendo los logs originales del sistema.

**Acciones inmediatas requeridas**:
- Eliminar completamente KMSAUTO NET.EXE del sistema
- Hacer un escaneo profundo en busca de malware
- Verificar que no haya programas configurados para ejecutarse al inicio o servicios sospechosos
- Obtener licencias legítimas de Windows y Office
- Investigar al usuario "testx" sobre la instalación del software ilegal

---

**Analista**: Iván Paúl Alba  
**Fecha de análisis**: 11 de enero de 2026

---
