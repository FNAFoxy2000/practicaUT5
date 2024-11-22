<?php
//tenéis que poner los require delante de la sesión, porque como metemos los objetos en la sesión tiene que saber deserializarlos
require_once __DIR__ . '/models/Estudiante.php';
require_once __DIR__ . '/controllers/EstudianteController.php';
require_once __DIR__ . '/models/Curso.php';
require_once __DIR__ . '/controllers/CursoController.php';
require_once __DIR__ . '/models/Matricula.php';
require_once __DIR__ . '/controllers/MatriculaController.php';



session_start();

// Inicializamos la sesión simulando la base de datos
if (!isset($_SESSION['estudiantes'])) {
    $_SESSION['estudiantes'] = [];
}

if (!isset($_SESSION['cursos'])) {
    $_SESSION['cursos'] = [];
}

if (!isset($_SESSION['matriculas'])) {
    $_SESSION['matriculas'] = [];
}

$ruta_por_defecto = __DIR__ ."/views/home.html";

//va a comprobar qué controlador hay que usar
if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["controller"])){
        $controlador = ucfirst($_GET["controller"]);
    }else{
        $controlador = null;
    }
    if(isset($_GET["action"])){
        $accion = $_GET["action"];
    }else{
        $accion = "index";
    }
    echo "El controlador implicado es: $controlador<br>";
    echo "La acción es: $accion<br>";
    if($controlador){
        try{
            $ruta_controlador = __DIR__ . "/controllers/" . $controlador . "Controller.php";
            echo "$ruta_controlador <br>";
            if(file_exists($ruta_controlador)){
                require_once $ruta_controlador;
                $nombreControlador = $controlador . "Controller.php";
                $nombreClase = $controlador . "Controller";
                echo "$nombreControlador <br>";
                if(!class_exists($nombreClase)){
                    throw new Exception("La clase controlador: '$nombreClase' no existe");
                }
                $objControlador = new $nombreClase();  // creamos el objeto controlador
                if(!method_exists($objControlador, $accion)){
                    throw new Exception("El método '$accion' no existe en la clase '$nombreClase'");
                }
                $objControlador->$accion();
            }else{ // si la ruta del controlador no existe, carga la vista home
                require_once $ruta_por_defecto;
            }
        }catch(Exception $e){
            echo "<h1>Error</h1>";
            echo "<p>".htmlspecialchars($e->getMessage())."</p>";
        }
    }else{ // en el caso de que no exista controlador en la petición, cargamos la vista home
        require_once $ruta_por_defecto;
    }

}else if($_SERVER["REQUEST_METHOD"] === "POST"){ // está duplicado, sí, pero por convención se intenta separar al máximo los MÉTODOS GET y POST, ya que no sirven para lo mismo.
    if(isset($_GET["controller"])){
        $controlador = ucfirst($_GET["controller"]);
    }else{
        $controlador = null;
    }
    if(isset($_GET["action"])){
        $accion = $_GET["action"];
    }else{
        $accion = "index";
    }
    echo "$controlador<br>";
    echo "$accion<br>";
    if($controlador){
        try{
            $ruta_controlador = __DIR__ . "/controllers/" . $controlador . "Controller.php";
            echo "$ruta_controlador <br>";
            if(file_exists($ruta_controlador)){
                require_once $ruta_controlador;
                $nombreControlador = $controlador . "Controller.php";
                $nombreClase = $controlador . "Controller";
                echo "$nombreControlador <br>";
                if(!class_exists($nombreClase)){
                    throw new Exception("La clase controlador: '$nombreClase' no existe");
                }
                $objControlador = new $nombreClase();  // creamos el objeto controlador
                if(!method_exists($objControlador, $accion)){
                    throw new Exception("El método '$accion' no existe en la clase '$nombreClase'");
                }
                $objControlador->$accion();
            }else{ // si la ruta del controlador no existe, carga la vista home
                require_once $ruta_por_defecto;
            }
        }catch(Exception $e){
            echo "<h1>Error Grave</h1>";
            echo "<p>".htmlspecialchars($e->getMessage())."</p>";
        }
    }else{ // en el caso de que no exista controlador en la petición, cargamos la vista home
        require_once $ruta_por_defecto;
    }
}
