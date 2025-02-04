<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Equipo</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Modificar Equipo</h1>

        <form method="POST" action="/equipos/<?= $equipo['idEquipo'] ?>/modificar?pagina=<?= $pagina ?>" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $equipo['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?= $equipo['ciudad'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="division" class="form-label">División</label>
                <input type="text" name="division" id="division" class="form-control" value="<?= $equipo['division'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="puntos" class="form-label">Puntos</label>
                <input type="number" name="puntos" id="puntos" class="form-control" value="<?= $equipo['puntos'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="Entrenador_idEntrenador" class="form-label">ID Entrenador</label>
                <input type="number" name="Entrenador_idEntrenador" id="Entrenador_idEntrenador" class="form-control" value="<?= $equipo['Entrenador_idEntrenador'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>