<?php 
// Importamos el código con las clases Animal y Usuario
require_once(__DIR__ . '/app/Model/animales.php');
require_once(__DIR__ . '/app/Model/usuario.php');

use App\Model\Animal;
use App\Model\Usuario;

echo "La base de datos que utilizamos es: ". Animal::$nombreBD . "<br>";

// CONEXION
require_once("config.php");

// Conexion a la BD
try {
    $con = new PDO($dsn, $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ha habido un fallo al conectarse a BD
    // Salta una excepción, con getMessage sacamos la descripción del error
    echo 'Falló la conexión: ' . $e->getMessage();
}

// Creamos un objeto de tipo Animal y le prestamos nuestra conexión
$animalM = new Animal($con);
$usuarioM = new Usuario($con);

// Ejemplo: Borrar un animal con ID 9
echo "Borramos un animal<br>";
$animalM->borrar(9);

// Cargamos animales con paginación
$animales = $animalM->cargarTodoPaginado(2, 5);

// Cargar usuarios con paginación (si lo necesitas)
$usuarios = $usuarioM->cargarTodoPaginado(1, 10);

// Insertar un nuevo animal (descomentado solo si es necesario)
// $animalM->insertar(['nombre' => 'Bobby', 'especie' => 'Perro', 'edad' => 4, 'id_usuario' => 1]);

// Modificar todo un animal (si es necesario)
// $animalM->modificarTodo(['id_animal' => 21, 'nombre' => 'Fido', 'especie' => 'Perro', 'edad' => 5, 'id_usuario' => 2]);

// Mostrar los animales cargados
var_dump($animales);

// Mostrar los usuarios cargados
var_dump($usuarios);
?>
