<?php

namespace App\Utils;

use PDO;
use PDOException;

class Utils
{
    static function getConnection()
    {
        $dsn = $_ENV['DSN'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $con = new PDO($dsn, $user, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        return $con;
    }

    static function obtenerTipoParametro($variable)
    {
        switch (gettype($variable)) {
            case 'boolean':
                return PDO::PARAM_BOOL;
            case 'integer':
                return PDO::PARAM_INT;
            case 'double':
            case 'string':
                return PDO::PARAM_STR;
            case 'NULL':
                return PDO::PARAM_NULL;
            default:
                return PDO::PARAM_STR;
        }
    }

    static function render($view, $data = [])
    {
        extract($data);
        require_once "./view/$view.php";
    }

    static function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}
