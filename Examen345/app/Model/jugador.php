<?php
namespace App\Model;

use App\Model\Model;
use PDO;
use PDOException; 
use App\Model\Equipo;
use kint\Kint;

/*
funcion insertar($con, $entrenador)
funcion borrar($con, $idEntrenador)
funcion modificarTodo($con, $entrenador)
funcion modificar($con, $entrenador)
//Por hacer
funcion cargarTodos()
funcion cargarTodosPaginado($con,$num_pag,$elem_pag)
//Por hacer
//En filtro nos trae campo y valor en un array asociativo
//simplemente hay que incluirlo en el where de la  query con like acordarse de los %
funcion cargarTodosFiltrado($con, $filtro, $orden)
funcion cargarTodosFiltradoPaginado($con, $filtro,$orden,$num_pag,$elem_pag)
*/

define('ALERO',1);
define('CENTRO',2);
define('PIVOT',3);
define('BASE',4);
class Jugador extends Model
{


function __construct($con)
{
    parent::__construct($con);
    $this->table="jugador";

}

/**
 * ficharPorEquipo(idEquipo, idJugador) Cambia el equipo al que pertenece el jugador, 
 * pero primero debe de comprobar que el equipo no tenga contando al nuevo jugador más de 
 * 20 jugadores, y que exista el equipo y el jugador, utilizando las funciones de la clase 
 * padre model.En jugadorM
 * update jugador set equipo_idequipo=2 where idJugador=4
 * 
 */
function ficharPorEquipo($idEquipo, $idJugador)
{
    try {

        //Primero Comprobamos que el jugador existe
        $jugador = $this->cargar($idJugador);

        //Si no existe devolvemos false
        if ($jugador == null) return -1;

        //Comprobamos que el equipo existe
        $equipoModel = new Equipo($this->con);
        $equipo = $equipoModel->cargar($idEquipo);
        //Si no hay equipo devolvemos -1
        if ($equipo==null) return -1;

        //Comprobamos que haya menos de 20 jugadores contando el nuevo jugador
        $equipoJugadores = $this->cargarJugadoresEquipo($idEquipo);

        //Si hay mas de 19 jugadores no se puede fichar
        if (count($equipoJugadores) >= 20) return -1;

        //query que muestra de forma paginada los datos
        $sql = "update $this->table set equipo_idequipo=:idEquipo where idJugador=:idJugador";

        //Utilizamos la conexion activa de nuestro objeto
        //Para crear la sentencia sql
        $stmt = $this->con->prepare($sql);

        //Asignamos la forma de devolver los datos
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
        $stmt->bindParam(':idJugador', $idJugador, PDO::PARAM_INT);
       
        //Que metemos dentro del array que le pasamos a execute
        return $stmt->execute();

    } catch (PDOException $e) {
        //Hubo un problema al eliminar el registro
        echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
        return false;
    }
}

function cargarJugadoresEquipo($idEquipo)
 {
     try {

         //query que muestra de forma paginada los datos
         $sql = "select * from $this->table where equipo_idequipo = :id";

         //Utilizamos la conexion activa de nuestro objeto
         //Para crear la sentencia sql
         $stmt = $this->con->prepare($sql);

         //Asignamos la forma de devolver los datos
         $stmt->setFetchMode(PDO::FETCH_ASSOC);

         $stmt->bindParam(':id', $idEquipo, PDO::PARAM_INT);

         //Que metemos dentro del array que le pasamos a execute
         $resultado = $stmt->execute();

         //Si no hay jugadores en el equipo devuelvo -1
         //if (count($stmt->fetchAll()) == 0) return -1;

         //Si ha ido bien devolvemos todos los equipos asociados al entrenador cuyo id me llega por parametro
         if ($resultado) return $stmt->fetchAll();
     } catch (PDOException $e) {
         //Hubo un problema al eliminar el registro
         echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
         return -1;
     }
 }

}
