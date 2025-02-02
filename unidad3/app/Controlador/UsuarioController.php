<?php
namespace App\Controlador;
use PDO;
use App\Utils\Utils;
class UsuarioController {
    public function login () {
        session_start();
        $con = Utils::getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
    }
}
?>
