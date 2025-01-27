<?php

require_once __DIR__ . '/../models/Imagen.php';

class ImagenController
{
    private $modeloImagen;

    public function __construct()
    {
        $this->modeloImagen = new Imagen();
    }

    // Listar imágenes de una publicación
    public function listarPorPublicacion($idPublicacion)
    {
        return $this->modeloImagen->obtenerPorPublicacion($idPublicacion);
    }

    // Insertar una nueva imagen
    public function insertar($idPublicacion, $nombreArchivo)
    {
        if ($this->modeloImagen->insertarImagen($idPublicacion, $nombreArchivo)) {
            header('Location: /publicacion/detalle.php?id=' . $idPublicacion);
        } else {
            die("Error al insertar la imagen.");
        }
    }

    // Eliminar una imagen
    public function eliminar($idImagen, $idPublicacion)
    {
        if ($this->modeloImagen->eliminarImagen($idImagen)) {
            header('Location: /publicacion/detalle.php?id=' . $idPublicacion);
        } else {
            die("Error al eliminar la imagen.");
        }
    }
}
