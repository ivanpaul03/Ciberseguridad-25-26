# **A1.7. Captura y Análisis de Tráfico de Red**

https://github.com/ivanpaul03/Ciberseguridad-25-26/edit/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md

![imagen portada](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark1.png)

---

## Índice

1. [*Preparación de la Herramienta*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#1-preparaci%C3%B3n-de-la-herramienta)
2. [*Captura de Tráfico*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#2-captura-de-tr%C3%A1fico)
3. [*Conexión a un Sitio Web*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#3-conexi%C3%B3n-a-un-sitio-web)
4. [*Análisis del Tráfico Capturado*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#4-an%C3%A1lisis-del-tr%C3%A1fico-capturado)
5. [*Conclusión*](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/Pa%C3%BAlAlba_Iv%C3%A1n_A1.7.md#5-conclusi%C3%B3n)

---

# **1. Preparación de la Herramienta:**

En esta etapa se realiza la instalación de Wireshark en mi equipo (descargando el ejecutable de su página oficial).

Una vez instalado, se abre el programa para conocer su entorno y aprender cómo funciona.

Exploré las partes principales de la ventana, como la lista de interfaces de red, los botones para iniciar y detener las capturas y la forma en que se muestran los paquetes de datos cuando se empieza a registrar el tráfico de los puertos.

El objetivo de este paso es familiarizarse con la herramienta, entender cómo se usa para observar la información que circula por la red y dejar todo listo para comenzar la práctica de captura y análisis que posteriormente mostraré.

# **2. Captura de Tráfico:**

![imagen wireshark 2](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark2.png)

En este caso, se selecciona la interfaz Wi-Fi, que es la conexión inalámbrica que el equipo usa para acceder a Internet.

 Al escoger esta opción, Wireshark se prepara para observar y registrar todo el tráfico que pasa a través de esa conexión: páginas web que se visitan, peticiones a servidores y respuestas que llegan desde Internet.

Esto permite analizar la comunicación entre el navegador y los sitios web a los que se accede.

![imagen wireshark 3](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark3.png)

Abrimos el fichero .php que trabaja a través del protocolo http en el navegador “[http://testphp.vulnweb.com/login.php](http://testphp.vulnweb.com/login.php)” y en el buscador de Wireshark capturamos http.

# **3. Conexión a un Sitio Web:**

Enviamos los datos del formulario y vemos cómo aparece el método POST en la captura de http:

![imagen wireshark 4](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark4.png)

![imagen wireshark 5](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark5.png)

# **4. Análisis del Tráfico Capturado:**

Lo detenemos y le aplicamos un filtro para que solo muestre la petición POST:

![imagen wireshark 6](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark6.png)

Examinamos los detalles del paquete:

![imagen wireshark 7](https://github.com/ivanpaul03/Ciberseguridad-25-26/blob/main/AF/images/wireshark7.png)

# **5. Conclusión:**

### **Observaciones sobre la seguridad de la transmisión de datos en formularios HTTP**

Durante la práctica se pudo observar que, cuando se usa una página con conexión HTTP, la información que se envía a través de un formulario (como usuario o contraseña) viaja sin protección.

Esto significa que los datos se transmiten en texto normal y podrían ser vistos por otras personas si alguien intercepta la conexión.

En pocas palabras, cualquier dato que se envíe por HTTP no es seguro, ya que puede ser leído fácilmente si la red no es confiable, como una red pública de Wi-Fi.

### **Reflexiones sobre la importancia de la seguridad en las conexiones web y posibles medidas para mejorarla**

La seguridad en las conexiones web es fundamental para proteger la información personal y la privacidad de los usuarios.

Usar sitios que tengan HTTPS (los que muestran el candado en el navegador) ayuda a evitar que otras personas vean o modifiquen los datos que se envían.

Además, es importante que los usuarios aprendan a revisar si una página es segura antes de escribir datos personales y que las empresas se aseguren de configurar correctamente sus sitios para usar certificados de seguridad.

En resumen, navegar con HTTPS y no ingresar datos en páginas sin seguridad son medidas básicas pero muy importantes para mantener la información protegida.
