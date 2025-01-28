<?php

class Validacion
{
    public static function limpiarDato($dato)
    {
        $dato = trim($dato); // Eliminar espacios en blanco
        $dato = stripslashes($dato); // Quitar backslashes
        $dato = htmlspecialchars($dato); // Convertir caracteres especiales en entidades HTML
        return $dato;
    }

    public static function validarTexto($texto, $longitudMin = 1, $longitudMax = 255)
    {
        $texto = self::limpiarDato($texto);
        return strlen($texto) >= $longitudMin && strlen($texto) <= $longitudMax;
    }

    public static function validarNumero($numero, $min = 0, $max = PHP_INT_MAX)
    {
        return filter_var($numero, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => $min, 'max_range' => $max]
        ]) !== false;
    }

    public static function validarEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validarPassword($password)
    {
        return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $password);
    }
}
?>
