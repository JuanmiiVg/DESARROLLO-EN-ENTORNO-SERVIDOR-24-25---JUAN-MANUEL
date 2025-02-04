<?php

namespace App\Model;

use PDO;
use PDOException;
use App\Utils\Utils;

class Model
{
    protected $con;
    protected $table;

    function __construct($con)
    {
        if ($con != null && $this->con == null) $this->con = $con;
    }

    function cargar($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id$this->table = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $resultado = $stmt->execute();

            return $resultado ? $stmt->fetch() : false;
        } catch (PDOException $e) {
            echo 'Error al cargar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function cargarTodoPaginado($num_pag, $elem_pag)
    {
        try {
            $sql = "SELECT * FROM $this->table LIMIT :elem_pag OFFSET :offset";
            $stmt = $this->con->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $offset = ($elem_pag * ($num_pag - 1));
            $stmt->bindParam(':elem_pag', $elem_pag, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

            $resultado = $stmt->execute();
            return $resultado ? $stmt->fetchAll() : false;
        } catch (PDOException $e) {
            echo 'Error al cargar los registros: ' . $e->getMessage();
            return false;
        }
    }

    function contarTodos()
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM $this->table";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        } catch (PDOException $e) {
            echo 'Error al contar los registros: ' . $e->getMessage();
            return false;
        }
    }

    function borrar($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id$this->table = ?";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo 'Error al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function insertar($datos)
    {
        try {
            $sql = "INSERT INTO $this->table (" . implode(',', array_keys($datos)) . ") VALUES (:" . implode(', :', array_keys($datos)) . ")";
            $stmt = $this->con->prepare($sql);

            foreach ($datos as $campo => $valor) {
                $tipo = Utils::obtenerTipoParametro($valor);
                $stmt->bindValue(":$campo", $valor, $tipo);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al insertar el registro: ' . $e->getMessage();
            return false;
        }
    }

    function modificar($id, $datos)
    {
        try {
            $campos = [];
            foreach ($datos as $campo => $valor) {
                $campos[] = "$campo = :$campo";
            }
            $sql = "UPDATE $this->table SET " . implode(', ', $campos) . " WHERE id$this->table = :id";
            $stmt = $this->con->prepare($sql);

            foreach ($datos as $campo => $valor) {
                $tipo = Utils::obtenerTipoParametro($valor);
                $stmt->bindValue(":$campo", $valor, $tipo);
            }
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error al modificar el registro: ' . $e->getMessage();
            return false;
        }
    }
}
