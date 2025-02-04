<?php

namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Entrenador;

class EntrenadorController
{
    private $registrosPorPagina = 10;

    public function mostrarEntrenadores($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenadores = $entrenadorM->cargarTodoPaginado($pagina, $this->registrosPorPagina);
        $totalEntrenadores = $entrenadorM->contarTodos();

        $totalPaginas = ceil($totalEntrenadores / $this->registrosPorPagina);
        $datos = compact("entrenadores", "pagina", "totalPaginas");

        Utils::render('entrenador/lista', $datos);
    }

    public function mostrarEquiposEntrenador($datos)
    {
        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $equipos = $entrenadorM->obtenerEquipos($datos['id']);
        echo json_encode($equipos);
    }

    public function mostrarEntrenador($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenador = $entrenadorM->cargar($datos['id']);
        $jugadores = $entrenadorM->obtenerJugadores($datos['id']);
        $equipos = $entrenadorM->obtenerEquipos($datos['id']);
        $datos = compact("entrenador", "jugadores", "equipos", "pagina");

        Utils::render('entrenador/ver', $datos);
    }

    public function crearEntrenador()
    {
        Utils::render('entrenador/crear');
    }

    public function insertarEntrenador()
    {
        $entrenador = $_POST;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenadorM->insertar($entrenador);

        $totalEntrenadores = $entrenadorM->contarTodos();
        $pagina = ceil($totalEntrenadores / $this->registrosPorPagina);

        Utils::redirect("/entrenadores?pagina=$pagina");
    }

    public function mostrarModificarEntrenador($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenador = $entrenadorM->cargar($datos['id']);
        $datos = compact("entrenador", "pagina");

        Utils::render('entrenador/modificar', $datos);
    }

    public function modificarEntrenador($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $entrenador = $_POST;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenadorM->modificar($id, $entrenador);

        Utils::redirect("/entrenadores?pagina=$pagina");
    }

    public function eliminarEntrenador($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $entrenadorM = new Entrenador($con);
        $entrenadorM->borrar($id);

        Utils::redirect("/entrenadores?pagina=$pagina");
    }
}
