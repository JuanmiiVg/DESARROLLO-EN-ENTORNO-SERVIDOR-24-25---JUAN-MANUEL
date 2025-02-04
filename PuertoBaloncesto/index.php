<?php

require_once __DIR__ . '/vendor/autoload.php';

use FastRoute\RouteCollector;
use Dotenv\Dotenv;
use App\Controlador\EntrenadorController;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

    // Rutas para jugadores
    $r->addRoute('GET', '/jugadores', ['App\Controlador\JugadorController', 'mostrarJugadores']);
    $r->addRoute('GET', '/jugadores/{id:\d+}', ['App\Controlador\JugadorController', 'mostrarJugador']);
    $r->addRoute('GET', '/jugadores/crear', ['App\Controlador\JugadorController', 'crearJugador']);
    $r->addRoute('POST', '/jugadores/crear', ['App\Controlador\JugadorController', 'insertarJugador']);
    $r->addRoute('GET', '/jugadores/{id:\d+}/eliminar', ['App\Controlador\JugadorController', 'eliminarJugador']);
    $r->addRoute('POST', '/jugadores/{id:\d+}/modificar', ['App\Controlador\JugadorController', 'modificarJugador']);
    $r->addRoute('GET', '/jugadores/{id:\d+}/modificar', ['App\Controlador\JugadorController', 'mostrarModificarJugador']);

    // Rutas para entrenadores
    $r->addRoute('GET', '/', ['App\Controlador\EntrenadorController', 'mostrarEntrenadores']);
    $r->addRoute('GET', '/entrenadores', ['App\Controlador\EntrenadorController', 'mostrarEntrenadores']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}', ['App\Controlador\EntrenadorController', 'mostrarEntrenador']);
    $r->addRoute('GET', '/entrenadores/crear', ['App\Controlador\EntrenadorController', 'crearEntrenador']);
    $r->addRoute('POST', '/entrenadores/crear', ['App\Controlador\EntrenadorController', 'insertarEntrenador']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}/eliminar', ['App\Controlador\EntrenadorController', 'eliminarEntrenador']);
    $r->addRoute('POST', '/entrenadores/{id:\d+}/modificar', ['App\Controlador\EntrenadorController', 'modificarEntrenador']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}/modificar', ['App\Controlador\EntrenadorController', 'mostrarModificarEntrenador']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}/equipos', ['App\Controlador\EntrenadorController', 'mostrarEquiposEntrenador']);

    // Rutas para equipos
    $r->addRoute('GET', '/equipos', ['App\Controlador\EquipoController', 'mostrarEquipos']);
    $r->addRoute('GET', '/equipos/{id:\d+}', ['App\Controlador\EquipoController', 'mostrarEquipo']);
    $r->addRoute('GET', '/equipos/crear', ['App\Controlador\EquipoController', 'crearEquipo']);
    $r->addRoute('POST', '/equipos/crear', ['App\Controlador\EquipoController', 'insertarEquipo']);
    $r->addRoute('GET', '/equipos/{id:\d+}/eliminar', ['App\Controlador\EquipoController', 'eliminarEquipo']);
    $r->addRoute('POST', '/equipos/{id:\d+}/modificar', ['App\Controlador\EquipoController', 'modificarEquipo']);
    $r->addRoute('GET', '/equipos/{id:\d+}/modificar', ['App\Controlador\EquipoController', 'mostrarModificarEquipo']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo "404 - Página no encontrada";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo "405 - Método no permitido";
        break;
    case FastRoute\Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $controller = new $class();
        $controller->$method($routeInfo[2]);
        break;
}
