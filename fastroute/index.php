<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Controllers/EntrenadorController.php';
require_once __DIR__ . '/Models/Entrenador.php';
require_once __DIR__ . '/helpers.php';

use FastRoute\RouteCollector;
use Controllers\EntrenadorController;
use Models\Entrenador;

//Configuracion de las rutas
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
//Ejemplo de uso creando una funcion
/*$r->addRoute('GET', '/', function () {
    echo "¡Bienvenido a la página de inicio!";
});
*/
    $r->addRoute('GET', '/entrenadores', ['Controllers\EntrenadorController', 'index']);
    $r->addRoute('POST', '/entrenadores', ['Controllers\EntrenadorController', 'index']); // Para paginación
    $r->addRoute('GET', '/entrenadores/crear', ['Controllers\EntrenadorController', 'create']);
    $r->addRoute('POST', '/entrenadores/crear', ['Controllers\EntrenadorController', 'store']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}', ['Controllers\EntrenadorController', 'show']);
    $r->addRoute('GET', '/entrenadores/{id:\d+}/editar', ['Controllers\EntrenadorController', 'edit']);
    $r->addRoute('POST', '/entrenadores/{id:\d+}/editar', ['Controllers\EntrenadorController', 'update']);
    $r->addRoute('POST', '/entrenadores/{id:\d+}/eliminar', ['Controllers\EntrenadorController', 'delete']);
});

//Dependiendo de la solicitud haremos una cosa u otra 
//recomemos la url y si ha sido get post o cual
// Obtener datos de la solicitud
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Eliminar parámetros de la consulta
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Despachar la ruta
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo 'Ruta no encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo 'Método no permitido';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        //Asignacion doble de variables que se reciben desde un array
        [$class, $method] = $handler;
        $controller = new $class();
        call_user_func([$controller, $method], $vars);
        break;
}
