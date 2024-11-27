<?php
class Matricula{
    public $id;
    public $niaEstudiante;
    public $idCurso;
    public $fecha;

    public function __construct($id, $niaEstudiante, $idCurso){
        $this->id = $id;
        $this->niaEstudiante = $niaEstudiante;
        $this->idCurso = $idCurso;
        $this->fecha = new DateTime();
    }
    
    public static function obtenerTodos() {
    return $_SESSION["matriculas"];
    }

    public static function buscarPorId(int $id){
        foreach($_SESSION["matriculas"] as $matricula){
            if($matricula->id == $id){
                return $matricula;
            }
        }
        return null;
    }

    public static function guardar(Matricula $matricula){
        $_SESSION["matriculas"][] = $matricula;
    }

    public static function eliminar($id){
        foreach($_SESSION["matriculas"] as $indice=> $mat){
            if($mat->id == $id){
                array_splice($_SESSION["matriculas"], $indice, 1);
            }
        }
    }
}
