<?php
require_once __DIR__ . "/../models/Estudiante.php";
class EstudianteController {
    public function index() {
        $estudiantes = Estudiante::obtenerTodos();
        require_once __DIR__ . '/../views/estudiantes/listado.php';
    }

    public function crear() {
        require_once __DIR__ . '/../views/estudiantes/formulario.php';
    }

    public function guardar() {
        try {
            // Validar los datos recibidos por el POST
            if (isset($_POST['nia'], $_POST['nombre'], $_POST['apellidos'], $_POST['edad'])) {
                $nia = (int)$_POST['nia'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $edad = (int)$_POST['edad'];
                $estudiante_buscado = Estudiante::buscarPorNIA($nia);
                if($estudiante_buscado){// si ya existe el estudiante
                    Estudiante::editar($nia, $nombre, $apellidos, $edad);
                }else{
                    // Crear un nuevo estudiante usando el modelo
                    $estudiante = new Estudiante($nia, $nombre, $apellidos, $edad);
                    Estudiante::guardar($estudiante);
                }
               // Redirigir al listado de estudiantes
                header("Location: index.php?controller=estudiante&action=index");
                exit;            
            } else {
                throw new Exception("Faltan datos del formulario.");
            }
        } catch (Exception $e) {
            // Manejar errores
            echo "<h1>Error</h1>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    public function editar() {
        // Verificar que el NIA está en la URL
        if (isset($_GET['nia'])) {
            $nia = (int) $_GET["nia"];
            $estudiante = Estudiante::buscarPorNIA($nia);  // Buscar al estudiante por NIA
    
            if ($estudiante) {
                // Si el estudiante existe, pasarlo a la vista
                require_once __DIR__ . '/../views/estudiantes/editar.php';
            } else {
                // Si no se encuentra el estudiante, redirige al listado
                header("Location: index.php?controller=estudiante&action=index");
                exit;
            }
        } else {
            // Si no se ha proporcionado un NIA válido, redirige al listado
            header("Location: index.php?controller=estudiante&action=index");
            exit;
        }
    }
    
    public function eliminar() {
        $nia = (int)$_GET['nia'];
        Estudiante::eliminar($nia);
        header("Location: index.php?controller=estudiante&action=index");
    }

    public function detalle() {
        if (!isset($_GET['nia'])) {
            echo "Error: No se proporcionó un NIA válido.";
            return;
        }
    
        $nia = $_GET['nia'];
        $estudiante = Estudiante::buscarPorNIA($nia);
    
        if ($estudiante) {
            require_once __DIR__ . '/../views/estudiantes/detalle.php';
        } else {
            echo "Error: Estudiante no encontrado.";
        }
    }
}
?>
