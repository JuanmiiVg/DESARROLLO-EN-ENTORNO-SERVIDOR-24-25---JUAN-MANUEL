<?php

class Publicacion
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion->getConexion();
    }

    // Obtener publicaciones con paginación
    public function obtenerPublicaciones($limite, $offset)
    {
        $query = "SELECT * FROM Publicacion LIMIT :limite OFFSET :offset";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener publicación por ID
    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM Publicacion WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar nueva publicación
    public function insertarPublicacion($titulo, $contenido)
    {
        $query = "INSERT INTO Publicacion (titulo, contenido) VALUES (:titulo, :contenido)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $this->conexion->lastInsertId(); // Retorna el ID de la nueva publicación
        }
        return false;
    }

    // Modificar publicación existente
    public function modificarPublicacion($id, $titulo, $contenido)
    {
        $query = "UPDATE Publicacion SET titulo = :titulo, contenido = :contenido WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar publicación por ID
    public function eliminarPublicacion($id)
    {
        $query = "DELETE FROM Publicacion WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
