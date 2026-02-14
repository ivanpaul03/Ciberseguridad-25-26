<h1 align="center">Seguridad de las Contraseñas</h1>

<h1 align="center">
  <img width="370" height="244" alt="image" src="https://github.com/user-attachments/assets/e47d9296-7992-4ce0-8951-4db922dad020" />
</h1>

**Fecha**: 14/02/2026  
**Autor**: Iván Paúl Alba  

---

## Índice

1. [Introducción](#1-introducción)  
2. [Crackeo de hashes (3 y 4 caracteres)](#2-crackeo-de-hashes-3-y-4-caracteres)  
3. [Cálculo de combinaciones y estimación de tiempo](#3-cálculo-de-combinaciones-y-estimación-de-tiempo)  
4. [Uso de GPU en ataques de fuerza bruta](#4-uso-de-gpu-en-ataques-de-fuerza-bruta)  
5. [Crackeo de contraseñas de 8 caracteres](#5-crackeo-de-contraseñas-de-8-caracteres)  

---

## 1. Introducción

En esta práctica se analiza la seguridad de las contraseñas mediante la realización de ataques de fuerza bruta utilizando un alfabeto de 70 caracteres:

a b c d e f g h i j k l m n o p q r s t u v w x y z
A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
1 2 3 4 5 6 7 8 9 0 $ % & / = + @ #

El objetivo es comprender cómo influye la longitud de la contraseña en el número de combinaciones posibles y en el tiempo necesario para su descubrimiento.

## 2. Ejecutar el script proporcionado para crackear los hashes

Ejecutar el script proporcionado para crackear los hashes, usando el alfabeto proporcionado e indicando el tiempo empleado. Para calcular el tiempo se recomienda utilizar el comando `time` y el valor `user` que este comando proporciona. Posteriormente modificar el script proporcionado para encontrar la contraseña de 4 caracteres de la tarea a.2. En este último caso, explicar qué habéis hecho y adjuntar el código del script modificado.

#### Tabla de resultados

| Tarea | Número de Caracteres | Salt | Hash | Contraseña | Tiempo |
|-------|----------------------|------|------|------------|--------|
| a.1   | 3                    | HO   | HOIW.bruCnPcY |     abc       |    10 minutos    |
| a.2   | 4                    | LA   | LA2dsdwOhjmNc |       1234     |    20 minutos    |

---

## 3. Cálculo de combinaciones posibles

Calculad todas las combinaciones posibles que se deberían comprobar para encontrar contraseñas de **3, 4, 6 y 8 caracteres** asumiendo el alfabeto anteriormente indicado.

Además, estimar el tiempo que sería necesario en la máquina utilizada para realizar todas esas comprobaciones. Comentad los resultados obtenidos.

---

## 4. Uso de GPU en ataques de fuerza bruta

¿Cómo una **GPU (Graphic Processing Unit)** puede ayudarnos a reducir los tiempos de búsqueda en los ataques de fuerza bruta?

---

### 5. Modificación del script para contraseñas de 8 caracteres

Modificar el script para encontrar las dos contraseñas de 8 caracteres que se indican en la tabla que viene a continuación. Explicar qué habéis hecho y adjuntar el código del script modificado.

#### Tabla de resultados

| Tarea | Número de Caracteres | Salt | Hash | Contraseña | Tiempo |
|-------|----------------------|------|------|------------|--------|
| d.1   | 8                    | AD   | ADQAJHSRrkKFY |            |        |
| d.2   | 8                    | EU   | EU5T7QS5OFffI |            |        |
