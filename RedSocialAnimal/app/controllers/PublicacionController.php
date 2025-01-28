<?php

require_once 'libs/conexion.php';
require_once 'models/Publicacion.php';

class PublicacionController
{
    private $publicacionModel;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->publicacionModel = new Publicacion($conexion);
    }

    public function listarPublicaciones($pagina = 1, $porPagina = 10)
    {
        $offset = ($pagina - 1) * $porPagina;
        $publicaciones = $this->publicacionModel->obtenerPublicaciones($porPagina, $offset);
        include 'views/publicaciones/listar.php'; // Cargar la vista con los datos
    }

    public function detallePublicacion($id)
    {
        $publicacion = $this->publicacionModel->obtenerPorId($id);
        include 'views/publicaciones/detalle.php'; // Cargar la vista con los datos
    }
}
