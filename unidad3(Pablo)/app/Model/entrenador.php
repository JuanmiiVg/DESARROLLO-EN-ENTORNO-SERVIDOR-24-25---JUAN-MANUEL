<?php
namespace App\Model;

use App\Model\Model;
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


class Entrenador extends Model
{
 public static $ejemplo ="hola";

function __construct($con)
{
    parent::__construct($con);
    $this->table="entrenador";

}
    //function modificar($entrenador)
    //Recibe no todos los campos de la tabla sino solo algunos y modifica solo los que trae
    //Es decir tiene que ir creando la sentencia update añadiendo solo los campos que trae el array asociativo
    //Se supone que las claves del array son los nombres de los campos y los valores del array los que queremos
    //asignar
    //Debe comprobar que el id viene dado


}
