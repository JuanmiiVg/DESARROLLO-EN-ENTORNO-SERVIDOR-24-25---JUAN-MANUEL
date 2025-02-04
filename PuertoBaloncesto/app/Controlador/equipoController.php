<?php

namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Equipo;

class EquipoController
{
    private $registrosPorPagina = 10; // Ajusta este valor según tus necesidades

    public function mostrarEquipos($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipos = $equipoM->cargarTodoPaginado($pagina, $this->registrosPorPagina);
        $totalEquipos = $equipoM->contarTodos();

        $totalPaginas = ceil($totalEquipos / $this->registrosPorPagina);
        $datos = compact("equipos", "pagina", "totalPaginas");

        Utils::render('equipo/lista', $datos);
    }

    public function mostrarEquipo($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipo = $equipoM->cargar($datos['id']);
        $datos = compact("equipo", "pagina");

        Utils::render('equipo/ver', $datos);
    }

    public function crearEquipo()
    {
        Utils::render('equipo/crear');
    }

    public function insertarEquipo()
    {
        $equipo = $_POST;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipoM->insertar($equipo);

        // Calcular la página en la que se encuentra el nuevo registro
        $totalEquipos = $equipoM->contarTodos();
        $pagina = ceil($totalEquipos / $this->registrosPorPagina);

        Utils::redirect("/equipos?pagina=$pagina");
    }

    public function mostrarModificarEquipo($datos)
    {
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipo = $equipoM->cargar($datos['id']);
        $datos = compact("equipo", "pagina");

        Utils::render('equipo/modificar', $datos);
    }

    public function modificarEquipo($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $equipo = $_POST;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipoM->modificar($id, $equipo);

        Utils::redirect("/equipos?pagina=$pagina");
    }

    public function eliminarEquipo($datos)
    {
        $id = $datos['id'];
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        $con = Utils::getConnection();
        $equipoM = new Equipo($con);
        $equipoM->borrar($id);

        Utils::redirect("/equipos?pagina=$pagina");
    }
}
