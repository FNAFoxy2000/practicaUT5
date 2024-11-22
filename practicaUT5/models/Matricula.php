<?php
class Matricula{
    public $id;
    public $niaEstudiante;
    public $idCurso;
    public $fecha = (new DateTime())->format('Y-m-d');

    public function __construct($id, $niaEstudiante, $idCurso){
        $this->id = $id;
        $this->niaEstudiante = $niaEstudiante;
        $this->idCurso = $idCurso;
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

    // public static function editar($id, $niaEstudiante, $idCurso){
    //     foreach($_SESSION["matriculas"] as $indice => $mat){
    //         if($mat->id === $id){
    //             //Actualizar los datos si se le en sesión
    //             $_SESSION["matriculas"][$indice]->niaEstudiante = $niaEstudiante;
    //             $_SESSION["matriculas"][$indice]->idCurso = $idCurso;

    //             return $_SESSION["matriculas"][$indice];
    //         }
    //     }
    //     return null; //En caso de que no haya un matricula con ese id
    // }

    public static function eliminar($id){
        foreach($_SESSION["matriculas"] as $indice=> $mat){
            if($mat->id == $id){
                array_splice($_SESSION["matriculas"], $indice, 1);
            }
        }
    }
}
