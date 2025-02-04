<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Entrenador</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Detalles del Entrenador</h1>

        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <td><?= $entrenador['idEntrenador'] ?></td>
            </tr>
            <tr>
                <th>NIF</th>
                <td><?= $entrenador['nif'] ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?= htmlspecialchars($entrenador['nombre']) ?></td>
            </tr>
            <tr>
                <th>Edad</th>
                <td><?= $entrenador['edad'] ?> años</td>
            </tr>
            <tr>
                <th>Altura</th>
                <td><?= $entrenador['altura'] ?> cm</td>
            </tr>
        </table>

        <h2 class="text-center mt-4">Equipos del Entrenador</h2>
        <div class="mb-3">
            <label for="equipos" class="form-label">Equipos</label>
            <select id="equipos" class="form-select">
                <?php foreach ($equipos as $equipo): ?>
                    <option value="<?= $equipo['idEquipo'] ?>"><?= htmlspecialchars($equipo['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <h2 class="text-center mt-4">Jugadores del Entrenador</h2>
        <table class="table table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Puntos</th>
                    <th>Posición</th>
                    <th>Altura</th>
                    <th>ID Equipo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $jugador): ?>
                    <tr>
                        <td><?= $jugador['idJugador'] ?></td>
                        <td><?= $jugador['nif'] ?></td>
                        <td><?= htmlspecialchars($jugador['nombre']) ?></td>
                        <td><?= $jugador['edad'] ?></td>
                        <td><?= $jugador['puntos'] ?></td>
                        <td><?= $jugador['posicion'] ?></td>
                        <td><?= $jugador['altura'] ?> cm</td>
                        <td><?= $jugador['Equipo_idEquipo'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/entrenadores?pagina=<?= $pagina ?>" class="btn btn-secondary">Volver al listado</a>
    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>