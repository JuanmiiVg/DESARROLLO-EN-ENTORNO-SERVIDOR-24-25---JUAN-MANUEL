<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Entrenador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <th>Nif</th>
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
            <tr>
                <th>Altura</th>
                <td><?= $entrenador['altura'] ?> cm</td>
            </tr>
            <tr>
                <th>Equipos</th>
                <td>
                    <form action="/entrenadores/<?= $entrenador['idEntrenador'] ?>/equipo" method="post">
                        <select name='idEquipo' id='idEquipo'>
                            <option value=''>Selecciona un equipo</option>
                            <?php foreach ($listaEquipos as $equipo): ?>
                                <option value='<?= $equipo['idEquipo'] ?>'><?= $equipo['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Cargar</button>
                    </form>
                </td>
            </tr>
            <?php 
            //Si han llegado los datos de los jugadores los mostramos en una lista
            if (isset($listaJugadores)){
                 foreach ($listaJugadores as $jugador){ ?>
            <tr>
                <td><?= $jugador['idJugador'] ?></td>
                <td><?= $jugador['nombre'] ?></td>
                <td><?= $jugador['puntos'] ?></td>
                <td><?= $jugador['altura']?></td>
                <td>
                    <a href="/jugadores/<?= $jugador['idJugador'] ?>/ver" class="btn btn-info btn-sm">Ver</a>

                    <a href="/jugadores/<?= $jugador['idJugador'] ?>/traspasar" class="btn btn-warning btn-sm">Editar</a>

                    <a href="/jugadores/<?= $jugador['idJugador'] ?>/eliminar" class="btn btn-danger btn-sm">Despedir</a>
                </td>
            </tr>
        <?php }} ?>


        </table>

        <a href="/" class="btn btn-secondary">Volver al listado</a>
    </div>
</body>

</html>