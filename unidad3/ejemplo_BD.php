<?php 
//Importamos el código con la clase entrenador
require_once('./model/entrenador.php');
require_once('./model/equipo.php');

use model\Entrenador;
use model\Equipo;

echo "La base de datos que utilizamos es: ". Entrenador::$nombreBD. "<br>";

//CONEXION
require_once("config.php");

//Conexion a la BD
try {
    $con = new PDO($dsn, $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Si ha habido un fallo al conectarse a BD
    //Salta una excepcion, con getMEssage sacamos la descripcion del error
    echo 'Falló la conexión: ' . $e->getMessage();
}

//Creamos un objeto de tipo entrenador y le prestamos nuestra conexion
$entrenadoM = new Entrenador($con);
$equipoM = new Equipo($con);

echo "Borramos un entrenador<br>";
$entrenadoM->borrar(9);

$datos = $entrenadoM->cargarTodoPaginado(2,5);

$datos_equipo= $equipoM->cargarTodoPaginado(1,10);

//$entrenadoM->insertar(['nif'=>'55555555b','nombre'=>'Rocio','edad'=>35,'altura'=>175]);

//$entrenadoM->modificarTodo(['idEntrenador'=>'21','nif'=>'11111111a','nombre'=>'Patricia','edad'=>20,'altura'=>195]);

//$datos = $entrenadoM->cargarTodoPaginado(2,10);

//var_dump($datos);
var_dump($datos_equipo);

?>