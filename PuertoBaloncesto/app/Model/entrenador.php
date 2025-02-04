<?php

namespace App\Model;

class Entrenador extends Model
{
    function __construct($con)
    {
        parent::__construct($con);
        $this->table = "entrenador";
    }

    public function obtenerJugadores($idEntrenador)
    {
        $sql = "SELECT * FROM jugador WHERE Equipo_idEquipo IN (SELECT idEquipo FROM equipo WHERE Entrenador_idEntrenador = :idEntrenador)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':idEntrenador', $idEntrenador, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function obtenerEquipos($idEntrenador)
    {
        $sql = "SELECT * FROM equipo WHERE Entrenador_idEntrenador = :idEntrenador";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':idEntrenador', $idEntrenador, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
