<?php 

namespace App\Model;

use PDO;
use PDOException;

class JugadorM extends Model 
{
    protected $table = 'jugador';

    function ficharPorEquipo($idEquipo, $idJugador,)
    {
        try {
            if (!$this->cargar($idJugador)) return -1;

            $sql ="SELECT COUNT(*) as total FROM jugador WHERE idEquipo  = :idEquipo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
            $stmt->execute;
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado['total'] >= 20) return -1;

            $sql = "SELECT idEquipo FROM equipo WHERE idEquipo =  :idEquipo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
            $stmt->execute();

            if (!$stmt->fetch()) return -1;

            $sql = "UPDATE jugador SET idEquipo = :idEquipo WHERE idJugador = :idJugador";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':idEquipo', $idEquipo, PDO::PARAM_INT);
            $stmt->bindParam(':idJugador', $idJugador, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al fichar al jugador: ' .  $e->getMessage();
            return false;
        }
    }
}
?>