<?php

require_once __DIR__ . '/vendor/autoload.php';


use FastRoute\RouteCollector;
//use utils\Utils;
use App\Controlador\usuarioController;
use Dotenv\Dotenv;
use Kint\Kint;
//use Model\Model;
//use Models\usuario;
use App\Model\usuario;

// Inicializa dotenv para cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

//Con addroute voy añadiendo rutas url por get o por post a las que responderemos
//Las que no esten aquí darán fallo
//Listado de usuarioes
$r->addRoute('GET', '/', ['App\Controlador\usuarioController', 'mostrarusuarios']);
$r->addRoute('GET', '/listausuarios/{pagina:\d+}', ['App\Controlador\usuarioController', 'mostrarusuarios']);
$r->addRoute('POST', '/', ['App\Controlador\usuarioController', 'mostrarusuariosFiltrado']);
//Mostrar detalle de usuario
$r->addRoute('GET', '/usuarioes/{id:\d+}', ['App\Controlador\usuarioController', 'mostrarusuario']);
$r->addRoute('GET','/usuarioes/crear',['App\Controlador\usuarioController', 'crearusuario']);
$r->addRoute('POST','/usuarioes/crear',['App\Controlador\usuarioController', 'insertarusuario']);
$r->addRoute('GET','/usuarioes/{id:\d+}/eliminar',['App\Controlador\usuarioController', 'eliminarusuario']);

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
        // Ruta no encontrada
        http_response_code(404);
        echo "404 - Página no encontrada<br>Intentalo de nuevo";
        break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Método HTTP no permitido
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "405 - Método no permitido. Métodos permitidos: " . implode(', ', $allowedMethods);
        break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        //Asignacion doble de variables que se reciben desde un array seria igual a las dos siguientes lineas
        //$class=$handler[0];
        //$method=$handler[1];
        [$class, $method] = $handler;
        $controller = new $class();
       
        //Llamamos a la funcion encargada de despachar la ruta
        $controller->$method($vars);
        //call_user_func([$controller, $method], $vars);
        break;
}