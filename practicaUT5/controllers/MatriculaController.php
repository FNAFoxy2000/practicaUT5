<?php
require_once __DIR__ . "/../models/Matricula.php";
class MatriculaController
{
    public function index()
    {
        $matriculas = Matricula::obtenerTodos();
        require_once __DIR__ . "/../views/matriculas/listado.php";
    }

    public function crear()
    {
        require_once __DIR__ . "/../views/matriculas/inscripcion.php";
    }

    public function guardar()
    {
        try {
            //Validar los datos recibidos por POST
            if (isset($_POST["id"], $_POST["niaEstudiante"], $_POST["idCurso"])) {
                $id = (int)$_POST["id"];
                $niaEstudiante = $_POST["niaEstudiante"];
                $idCurso = $_POST["idCurso"];
                $matricula_buscado = Matricula::buscarPorId($id);
                $estudiante_buscado = Estudiante::buscarPorNIA($niaEstudiante);
                $curso_buscado = Curso::buscarPorId($idCurso);

                if ($matricula_buscado) { //Si ya existe el matricula
                    throw new Exception("La matrícula ya existe.");
                    // Matricula::editar($id, $niaEstudiante, $idCurso);
                } else if (!$estudiante_buscado) {
                    throw new Exception("Estudiante no existe.");
                } else if (!$curso_buscado) {
                    throw new Exception("El curso no existe.");
                }
                $matriculas = Matricula::obtenerTodos();
                //Se comprueba que el alumno no esté en el curso
                $contAlumnosCurso = 0;
                foreach ($matriculas as $matricula) {
                    if ($matricula->niaEstudiante === $niaEstudiante && $matricula->idCurso === $idCurso) {
                        throw new Exception("El estudiante ya pertenece a ese curso");
                    }
                    //Se suma la cantidad de matriculas en ese curso (1 matricula = 1 estudiante)
                    if ($matricula->idCurso === $idCurso) {
                        $contAlumnosCurso++;
                    }
                }
                // obtener la capacidad del curso                       
                if ($contAlumnosCurso >= $curso_buscado->capacidadMaxima) {
                    throw new Exception("El curso está completo. Capacidad máxima: " . $curso_buscado->capacidadMaxima);
                }


                //Se crea un nuevo matricula
                $matricula = new Matricula($id, $niaEstudiante, $idCurso);
                Matricula::guardar($matricula);
                //Redirigir al listado de matriculas
                header("Location: index.php?controller=matricula&action=index");
                exit;
            } else {
                throw new Exception("Faltan datos del formulario.");
            }
        } catch (Exception $e) {
            //Manejo de errores
            echo  "<h1>Error</h1>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }

    // public function editar(){
    //     //Verificar que el Id está en la URL
    //     if (isset($_GET["id"])){
    //         $id = (int)$_GET["id"];
    //         $matricula = Matricula::buscarPorId($id); //Buscamos al matricula por el ID del form

    //         if($matricula){
    //             // Si existe el matricula, lo pasamos a la vista
    //             require_once __DIR__ . "/../views/matriculas/editar.php";//crear vista
    //         } else {
    //             //Si no existe el matricula, redirigimos al listado
    //             header("Location: index.php?controller=matricula&action=index");
    //             exit;
    //         }
    //     } else {
    //         //Si no se ha proporcionado un Id válido, redirigmos al listado
    //         header("Location: index.php?controller=matricula&action=index");
    //         exit;
    //     }
    // }

    public function eliminar()
    {
        $id = (int)$_GET["id"];
        Matricula::eliminar($id);
        header("Location: index.php?controller=matricula&action=index");
    }

    public function detalleCurso(){
        if (!isset($_GET["idCurso"])) {
            echo "Error: No se ha proporcionado un ID válido.";
            return;
        }
        
        $idCurso = $_GET["idCurso"];
        $matriculas = Matricula::obtenerTodos();

        if ($matriculas) {
            require_once __DIR__ . "/../views/matriculas/detalleCurso.php";
        } else {
            echo "Error: Matricula no encontrado.";
        }
    }

    public function detalleEstudiante()
    {
        if (!isset($_GET["niaEstudiante"])) {
            echo "Error: No se ha proporcionado un NIA válido.";
            return;
        }
        
        $niaEstudiante = $_GET["niaEstudiante"];
        $matriculas = Matricula::obtenerTodos();

        if ($matriculas) {
            require_once __DIR__ . "/../views/matriculas/detalleEstudiante.php";
        } else {
            echo "Error: Matricula no encontrado.";
        }
    }
}
