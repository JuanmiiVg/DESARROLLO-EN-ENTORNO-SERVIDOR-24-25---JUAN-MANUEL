<?php

require_once __DIR__ . '/vendor/autoload.php';

/* Comandos  a seguir para la instalación : 
composer init
composer require vlucas/phpdotenv
composer require nikic/fast-route
composer dump-autoload */
use FastRoute\RouteCollector;
//use utils\Utils;
use Dotenv\Dotenv;

// Inicializa dotenv para cargar las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$animal= new App\Controlador\AnimalController();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {

//Con addroute voy añadiendo rutas url por get o por post a las que responderemos
$r->addRoute('GET', '/', ['App\Controlador\UsuarioController', 'cargarLogin']);
$r->addRoute('POST', '/', ['App\Controlador\UsuarioController', 'login']);
$r->addRoute('GET', '/registro', ['App\Controlador\UsuarioController', 'cargarRegistro']);
$r->addRoute('POST', '/registro', ['App\Controlador\UsuarioController', 'registro']);
$r->addRoute('GET', '/logout', ['App\Controlador\UsuarioController', 'logout']);

$r->addRoute('GET', '/verify', ['App\Controlador\UsuarioController', 'verificarCuenta']);

$r->addRoute('GET', '/listaAnimales/{pagina:\d+}', ['App\Controlador\AnimalController', 'mostrarAnimales']);

//Mostrar detalle
$r->addRoute('GET', '/animales/{id:\d+}', ['App\Controlador\AnimalController', 'mostrarAnimal']);
$r->addRoute('GET','/animales/crear',['App\Controlador\AnimalController', 'crearAnimal']);
$r->addRoute('POST','/animales/crear',['App\Controlador\AnimalController', 'insertarAnimal']);
$r->addRoute('GET','/animales/{id:\d+}/eliminar',['App\Controlador\AnimalController', 'eliminarAnimal']);
$r->addRoute('GET','/animales/{id:\d+}/modificar',['App\Controlador\AnimalController', 'editarAnimal']);
$r->addRoute('POST','/animales/modificar',['App\Controlador\AnimalController', 'modificarAnimal']);
});


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

        [$class, $method] = $handler;
        $controller = new $class();
       
        //Llamamos a la funcion encargada de despachar la ruta
        $controller->$method($vars);
        //call_user_func([$controller, $method], $vars);
        break;
}
