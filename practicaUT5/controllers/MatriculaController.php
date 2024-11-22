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
        require_once __DIR__ . "/../views/matriculas/formulario.php";
    }

    public function guardar()
    {
        try {
            //Validar los datos recibidos por POST
            if (isset($_POST["id"], $_POST["niaEstudiante"], $_POST["idCurso"], $_POST["fecha"])) {
                $id = (int)$_POST["id"];
                $niaEstudiante = $_POST["niaEstudiante"];
                $idCurso = $_POST["idCurso"];
                $fecha = (int)$_POST["fecha"];
                $matricula_buscado = Matricula::buscarPorId($id);
                $niaEstudiante_buscado = Estudiante::buscarPorNIA($niaEstudiante);
                $idCurso_buscado = Curso::buscarPorId($idCurso);

                if ($matricula_buscado) { //Si ya existe el matricula
                    throw new Exception("La matrícula ya existe.");
                    // Matricula::editar($id, $niaEstudiante, $idCurso);
                } else if ($niaEstudiante_buscado && $idCurso_buscado) {
                    $matriculas = Matricula::obtenerTodos();
                    //Se comprueba que el alumno no esté en el curso
                    $contAlumnosCurso = 0;
                    foreach($matriculas as $matricula){
                        if($matricula["niaEstudiante"] == $niaEstudiante_buscado && $matricula["idCurso"] == $idCurso_buscado){
                            throw new Exception("El estudiante ya pertenece a ese curso");
                        }
                        //Se comprueba que ese curso tenga espacio 
                        if($matricula["idCurso"] == $idCurso_buscado){
                            $contAlumnosCurso++;
                        }
                        
                    }
                    // obtener la capacidad del curso                       
                    $cur = $this->obtenerCurso($idCurso_buscado);
                    if($contAlumnosCurso > $cur->capacidadMaxima){
                        throw new Exception("El curso está completo. Capacidad máxima: " . $cur->capacidadMaxima);
                    }
                    

                    //Se crea un nuevo matricula
                    $matricula = new Matricula($id, $niaEstudiante, $idCurso);
                    Matricula::guardar($matricula);
                }
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

    public function obtenerCurso($idCurso_buscado)
    {
        $cursos = Curso::obtenerTodos();
        foreach($cursos as $cur){
            if($cur->id == $idCurso_buscado){
                return $cur;
            }
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

    public function detalle()
    {
        if (!isset($_GET["id"])) {
            echo "Error: No se ha proporcionado un ID válido.";
            return;
        }

        $id = $_GET["id"];
        $matricula = Matricula::buscarPorId($id);

        if ($matricula) {
            require_once __DIR__ . "/../views/matriculas/detalle.php";
        } else {
            echo "Error: Matricula no encontrado.";
        }
    }
}
