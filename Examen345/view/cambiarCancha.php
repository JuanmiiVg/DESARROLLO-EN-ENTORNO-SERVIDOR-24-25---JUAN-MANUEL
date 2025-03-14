<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Cancha - Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Cambiar Cancha - Equipo <?= $equipo['nombre'] ?></h1>

        <form action="/equipos/<?= $equipo['idEquipo'] ?>/cambiar-cancha" method="POST">
            <div class="mb-3">
                <label for="cancha" class="form-label">Selecciona una nueva cancha</label>
                <select id="cancha" name="cancha_id" class="form-select">
                    <?php foreach ($canchas as $cancha): ?>
                        <option value="<?= $cancha['idCancha'] ?>" <?= $cancha['idCancha'] == $equipo['idCancha'] ? 'selected' : '' ?>>
                            <?= $cancha['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cambiar</button>
        </form>

        <a href="/equipos" class="btn btn-primary mt-3">Volver a la lista de equipos</a>
    </div>
</body>

</html>