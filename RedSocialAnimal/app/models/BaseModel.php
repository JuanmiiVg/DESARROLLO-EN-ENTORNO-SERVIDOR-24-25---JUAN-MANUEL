<?php
require_once __DIR__ . '/../libs/Conexion.php';

class BaseModel {
    protected $conexion;

    public function __construct() {
        $conexion = new Conexion();
        $this->conexion = $conexion->getConexion();
    }

    protected function query($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
?>
