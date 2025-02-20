<?php

namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Jugador;
use App\Model\Equipo;

class JugadorController
{
    private $registrosPorPagina = 10;

    public function mostrarJugadores($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadores = $jugadorM->cargarTodoPaginado($pagina, $this->registrosPorPagina);
        $totalJugadores = $jugadorM->contarTodos();

        $totalPaginas = ceil($totalJugadores / $this->registrosPorPagina);
        $datos = compact("jugadores", "pagina", "totalPaginas");

        Utils::render('jugador/lista', $datos);
    }

    public function mostrarJugador($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugador = $jugadorM->cargar($datos['id']);
        $datos = compact("jugador", "pagina");

        Utils::render('jugador/ver', $datos);
    }

    public function crearJugador()
    {
        Utils::render('jugador/crear');
    }

    public function insertarJugador()
    {
        $jugador = $_POST;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->insertar($jugador);

        $totalJugadores = $jugadorM->contarTodos();
        $pagina = ceil($totalJugadores / $this->registrosPorPagina);

        Utils::redirect("/jugadores?pagina=$pagina");
    }

    public function mostrarModificarJugador($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugador = $jugadorM->cargar($datos['id']);
        $datos = compact("jugador", "pagina");

        Utils::render('jugador/modificar', $datos);
    }

    public function modificarJugador($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $jugador = $_POST;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->modificar($id, $jugador);

        Utils::redirect("/jugadores?pagina=$pagina");
    }

    public function eliminarJugador($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->borrar($id);

        Utils::redirect("/jugadores?pagina=$pagina");
    }

    public function despedirJugador($datos)
    {
        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->despedir($datos['id']);

        Utils::redirect("/entrenadores/detalle?id={$datos['entrenador_id']}");
    }
    
    public function mostrarTraspasoJugador($datos)
    {
        $con = Utils::getConnection();
        $equipoM = new equipo($con);
        $equipos = $equipoM->cargarTodo();

        $datos = compact("equipos", "jugador_id" => $datos['id']);
        Utils::render('jugador/traspasoJugador',$datos);
    }

    public function traspasarJugador($datos)
    {
        $con  = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->traspasar($datos['jugador_id'], $_POST['equipo_id']);

        Utils::redirect("/entrenadores/detalle?id={$datos['entrenador_id']}");
    }

    public function mostarFormularioInsercion()
    {
        Utils::render("jugador/insertarJugador");
    }

    public function insertarJugador()
    {
        $con = Utils::getConnection();
        $jugadorM = new Jugador($con);
        $jugadorM->insertar($_POST);

        Utils::redirect("/jugadores");
    }
}
