<?php
require_once __DIR__ . '/../app/libs/conexion.php';
require_once __DIR__ . '/../app/models/Usuario.php';
require_once __DIR__ . '/../app/libs/validacion.php';

$conexion = new Conexion();
$usuarioModel = new Usuario($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = Validacion::limpiarDato($_POST['id']);
    $nombre = Validacion::limpiarDato($_POST['nombre']);
    $email = Validacion::limpiarDato($_POST['email']);
    $password = Validacion::limpiarDato($_POST['password']);

    // Validación de los datos ingresados
    if (
        Validacion::validarTexto($nombre, 3, 100) &&
        Validacion::validarEmail($email) &&
        (empty($password) || Validacion::validarPassword($password))
    ) {
        $resultado = $usuarioModel->actualizarUsuario($id, $nombre, $email, $password);

        if ($resultado) {
            header('Location: index.php?mensaje=modificacion_exitosa');
            exit();
        } else {
            $error = 'No se pudo modificar el usuario.';
        }
    } else {
        $error = 'Datos inválidos. Revisa los campos e inténtalo de nuevo.';
    }
}

if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
} else {
    echo "ID de usuario no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Modificar Usuario</h1>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña (dejar vacío para no cambiar)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
