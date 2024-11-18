---
title: "Práctica entregable UT5 Servidor"
author: Jose Medina
date: $date
geometry: margin=2cm
output: pdf_document
---
## Gestor de estudiantes y cursos
Vamos a realizar una aplicación en parejas que lleve a cabo la gestión de diferentes estudiantes y cursos, donde podremos crear, modificar y ver estudiantes y sus matrículas en diferentes cursos.
Para ello emplearemos la arquitectura MVC y la POO.

## Estructura de directorios
Ya que estamos estudiando MVC, usaremos la siguiente estructura de carpetas:

    App
    |
    | ── controllers
    |   |──EstudianteController.php
    |   |──CursoController.php
	|	|──MatriculaController.php
	|── models
	|   |──Estudiante.php
	|	|──Curso.php
	|	|──Matricula.php
	|── views
	|	|──estudiantes
	|	|	|──listado.php
	|	|	|──formulario.php
	|	|	|──detalle.php
	|	|	|──editar.php
	|	|──cursos
	|	|	|──listado
	|	|	|──formulario.php
	|	|	|──detalle.php
	|	|	|──editar.php
	|	|──matriculas
	|	|	|──inscripcion.php
	|	|	|──listado.php
	|	|──home.html
	|──index.php

## Requisitos funcionales
### 1. Gestión de estudiantes
- Tenemos que crear un estudiante con:
	- Nombre
	- Apellidos
	- NIA
	- Edad
- Podremos ver el listado de estudiantes inscritos
- Podremos ver en detalle un estudiante concreto
- Podremos editar la información de un estudiante concreto (menos su NIA)
- Podremos eliminar un estudiante

### 2. Gestión de cursos
- Tenemos que crear un curso con:
	- id del curso
	- Nombre del curso
	- Descripción
	- Capacidad máxima
- Podremos ver el listado de cursos (solo los ids y nombres)
- Podremos ver el detalle de un curso (toda la información)
- Podremos editar los datos de un curso (menos su id)
- Podremos eliminar un curso

### 3. Gestión de matrículas (Opcional 2 Puntos extra)
- Tenemos que crear una matrícula con:
	- id de matrícula
	- nia de estudiante
	- id del curso
	- fecha de matrícula (por defecto es el día de instanciación de la matrícula)
- Tenemos que permitir inscribir estudiantes en cursos (si hay cupo disponible y no están ya inscritos)
- Podremos ver los cursos en los que está inscrito un estudiante
- Podremos ver los estudiantes inscritos en un curso

### 4. Punto de acceso común 
- Habrá un controlador principal (index.php) que será nuestro único punto de entrada para gestionar las solicitudes HTTP (todas).
- Usará las variables **GET** para saber que controlador y métodos utilizar.
- Manejará la inicialización de sesiones.
- Cargará por defecto la vista de home.php

### 5. Vista home.php
Será la página inicial de selección de acciones a tomar, básicamente consistirá en un formulario que hará una petición a cada uno de los controladores con su especificación (por ejemplo, un botón pedirá al controlador de estudiantes que gestione el mostrado del listado).

## Requisitos no funcionales
- Vais a utilizar sesiones para almacenar la información que en otro caso hubiese estado en una base de datos.
- Vais a separar la lógica de negocio, las vistas y el controlador.
- Los identificadores de cada clase no podrán modificarse con el tiempo, son constantes o de solo lectura. 
- No es necesario usar autocarga de clases, aunque podéis hacerlo

## Formato de entrega
Se busca que entreguéis un documento llamado memoria.pdf donde aparezca la explicación del flujo de información en la aplicación, se expliquen por qué se separan la lógica de negocio de las vistas y los modelos y las ventajas que esto puede traer. También hay que añadir un apartado donde se investigará en qué nos puede ayudar un framework en lugar de hacerlo con el lenguaje base.
El trabajo se realizará en parejas y debe tener capturas y comentarios de cada parte del proyecto, la idea es que entendáis el código, lo completeis y al explicarlo lo interioriceis.

