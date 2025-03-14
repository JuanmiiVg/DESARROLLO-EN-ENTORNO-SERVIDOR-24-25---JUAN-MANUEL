<?php

namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Equipo;
use App\Model\Partido;

class equipoController
{
    public function eliminarEquipo($datos)
    {
        $con = Utils::getConnection();
        $equipoModel = new Equipo($con);
        $equipoModel->borrar($datos['id']);
        Utils::redirect('/equipos');
    }
    public function mostrarPartidos($datos)
    {
        $con = Utils::getConnection();
        $partidoModel = new Partido($con);
        $partidos = $partidoModel->cargarPartidosEquipo($datos['id']);
        $datos = compact("partidos");
        Utils::render('listaPartidos', $datos);
    }
    public function mostrarCambiarCancha($datos)
    {
        $con = Utils::getConnection();
        $equipoModel = new Equipo($con);
        $equipo = $equipoModel->cargar($datos['id']);
        $canchas = $equipoModel->cargarTodasCanchas();
        $datos = compact("equipo", "canchas");
        Utils::render('cambiarCancha', $datos);
    }
    public function cambiarCancha($datos)
    {
        $con = Utils::getConnection();
        $equipoModel = new Equipo($con);
        $equipoModel->cambiarCanchaEquipo($datos['id']);
        Utils::redirect('/equipos');
    }
}
