<?php
require_once __DIR__ . "/../models/Curso.php";
class CursoController {
    public function index(){
        $cursos = Curso::obtenerTodos();
        require_once __DIR__ . "/../views/cursos/listado.php";
    }

    public function crear(){
        require_once __DIR__ . "/../views/cursos/formulario.php";
    }

    public function guardar(){
        try{
            //Validar los datos recibidos por POST
            if(isset($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["capacidadMaxima"])){
                $id = (int)$_POST["id"];
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $capacidadMaxima = (int)$_POST["capacidadMaxima"];
                $curso_buscado = Curso::buscarPorId($id);

                if($curso_buscado){//Si ya existe el curso
                    Curso::editar($id, $nombre, $descripcion, $capacidadMaxima);
                } else{
                    //Se crea un nuevo curso
                    $curso = new Curso($id, $nombre, $descripcion, $capacidadMaxima);
                    Curso::guardar($curso);
                }
                //Redirigir al listado de cursos
                header("Location: index.php?controller=curso&action=index");
                exit;
            } else {
                throw new Exception("Faltan datos del formulario.");
            }

        } catch (Exception $e){
            //Manejo de errores
            echo  "<h1>Error</h1>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }

    public function editar(){
        //Verificar que el Id está en la URL
        if (isset($_GET["id"])){
            $id = (int)$_GET["id"];
            $curso = Curso::buscarPorId($id); //Buscamos al curso por el ID del form

            if($curso){
                // Si existe el curso, lo pasamos a la vista
                require_once __DIR__ . "/../views/cursos/editar.php";//crear vista
            } else {
                //Si no existe el curso, redirigimos al listado
                header("Location: index.php?controller=curso&action=index");
                exit;
            }
        } else {
            //Si no se ha proporcionado un Id válido, redirigmos al listado
            header("Location: index.php?controller=curso&action=index");
            exit;
        }
    }
    
    public function eliminar(){
        $id = (int)$_GET["id"];
        Curso::eliminar($id);
        header("Location: index.php?controller=curso&action=index");
    }

    public function detalle(){
        if(!isset($_GET["id"])){
            echo "Error: No se ha proporcionado un ID válido.";
            return;
        }

        $id = $_GET["id"];
        $curso = Curso::buscarPorId($id);

        if($curso){
            require_once __DIR__ . "/../views/cursos/detalle.php";
        } else {
            echo "Error: Curso no encontrado.";
        }
    }
}
?>