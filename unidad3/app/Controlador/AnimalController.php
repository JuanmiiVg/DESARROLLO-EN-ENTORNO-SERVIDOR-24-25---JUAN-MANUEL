<?php
namespace App\Controlador;

use App\Utils\Utils;
use App\Model\animal;
use App\Model\raza;


class AnimalController
{

    public function mostrarAnimales()
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $animalM = new Animal($con);
        //Cargamos los entrenadores
        $animales = $animalM->cargarTodoPaginado(1,200);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("animales");

        
        //Cargamos la vista
       Utils::render('listaAnimales',$datos);
        
    }

    public function mostrarAnimal($datos)
    {
        //Nos conectamos a la bd
        $con = Utils::getConnection();
        //Creamos el modelo
        $animalM = new Animal($con);
        $razaM = new Raza($con);
        //Cargamos los entrenadores
        $animal = $animalM->cargar($datos['id']);
        $razas = $razaM->cargarRazasPorAnimal($datos['id']);
        //Compactamos los datos que necesita la vista para luego pasarselos
        $datos = compact("animal","razas");
         //Cargamos la vista
        Utils::render('verAnimal',$datos);

    }

    public function crearAnimal()
    {
        Utils::render('crearAnimal');
    }

    public function insertarAnimal()
    {
        // Guardamos los datos del formulario
        $animal = $_POST;
        $imagenRuta = null;
    
        // Verificamos si se subió una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $archivo = $_FILES['imagen'];
    
                // Definimos la ruta donde se guardará la imagen
                $directorioDestino = $_SERVER['DOCUMENT_ROOT'] . "\img\\";
                if (!is_dir($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }
    
                // Generamos un nombre único para la imagen
                $nombreArchivo = uniqid('animal_') . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
                $rutaCompleta = $directorioDestino . $nombreArchivo;
    
                // Movemos la imagen al directorio de destino
                if (move_uploaded_file($archivo['tmp_name'], $rutaCompleta)) {
                    // Guardamos la ruta relativa para almacenarla en la base de datos
                    $imagenRuta = $nombreArchivo;
                }
            }
    
        // Agregamos la ruta de la imagen a los datos del animal
        $animal['imagen'] = $imagenRuta;
    
        // Nos conectamos a la BD
        $con = Utils::getConnection();
        
        // Creamos el modelo
        $animalM = new Animal($con);
        
        // Insertamos el animal en la BD
        $animalM->insertar($animal);
    
        // Redirigimos
        Utils::redirect('/');
    }
    

    public function eliminarAnimal($datos)
    {

       //Nos conectamos a la bd
       $con = Utils::getConnection();
       //Creamos el modelo
       $animalM = new Animal($con);
       //borramos el entrenador
       $animalM->borrar($datos['id']);
       //Cargamos la vista
       Utils::redirect('/');
    }

    public function modificarAnimal()
    {
        $datos = $_POST;
        $imagenRuta = null;
    
        // Verificamos si se subió una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $archivo = $_FILES['imagen'];
    
                // Definimos la ruta donde se guardará la imagen
                $directorioDestino = $_SERVER['DOCUMENT_ROOT'] . "\img\\";
                if (!is_dir($directorioDestino)) {
                    mkdir($directorioDestino, 0777, true);
                }
    
                // Generamos un nombre único para la imagen
                $nombreArchivo = uniqid('animal_') . '.' . pathinfo($archivo['name'], PATHINFO_EXTENSION);
                $rutaCompleta = $directorioDestino . $nombreArchivo;
    
                // Movemos la imagen al directorio de destino
                if (move_uploaded_file($archivo['tmp_name'], $rutaCompleta)) {
                    // Guardamos la ruta relativa para almacenarla en la base de datos
                    $imagenRuta = $nombreArchivo;
                }
            }
    
        // Agregamos la ruta de la imagen a los datos del animal
        $datos['imagen'] = $imagenRuta;
        // Nos conectamos a la bd
        $con = Utils::getConnection();
        // Creamos el modelo
        $animalM = new Animal($con);
        // Modificamos el animal
        $animalM->modificar($datos);
        // Redirigimos a la vista principal
        Utils::redirect('/');
    }

    public function editarAnimal($id)
    {
        Utils::render('editarAnimal',$id);
    }
}
?>