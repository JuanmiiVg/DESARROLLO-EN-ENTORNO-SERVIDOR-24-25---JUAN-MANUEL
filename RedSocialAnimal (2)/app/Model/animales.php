<?php
namespace App\Model;

use App\Model\Model;
use PDO;
use Exception;
use InvalidArgumentException;

class Animal extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "Animal";
    }

    // Hacer que insertar tenga la misma firma que en Model
    public function insertar($datos)
    {
        if (!isset($datos['nombre'], $datos['especie'], $datos['edad'], $datos['id_usuario'])) {
            throw new InvalidArgumentException("Faltan datos obligatorios para insertar el animal.");
        }

        $sql = "INSERT INTO Animal (nombre, especie, edad, id_usuario) VALUES (:nombre, :especie, :edad, :id_usuario)";
        $stmt = $this->con->prepare($sql);

        try {
            // Asociar los valores con los parámetros de la consulta
            $stmt->bindParam(':nombre', $datos['nombre']);
            $stmt->bindParam(':especie', $datos['especie']);
            $stmt->bindParam(':edad', $datos['edad']);
            $stmt->bindParam(':id_usuario', $datos['id_usuario']);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al insertar el animal: " . $e->getMessage());
        }
    }

    // Hacer que borrar tenga la misma firma que en Model
    public function borrar($id)
    {
        $sql = "DELETE FROM Animal WHERE id_animal = ?";
        $stmt = $this->con->prepare($sql);

        try {
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Error al borrar el animal: " . $e->getMessage());
        }
    }
}
