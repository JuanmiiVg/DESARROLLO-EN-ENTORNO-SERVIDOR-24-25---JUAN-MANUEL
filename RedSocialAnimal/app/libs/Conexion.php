<?php
class Conexion {
    private $pdo;

    public function __construct() {
        $config = include(__DIR__ . '/../../config/database.php');
        try {
            $this->pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['user'],
                $config['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->pdo;
    }
}
?>
