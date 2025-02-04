<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Equipos</h1>
    <a href="/equipos/crear" class="btn btn-success mb-3">Agregar Nuevo Equipo</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>División</th>
            <th>Puntos</th>
            <th>ID Entrenador</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($equipos as $equipo): ?>
            <tr>
                <td><?= $equipo['idEquipo'] ?></td>
                <td><?= $equipo['nombre'] ?></td>
                <td><?= $equipo['ciudad'] ?></td>
                <td><?= $equipo['division'] ?></td>
                <td><?= $equipo['puntos'] ?></td>
                <td><?= $equipo['Entrenador_idEntrenador'] ?></td>
                <td>
                    <a href="/equipos/<?= $equipo['idEquipo'] ?>?pagina=<?= $pagina ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/equipos/<?= $equipo['idEquipo'] ?>/modificar?pagina=<?= $pagina ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/equipos/<?= $equipo['idEquipo'] ?>/eliminar?pagina=<?= $pagina ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                    <a class="page-link" href="/equipos?pagina=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>

</div>
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>