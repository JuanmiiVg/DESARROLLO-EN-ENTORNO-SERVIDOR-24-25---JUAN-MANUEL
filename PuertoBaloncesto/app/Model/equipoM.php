<?php 
namespace App\Model;

use PDO;
use PDOException;

class EquipoM extends Model 
{
    protected $table = 'equipo';

    function cargarEquiposEntrenador($idEntrenador)
    {
        try {

            $sql = "SELECT * FROM equipo Where idEntrenador = :idEntrenador";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEntrenador',$idEntrenador, PDO::PARAM_INT);
            $stmt->execute();

            $equipos = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $equipos ?: -1;
            } catch (PDOException $e) {
                echo 'Error al cargar los equipos del entrenador: '. $e->getMessage();
                return -1;
            }
    }

    function cambiarEntrenador($idEquipo, $idEntrenador)
    {
        try {
            if (!$this->cargar($idEquipo)) return -1;
            $sql= "SELECT idEntrenador FROM entrenador WHERE idEntrenador = idEntrenador";
            $stmt = $this->con->prepare($sql);
            $stmt -> execute();

            if (!$stmt->fetch()) return -1;

            $sql = "UPDATE equipo SET idEntrenador = :idEntrenador WHERE idEquipo = :idEquipo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEntrenador',$idEntrenador, PDO::PARAM_INT);
            $stmt->execute();

            if (!$stmt->fetch()) return -1;

            $sql = "UPDATE equipo SET idEntrenador = :idEntrenador WHERE idEquipo = :idEquipo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al cambiar el entrenador: ' . $e->getMessage();
            return false;
        }
    }
}
?>