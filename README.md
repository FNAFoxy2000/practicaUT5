# 🎓 practicaUT5

Aplicación web desarrollada en **PHP** para la gestión de estudiantes, cursos y matrículas.

El proyecto fue realizado aplicando **Programación Orientada a Objetos (POO)** y la arquitectura **MVC**, separando la lógica de negocio, los controladores y las vistas.

## 🚀 Funcionalidades

### 👨‍🎓 Estudiantes

* Crear, consultar, editar y eliminar estudiantes.
* Datos: nombre, apellidos, NIA y edad.
* El NIA no puede modificarse una vez creado.

### 📚 Cursos

* Crear, consultar, editar y eliminar cursos.
* Datos: ID, nombre, descripción y capacidad máxima.
* El ID del curso no puede modificarse.

### 📝 Matrículas

* Matricular estudiantes en cursos.
* Controlar la disponibilidad de plazas.
* Evitar matrículas duplicadas.
* Consultar los cursos de un estudiante.
* Consultar los estudiantes de un curso.
* Registro automático de la fecha de matrícula.

## 🏗️ Arquitectura

El proyecto utiliza **MVC**, con una separación entre:

* **Models:** `Estudiante`, `Curso` y `Matricula`.
* **Controllers:** gestión de las peticiones y acciones.
* **Views:** interfaz y presentación de los datos.

`index.php` funciona como **punto de entrada único** de la aplicación y utiliza parámetros `GET` para determinar el controlador y método que deben ejecutarse.

## 💾 Almacenamiento

La información se almacena mediante **sesiones de PHP**, sin utilizar una base de datos.

## 🛠️ Tecnologías

* PHP
* POO
* MVC
* HTML
* Sesiones de PHP

## 📌 Estado

**Proyecto académico finalizado.**

Práctica realizada para trabajar conceptos de **desarrollo web en servidor, POO, arquitectura MVC y gestión de datos en PHP**.
