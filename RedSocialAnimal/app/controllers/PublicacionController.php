<?php

require_once __DIR__ . '/../models/Publicacion.php';
require_once __DIR__ . '/../models/Imagen.php';

class PublicacionController
{
    private $modeloPublicacion;
    private $modeloImagen;

    public function __construct()
    {
        $this->modeloPublicacion = new Publicacion();
        $this->modeloImagen = new Imagen();
    }

    // Listar todas las publicaciones con paginación
    public function listar($pagina = 1, $porPagina = 10)
    {
        $offset = ($pagina - 1) * $porPagina;
        return $this->modeloPublicacion->obtenerPublicaciones($porPagina, $offset);
    }

    // Mostrar detalle de una publicación
    public function detalle($id)
    {
        $publicacion = $this->modeloPublicacion->obtenerPorId($id);
        if ($publicacion) {
            $imagenes = $this->modeloImagen->obtenerPorPublicacion($id);
            return ['publicacion' => $publicacion, 'imagenes' => $imagenes];
        } else {
            die("La publicación no existe.");
        }
    }

    // Insertar una nueva publicación
    public function insertar($titulo, $contenido)
    {
        $id = $this->modeloPublicacion->insertarPublicacion($titulo, $contenido);
        if ($id) {
            header('Location: /publicacion/lista.php');
        } else {
            die("Error al insertar la publicación.");
        }
    }

    // Modificar una publicación
    public function modificar($id, $titulo, $contenido)
    {
        if ($this->modeloPublicacion->modificarPublicacion($id, $titulo, $contenido)) {
            header('Location: /publicacion/lista.php');
        } else {
            die("Error al modificar la publicación.");
        }
    }

    // Eliminar una publicación
    public function eliminar($id)
    {
        if ($this->modeloPublicacion->eliminarPublicacion($id)) {
            header('Location: /publicacion/lista.php');
        } else {
            die("Error al eliminar la publicación.");
        }
    }
}
