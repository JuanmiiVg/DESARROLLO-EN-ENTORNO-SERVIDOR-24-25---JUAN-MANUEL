<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Jugador</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Detalles del Jugador</h1>

        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <td><?= $jugador['idJugador'] ?></td>
            </tr>
            <tr>
                <th>NIF</th>
                <td><?= $jugador['nif'] ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?= htmlspecialchars($jugador['nombre']) ?></td>
            </tr>
            <tr>
                <th>Edad</th>
                <td><?= $jugador['edad'] ?> años</td>
            </tr>
            <tr>
                <th>Puntos</th>
                <td><?= $jugador['puntos'] ?></td>
            </tr>
            <tr>
                <th>Posición</th>
                <td><?= $jugador['posicion'] ?></td>
            </tr>
            <tr>
                <th>Altura</th>
                <td><?= $jugador['altura'] ?> cm</td>
            </tr>
            <tr>
                <th>ID Equipo</th>
                <td><?= $jugador['Equipo_idEquipo'] ?></td>
            </tr>
        </table>

        <a href="/jugadores?pagina=<?= $pagina ?>" class="btn btn-secondary">Volver al listado</a>
    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>