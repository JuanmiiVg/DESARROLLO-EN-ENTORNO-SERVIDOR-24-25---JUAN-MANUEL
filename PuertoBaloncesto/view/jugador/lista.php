<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jugadores</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Jugadores</h1>
        <a href="/jugadores/crear" class="btn btn-success mb-3">Agregar Nuevo Jugador</a>

        <table class="table table-bordered">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $jugador): ?>
                    <tr>
                        <td><?= $jugador['idJugador'] ?></td>
                        <td><?= $jugador['nif'] ?></td>
                        <td><?= $jugador['nombre'] ?></td>
                        <td><?= $jugador['edad'] ?></td>
                        <td><?= $jugador['puntos'] ?></td>
                        <td><?= $jugador['posicion'] ?></td>
                        <td><?= $jugador['altura'] ?></td>
                        <td><?= $jugador['Equipo_idEquipo'] ?></td>
                        <td>
                            <a href="/jugadores/<?= $jugador['idJugador'] ?>?pagina=<?= $pagina ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="/jugadores/<?= $jugador['idJugador'] ?>/modificar?pagina=<?= $pagina ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/jugadores/<?= $jugador['idJugador'] ?>/eliminar?pagina=<?= $pagina ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                        <a class="page-link" href="/jugadores?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>