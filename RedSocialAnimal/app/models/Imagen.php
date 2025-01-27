<?php

class Imagen
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion->getConexion();
    }

    // Obtener imágenes por ID de publicación
    public function obtenerPorPublicacion($idPublicacion)
    {
        $query = "SELECT * FROM Imagen WHERE id_publicacion = :id_publicacion";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id_publicacion', $idPublicacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar nueva imagen
    public function insertarImagen($idPublicacion, $nombreArchivo)
    {
        $query = "INSERT INTO Imagen (id_publicacion, nombre_archivo) VALUES (:id_publicacion, :nombre_archivo)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id_publicacion', $idPublicacion, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_archivo', $nombreArchivo, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar imagen por ID
    public function eliminarImagen($idImagen)
    {
        $query = "DELETE FROM Imagen WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $idImagen, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
