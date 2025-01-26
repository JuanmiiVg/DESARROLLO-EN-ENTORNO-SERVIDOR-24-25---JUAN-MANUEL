<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//require_once("config.php");
require 'vendor/autoload.php';
//composer require kint-php/kint --dev
use Kint\Kint;

// Datos de ejemplo
$persona = [
    'nombre' => 'Juan',
    'edad' => 30,
    'dirección' => [
        'calle' => 'Calle Falsa 123',
        'ciudad' => 'Madrid',
        'pais' => 'España',
    ],
    'intereses' => ['programación', 'deporte', 'música'],
];

echo "Ejemplo";
Kint::dump($persona);

$password = "usuario";

$encriptado = password_hash($password,PASSWORD_DEFAULT);

Kint::dump($password);
Kint::dump($encriptado);

if (password_verify($password,$encriptado))  echo "El password es correcto";


/*

$nombre = "juan";
$edad=23;

//Compact me convierte variables en un array asociativo
$datos = compact("nombre","edad");


//Extract es lo contrario
extract (["nif"=>1212121]);

echo $nif;


var_dump($datos);

echo "<br>";


//Conexion a la BD
try {
    $con = new PDO($dsn, $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Si ha habido un fallo al conectarse a BD
    //Salta una excepcion, con getMEssage sacamos la descripcion del error
    echo 'Falló la conexión: ' . $e->getMessage();
}

var_dump($con);

try {


    //SELECT COMPLETA

    $sql = "select * from entrenador";
    //Primero introducimos la sentencia sql
    $stmt = $con->prepare($sql);
    //Decidimos de que forma queremos que se recuperen los dastos principalmente hay dos
    //FETCH_ASSOC devuelve los datos como un array asociativo
    //FETCH_OBJ devuelve cada registro de bd como un objeto
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //Ejecutamos la sencencia sql
    $stmt->execute();

    //Nos devuelve todos los registros de la query en un array asociativo
    //Yo lo denomino entrenadores
    $entrenadores = $stmt->fetchAll();

    echo "<br>query: " . $stmt->queryString;

    echo "<br><br>";

    var_dump($entrenadores);

    //BORRADO

    //Variable con el entrenador a borrar
    $idEntrenador = 4;
    //Vamos a hacer un ejemplo en el cual borramos el entrenador numero 4
    $sql = "delete from entrenador where idEntrenador = ?";

    $stmt = $con->prepare($sql);
    //Ejecutamos la sentencia substituyendo las interrogacions por los valores
    //Que metemos dentro del array que le pasamos a execute
    //$stmt->execute([$idEntrenador]);

    //Para asociar los valores a las interrogaciones que hay en la query
    //utilizamos bindValue
    $stmt->bindValue(1, $idEntrenador);
    //Ejecutamos la sentencia
    $resultado = $stmt->execute();

    echo "<br>El resultado de borrar ha sido $resultado";

    //ACTUALIZACION
    //Tengo los datos del entrenador a modificar en un array asociativo
    $entrenador = [
        'idEntrenador' => 5,
        'nif' => "23432323F",
        'nombre' => "Perlita Durango",
        'edad' => 35,
        'altura' => 199
    ];
    //Sentencia sql para la modificacion
    //En lugar de ? podemos parametrizar usando nombres para los valores a introducir
    //se utiliza : delante del nombre del parametro
    //nota: solo podemos parametrizar valores, ni nombres de tabla ni palabras sql
    $sql = "UPDATE `entrenador` SET  nif=:nif,nombre=:nombre,edad=:edad,altura=:altura 
    WHERE identrenador = :identrenador";
    //preparamos la sentencia
    $stmt = $con->prepare($sql);

    //Asociamos los valores del array con los parametros definidos en la query
    $stmt->bindValue(':nif', $entrenador['nif'], PDO::PARAM_STR);
    $stmt->bindValue(':nombre', $entrenador['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(':edad', $entrenador['edad'], PDO::PARAM_INT);
    $stmt->bindValue(':altura', $entrenador['altura'], PDO::PARAM_INT);
    $stmt->bindValue(':identrenador', $entrenador['idEntrenador'], PDO::PARAM_INT);

    if ($stmt->execute())
        echo "<br>El entrenador 5 ha sido modificado";
    else
        echo "<br>Ha habido un problema al modificar";

    //INSERCION

    //Datos a insertar en la bd
    $entrenador = [
        'nif' => "12345678I",
        'nombre' => "Pablo",
        'edad' => 99,
        'altura' => 173
    ];

    //Query de la insercion
    $sql = "INSERT INTO `entrenador` (`nif`,`nombre`,`edad`,`altura`)
             VALUES  (:nif,:nombre,:edad,:altura)";

    //Preparamos la query
    $stmt = $con->prepare($sql);

    //Ejecutamos el insert
    //Podemos pasar los parametros directamente a la funcion execute
    //Hay que pasarlos como un array asociativo en el cual las claves son los nombres de los parametros
    //Y los valores sus respectivos valores
    $resultado = $stmt->execute(
        [
            ':nif'=> $entrenador['nif'],
            ':nombre'=> $entrenador['nombre'],
            ':edad'=> $entrenador['edad'],
            ':altura'=> $entrenador['altura'],
        ]
        );

    if ($resultado)
        echo "<br>Hay un nuevo entrenador en el mercado";
    else
        echo "<br>Ha habido un fallo al crear el entrenador";

} catch (PDOException $e) {
    //Salta una excepcion, con getMEssage sacamos la descripcion del error
    echo 'Error a ejecutar la sentencia SQL: ' . $e->getMessage();
}

$stmt = null;
$con = null;
*/

?>
</body>
</html>
