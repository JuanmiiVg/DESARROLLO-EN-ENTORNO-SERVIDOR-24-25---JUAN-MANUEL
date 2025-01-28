<?php
class Usuario {
    private $pdo;

    public function __construct($conexion) {
        $this->pdo = $conexion->getConexion();
    }

    // Método para obtener un usuario por su ID
    public function obtenerPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo o false si no existe
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $email, $password = null) {
        if ($password) {
            $passwordHash = hash('sha256', $password);
            $query = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        } else {
            $query = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
        }

        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute(); // Devuelve true si la actualización fue exitosa
    }
}
