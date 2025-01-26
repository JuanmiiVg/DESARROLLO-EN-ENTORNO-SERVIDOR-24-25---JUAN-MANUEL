<?php
namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Entrenador;
use Kint\Kint;

class EntrenadorController
{

    public function mostrarEntrenadores()
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenadores = $entrenadorM->cargarTodoPaginado(1,200);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("entrenadores");

        
        //Cargamos la vista
       Utils::render('listaEntrenadores',$datos);
        
    }

    public function mostrarEntrenador($datos)
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenador = $entrenadorM->cargar($datos['id']);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("entrenador");
         //Cargamos la vista
        Utils::render('ver',$datos);
    }

    public function crearEntrenador()
    {
        Utils::render('crear');
    }

    public function insertarEntrenador()
    {
       //Guardo los datos del formulario de creaccion de entrenadores 
       $entrenador=$_POST;

      // Kint::dump($entrenador);
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $entrenadorM = new Entrenador($con);
        //Cargamos los entrenadores
        $entrenador = $entrenadorM->insertar($entrenador);
         //Cargamos la vista
        Utils::redirect('/');

    }

    public function eliminarEntrenador($datos)
    {

       //Nos conectamos a la bd
       $con = Utils::getConnection();
       //Creamos el modelo
       $entrenadorM = new Entrenador($con);
       //borramos el entrenador
       $entrenadorM->borrar($datos['id']);
       //Cargamos la vista
       Utils::redirect('/');
    }

}




?>