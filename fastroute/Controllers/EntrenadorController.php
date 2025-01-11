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
        // Obtener el entrenador y cargar la vista de edición
        $entrenador = $this->modelo->obtenerPorId($vars['id']);
        if ($entrenador) {
            render('entrenadores/editar', compact('entrenador'));
        } else {
            echo "Entrenador no encontrado.";
        }
    }

    public function update($vars)
    {
        // Validar los datos enviados desde el formulario
        if (isset($_POST['nombre'], $_POST['experiencia'])) {
            $nombre = trim($_POST['nombre']);
            $experiencia = trim($_POST['experiencia']);

            // Actualizar los datos del entrenador
            $this->modelo->actualizar($vars['id'], $nombre, $experiencia);
            redirect('/entrenadores'); // Redirigir a la lista de entrenadores
        } else {
            echo "Faltan datos para actualizar.";
        }
    }

    public function delete($vars)
    {
        $this->modelo->eliminar($vars['id']);
        redirect('/entrenadores');
    }
}
