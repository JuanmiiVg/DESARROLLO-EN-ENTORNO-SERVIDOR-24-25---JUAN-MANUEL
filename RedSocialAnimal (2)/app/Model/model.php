<?php
namespace App\Model;

use PDO;
use PDOException; 
use App\utils\Utils;

class Model
{
    // Conexion que usaremos para todas las acciones
    protected $con;
    protected $table;

    // Nombre de la base de datos
    public static $nombreBD = "RedSocialAnimales";

    function __construct($con)
    {
        // Asignamos la conexion activa
        if ($con != null && $this->con == null) {
            $this->con = $con;
        }
    }

    // Cargar un registro por ID
    function cargar($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id_" . $this->table . " = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $resultado = $stmt->execute();

            if ($resultado) return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Hubo un problema al cargar el registro: ' . $e->getMessage();
            return false;
        }
    }

    // Cargar todos los registros con paginación
    function cargarTodoPaginado($num_pag, $elem_pag)
    {
        try {
            $sql = "SELECT * FROM $this->table LIMIT :elem_pag OFFSET :offset";
            $stmt = $this->con->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(':elem_pag', $elem_pag, PDO::PARAM_INT);
            $offset = ($elem_pag * ($num_pag - 1));
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $resultado = $stmt->execute();

            if ($resultado) return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Hubo un problema al cargar los registros: ' . $e->getMessage();
            return false;
        }
    }

    // Borrar un registro por ID
    function borrar($id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id_" . $this->table . " = ?";
            $stmt = $this->con->prepare($sql);
            $resultado = $stmt->execute([$id]);

            return $resultado;
        } catch (PDOException $e) {
            echo 'Hubo un problema al eliminar el registro: ' . $e->getMessage();
            return false;
        }
    }

    // Insertar un nuevo registro
    function insertar($datos)
    {
        try {
            $sql = "INSERT INTO $this->table (";
            $campos = array_keys($datos);

            // Añadir los nombres de los campos
            for ($i = 0; $i < count($campos); $i++) {
                $sql .= ($i < count($campos) - 1) ? "$campos[$i]," : "$campos[$i]";
            }

            // Añadir los valores
            $sql .= ") VALUES (";
            for ($i = 0; $i < count($campos); $i++) {
                $sql .= ($i < count($campos) - 1) ? ":$campos[$i]," : ":$campos[$i]";
            }

            $sql .= ")";

            $stmt = $this->con->prepare($sql);
            echo $stmt->queryString;

            // Asociar valores a parámetros PDO
            for ($i = 0; $i < count($campos); $i++) {
                $tipo = Utils::obtenerTipoParametro($datos[$campos[$i]]);
                $stmt->bindValue(':' . $campos[$i], $datos[$campos[$i]], $tipo);
            }

            $resultado = $stmt->execute($datos);
            return $resultado;
        } catch (PDOException $e) {
            echo 'Hubo un problema al insertar el registro: ' . $e->getMessage();
            return false;
        }
    }
}
