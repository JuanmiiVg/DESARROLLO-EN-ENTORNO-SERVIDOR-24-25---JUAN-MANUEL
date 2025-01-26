<?php
namespace Controllers;

use Models\Entrenador;

class EntrenadorController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Entrenador();
    }

    public function index()
    {
        $pagina = $_POST['pagina'] ?? 1;
        $cantidad = $_POST['cantidad'] ?? 10;
        $offset = ($pagina - 1) * $cantidad;

        $entrenadores = $this->modelo->listarPaginados($cantidad, $offset);
        $total = $this->modelo->contarTotal();
        $totalPaginas = ceil($total / $cantidad);

        render('index', [
            'entrenadores' => $entrenadores,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas,
            'cantidad' => $cantidad,
        ]);
    }

    public function create()
    {
        render('entrenadores/crear');
    }

    public function store()
    {
        $this->modelo->crear($_POST['nombre'], $_POST['experiencia']);
        redirect('/entrenadores');
    }

    public function show($vars)
    {
        $entrenador = $this->modelo->obtenerPorId($vars['id']);
        render('entrenadores/ver', compact('entrenador'));
    }

    public function edit($vars)
    {
        $entrenador = $this->modelo->obtenerPorId($vars['id']);
        render('entrenadores/editar', compact('entrenador'));
    }

    public function update($vars)
    {
        $this->modelo->actualizar($vars['id'], $_POST['nombre'], $_POST['experiencia']);
        redirect('/entrenadores');
    }

    public function delete($vars)
    {
        $this->modelo->eliminar($vars['id']);
        redirect('/entrenadores');
    }
}
