<?php
namespace App\Model;
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
use App\Model\Model;
use PDO;
use PDOException; 


class Equipo extends Model
{

function __construct($con)
{
    parent::__construct($con);
    $this->table="equipo";

}
    //function modificar($entrenador)
    //Recibe no todos los campos de la tabla sino solo algunos y modifica solo los que trae
    //Es decir tiene que ir creando la sentencia update añadiendo solo los campos que trae el array asociativo
    //Se supone que las claves del array son los nombres de los campos y los valores del array los que queremos
    //asignar
    //Debe comprobar que el id viene dado

/**
 * cargarEquiposEntrenador(idEntrenador) carga todos los equipos que ha entrenado el 
 * entrenador cuyo id se recibe como parámetro.  Devuelve un array asociativo con los equipos  
 * o -1 si hubo un fallo o no hay datos. En EquipoM
 * Query a realizar SELECT * FROM puertobaloncesto.equipo where Entrenador_idEntrenador=2
 */

 
 function cargarEquiposEntrenador($idEntrenador)
 {
     try {

         //query que muestra de forma paginada los datos
         $sql = "select * from $this->table where Entrenador_idEntrenador = :id";

         //Utilizamos la conexion activa de nuestro objeto
         //Para crear la sentencia sql
         $stmt = $this->con->prepare($sql);

         //Asignamos la forma de devolver los datos
         $stmt->setFetchMode(PDO::FETCH_ASSOC);

         $stmt->bindParam(':id', $idEntrenador, PDO::PARAM_INT);
        
         //Que metemos dentro del array que le pasamos a execute
         $resultado = $stmt->execute();

         //Si ha ido bien devolvemos todos los equipos asociados al entrenador cuyo id me llega por parametro
         if ($resultado) return $stmt->fetchAll();
     } catch (PDOException $e) {
         //Hubo un problema al eliminar el registro
         echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
         return false;
     }
 }




}
