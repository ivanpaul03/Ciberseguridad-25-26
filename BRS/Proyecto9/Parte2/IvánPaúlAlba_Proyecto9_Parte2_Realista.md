<h1 align="center">Despliegue de Servidor Seguro (HTTPS)</h1>

***Fecha:*** 26 de abril de 2026<br>
***Autor:*** Iván Paúl Alba

---

## Índice
1. [Introducción](#1-introducción)
2. [Configuración de la Red y el Dominio](#2-configuración-de-la-red-y-el-dominio)
3. [Instalación y Configuración del Servidor](#3-instalación-y-configuración-del-servidor)
4. [Generación del Certificado SSL](#4-generación-del-certificado-ssl)
5. [Análisis Comparativo y Resultado Final](#5-análisis-comparativo-y-resultado-final)
6. [Conclusiones finales](#6-conclusiones-finales)

---

## 1. Introducción
En esta práctica me he propuesto montar un servidor web en la nube (usando AWS) y hacerlo seguro. Al principio parece fácil, pero me he dado cuenta de que si no cuadras bien la IP, el nombre del dominio y los puertos de seguridad, no te funciona nada. He pasado de tener una terminal que me daba errores a tener una web con su candado de seguridad funcionando perfectamente.

## 2. Configuración de la Red y el Dominio
Lo primero que hice fue crear una instancia en AWS y un dominio gratuito en DuckDNS. Aquí es donde tuve los primeros líos. 

Al principio, mi dominio `ivan-proyecto-seguridad` apuntaba a una IP que no era la de mi servidor. Tuve que entrar en el panel de DuckDNS y actualizar la IP manualmente a la `13.49.245.43`, que es la que me dio Amazon. También tuve que abrir los "pasadizos" (puertos) en AWS: el 22 para poder entrar yo por consola, el 80 para la web normal y el 443 para la web segura.

**Evidencia de los puertos configurados:**

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/81d68f0d-32f5-4ef9-8c84-eff2936f3106" />


**Evidencia del dominio actualizado:**

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/7a01941c-5b36-48f4-bf31-721e2a3e46aa" />

## 3. Instalación y Configuración del Servidor
Una vez que la red estaba lista, entré por consola a mi máquina. He usado una instancia de Amazon Linux 2023. Instalé Nginx para que la web funcionara, pero al intentar poner el certificado, me daba error porque no encontraba el nombre de mi dominio en la configuración.

Tuve que editar el archivo de configuración a mano para que el servidor supiera que se llama `ivan-proyecto-bastionado.duckdns.org`. Después de eso, todo empezó a rodar.

**Detalles de mi instancia en AWS:**

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/2c2a9c52-811d-414d-a3a4-bee90685acfa" />

## 4. Generación del Certificado SSL
Para conseguir el candado usé **Certbot**, que es una herramienta de **Let's Encrypt**. Es genial porque hace casi todo el trabajo sucio por ti: habla con la entidad certificadora, demuestra que el dominio es mío y me descarga los archivos de seguridad.

Como se ve en la captura de abajo, después de pelearme un rato con los comandos, por fin conseguí el mensaje de "Successfully deployed", lo que significaba que el certificado ya estaba puesto en su sitio.

**Evidencia de éxito en la terminal:**

<img width="707" height="100" alt="image" src="https://github.com/user-attachments/assets/98b89858-b11b-444d-aa9f-b1de025a5e29" />

**Estado del certificado recién creado:**

<img width="671" height="203" alt="image" src="https://github.com/user-attachments/assets/a9f51213-50a5-447b-a2a7-effdee2c1dfb" />

## 5. Análisis Comparativo y Resultado Final
Para terminar, comprobé que el candado aparecía en mi navegador. Entré en mi web y abrí el visor de certificados para ver los detalles técnicos.

He comparado mi certificado con el de **Google** y hay diferencias curiosas. El mío lo ha emitido **Let's Encrypt** y solo dura 90 días (se supone que es para que sea más seguro y se renueve solo). El de Google lo emite su propia entidad (**Google Trust Services**) y, aunque también son periodos cortos, es una entidad mucho más grande y con otros niveles de validación.

**Captura de mi certificado (Let's Encrypt):**

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/1526e24b-fdd3-4945-99e3-70615fe3b977" />

**Captura del certificado de Google (Comparativa):**

<img width="960" height="540" alt="image" src="https://github.com/user-attachments/assets/e80d133d-ac9d-425c-b161-3fcdd4368c02" />

Al final, he aprendido que la ciberseguridad no es solo instalar cosas, sino entender cómo se comunican las máquinas entre sí. ¡Objetivo conseguido!

## 6. Conclusiones finales

Después de haber completado todo el proceso, me quedo con tres ideas clave que he aprendido "a las malas":

1. **La seguridad es una cadena:** No sirve de nada tener el mejor certificado del mundo si el "muro" de Amazon (el Security Group) tiene los puertos cerrados. He aprendido que para que el HTTPS funcione, todas las piezas (IP, DNS, Firewall y Servidor) tienen que estar perfectamente alineadas. Si falla una, falla todo.

2. **Certificados gratuitos vs. de pago:** Antes pensaba que un certificado era algo carísimo y difícil de conseguir. Gracias a Let's Encrypt he visto que se puede securizar una web de forma gratuita y profesional. La diferencia con Google no es que su web sea "más segura", sino que su certificado valida quiénes son ellos como empresa, mientras que el mío solo valida que el dominio es mío.

3. **Aprender de los errores:** Lo que más me ha servido ha sido pegarme con los errores de configuración de Nginx. Entender que el servidor necesita saber exactamente qué nombre de dominio tiene que responder fue el momento donde todo me hizo "clic". Ahora me siento mucho más cómodo manejando una terminal Linux y gestionando la seguridad de un servidor real.

En definitiva, esta práctica me ha servido para ver que el "bastionado" no es solo instalar un programa, sino configurar cada capa del sistema para que no haya puntos débiles.
