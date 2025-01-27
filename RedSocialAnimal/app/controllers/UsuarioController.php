<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function login($correo, $contraseña) {
        $usuario = $this->usuario->validarLogin($correo, $contraseña);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario['id_usuario'];
            header('Location: /publicacion/lista.php');
        } else {
            header('Location: /usuario/login.php?error=1');
        }
    }

    public function registrar($datos) {
        if ($datos['contraseña'] !== $datos['confirmar_contraseña']) {
            header('Location: /usuario/registro.php?error=2');
            return;
        }
        if (strlen($datos['contraseña']) < 8 || !preg_match('/[A-Z]/', $datos['contraseña']) ||
            !preg_match('/[a-z]/', $datos['contraseña']) || !preg_match('/[0-9]/', $datos['contraseña'])) {
            header('Location: /usuario/registro.php?error=3');
            return;
        }
        $this->usuario->registrar($datos['nombre'], $datos['correo'], $datos['contraseña']);
        header('Location: /usuario/login.php?success=1');
    }
}
?>
