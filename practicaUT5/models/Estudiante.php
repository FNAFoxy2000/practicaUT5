<?php
class Estudiante {
    public $nia;
    public $nombre;
    public $apellidos;
    public $edad;

    public function __construct($nia, $nombre, $apellidos, $edad) {
        $this->nia = $nia;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public static function obtenerTodos() {
        return $_SESSION['estudiantes'];
    }

    public static function buscarPorNIA(int $nia) {
        foreach ($_SESSION['estudiantes'] as $estudiante) {
            if ($estudiante->nia == $nia) {
                return $estudiante;
            }
        }
        return null;
    }

    public static function guardar(Estudiante $estudiante){
        $_SESSION['estudiantes'][] = $estudiante;
    }
    public static function editar($nia, $nombre, $apellidos, $edad){
        foreach ($_SESSION['estudiantes'] as $indice => $e) {
            if ($e->nia === $nia) {
                // Actualizar los datos si le ve en sesión
                $_SESSION['estudiantes'][$indice]->nombre = $nombre;
                $_SESSION['estudiantes'][$indice]->apellidos = $apellidos;
                $_SESSION['estudiantes'][$indice]->edad = $edad;

                return $_SESSION['estudiantes'][$indice];
            }
        }
        return null; // Si no lo encuentra
    }
    
    public static function eliminar($nia){
        foreach($_SESSION["estudiantes"] as $i=>$e){
            if($e->nia == $nia){
                array_splice($_SESSION["estudiantes"], $i, 1); //recordatorio: array_splice MODIFICA la array original.
            }
        }
    }
}
