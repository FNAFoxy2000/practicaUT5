<?php
class Curso{
    public $id;
    public $nombre;
    public $descripcion;
    public $capacidadMaxima;

    public function __construct($id, $nombre, $descripcion, $capacidadMaxima){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->capacidadMaxima = $capacidadMaxima;
    }
    
    public static function obtenerTodos() {
    return $_SESSION["cursos"];
    }

    public static function buscarPorId(int $id){
        foreach($_SESSION["cursos"] as $curso){
            if($curso->id == $id){
                return $curso;
            }
        }
        return null;
    }

    public static function guardar(Curso $curso){
        $_SESSION["cursos"][] = $curso;
    }

    public static function editar($id, $nombre, $descripcion, $capacidadMaxima){
        foreach($_SESSION["cursos"] as $indice => $cur){
            if($cur->id === $id){
                //Actualizar los datos si se le en sesión
                $_SESSION["cursos"][$indice]->nombre = $nombre;
                $_SESSION["cursos"][$indice]->descripcion = $descripcion;
                $_SESSION["cursos"][$indice]->capacidadMaxima = $capacidadMaxima;

                return $_SESSION["cursos"][$indice];
            }
        }
        return null; //En caso de que no haya un curso con ese id
    }

    public static function eliminar($id){
        foreach($_SESSION["cursos"] as $indice=> $cur){
            if($cur->id == $id){
                array_splice($_SESSION["cursos"], $indice, 1);
            }
        }
    }
}
