<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Entrenadores y Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Equipos</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Division</th>
                    <th>Puntos</th>
                    <th>Cancha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo): ?>
                    <tr>
                        <td><?= $entrenador['idEquipo'] ?></td>
                        <td><?= $entrenador['nombre'] ?></td>
                        <td><?= $entrenador['ciudad'] ?></td>
                        <td><?= $entrenador['division'] ?></td>
                        <td><?= $entrenador['puntos'] ?></td>
                        <td><?= $entrenador['cancha'] ?></td>
                        <td>
                            <a href="/equipos/<?= $entrenador['idEquipo'] ?>/cambiarCancha" class="btn btn-info btn-sm">Cambiar Cancha</a>
                            <a href="/equipos/<?= $entrenador['idEquipo'] ?>/eliminar" class="btn btn-warning btn-sm">Eliminar</a>
                            <a href="/equipos/<?= $entrenador['idEquipo'] ?>/partidos" class="btn btn-danger btn-sm">Partidos</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 class="text-center mt-5">Lista de Equipos</h2>
        <a href="/equipos/crear" class="btn btn-success mb-3">Agregar Nuevo Equipo</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo): ?>
                    <tr>
                        <td><?= $equipo['idEquipo'] ?></td>
                        <td><?= $equipo['nombre'] ?></td>
                        <td>
                            <a href="/equipos/<?= $equipo['idEquipo'] ?>/cambiar-cancha" class="btn btn-warning btn-sm">Cambiar Cancha</a>
                            <a href="/equipos/<?= $equipo['idEquipo'] ?>/eliminar" class="btn btn-danger btn-sm">Eliminar</a>
                            <a href="/equipos/<?= $equipo['idEquipo'] ?>/partidos" class="btn btn-info btn-sm">Mostrar Partidos</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html