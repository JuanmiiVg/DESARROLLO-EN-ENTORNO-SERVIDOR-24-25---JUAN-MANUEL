<?php
namespace App\Controlador;

use App\Utils\Utils;
use App\Model\Animal; // Usamos el modelo de Animal
use Kint\Kint;

class AnimalController
{
    // Mostrar todos los animales (con paginación)
    public function mostrarAnimales()
    {
        try {
            // Nos conectamos a la base de datos usando tu conexión personalizada
            $con = Utils::getConnection();
            
            // Creamos el modelo de Animal
            $animalM = new Animal($con);
            
            // Cargamos los animales con paginación (por ejemplo, página 1, 200 elementos por página)
            $animales = $animalM->cargarTodoPaginado(1, 200);
            
            // Compactamos los datos que necesita la vista para luego pasárselos
            $datos = ['animales' => $animales];

            // Cargamos la vista
            Utils::render('listaAnimales', $datos);
        } catch (\Exception $e) {
            // Manejo de error: si ocurre un problema, muestra un mensaje
            echo "Error al cargar los animales: " . $e->getMessage();
        }
    }

    // Mostrar un animal específico
    public function mostrarAnimal($datos)
    {
        try {
            // Nos conectamos a la base de datos
            $con = Utils::getConnection();
            
            // Creamos el modelo de Animal
            $animalM = new Animal($con);
            
            // Cargamos el animal con el ID proporcionado
            $animal = $animalM->cargar($datos['id']);
            
            // Compactamos los datos que necesita la vista para luego pasárselos
            $datos = ['animal' => $animal];
            
            // Cargamos la vista
            Utils::render('verAnimal', $datos);
        } catch (\Exception $e) {
            // Manejo de error: si ocurre un problema, muestra un mensaje
            echo "Error al cargar el animal: " . $e->getMessage();
        }
    }

    // Mostrar el formulario para crear un nuevo animal
    public function crearAnimal()
    {
        Utils::render('crearAnimal');
    }

    // Insertar un nuevo animal
    public function insertarAnimal()
    {
        try {
            // Obtenemos los datos del formulario
            $animal = $_POST;
            
            // Nos conectamos a la base de datos
            $con = Utils::getConnection();
            
            // Creamos el modelo de Animal
            $animalM = new Animal($con);
            
            // Insertamos el nuevo animal
            $animalM->insertar($animal);
            
            // Redirigimos después de insertar
            Utils::redirect('/animales');
        } catch (\Exception $e) {
            // Manejo de error: si ocurre un problema, muestra un mensaje
            echo "Error al insertar el animal: " . $e->getMessage();
        }
    }

    // Eliminar un animal
    public function eliminarAnimal($datos)
    {
        try {
            // Nos conectamos a la base de datos
            $con = Utils::getConnection();
            
            // Creamos el modelo de Animal
            $animalM = new Animal($con);
            
            // Borramos el animal por ID
            $animalM->borrar($datos['id']);
            
            // Redirigimos después de eliminar
            Utils::redirect('/animales');
        } catch (\Exception $e) {
            // Manejo de error: si ocurre un problema, muestra un mensaje
            echo "Error al eliminar el animal: " . $e->getMessage();
        }
    }
}
