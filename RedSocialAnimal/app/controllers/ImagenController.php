<?php

require_once 'libs/conexion.php';
require_once 'models/Imagen.php';

class ImagenController
{
    private $imagenModel;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->imagenModel = new Imagen($conexion);
    }

    public function obtenerImagenesPorPublicacion($idPublicacion)
    {
        $imagenes = $this->imagenModel->obtenerPorPublicacion($idPublicacion);
        include 'views/imagenes/listar.php'; // Cargar la vista con las imágenes
    }
}
