<?php
require_once 'BaseModel.php';

class Usuario extends BaseModel {
    public function registrar($nombre, $correo, $contraseña) {
        $sql = "INSERT INTO Usuario (nombre_usuario, correo, contraseña, fecha_registro)
                VALUES (:nombre, :correo, :contraseña, CURDATE())";
        $hash = hash('sha256', $contraseña);
        $this->query($sql, ['nombre' => $nombre, 'correo' => $correo, 'contraseña' => $hash]);
    }

    public function validarLogin($correo, $contraseña) {
        $sql = "SELECT * FROM Usuario WHERE correo = :correo AND contraseña = :contraseña";
        $hash = hash('sha256', $contraseña);
        $stmt = $this->query($sql, ['correo' => $correo, 'contraseña' => $hash]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
