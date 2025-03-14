<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Partidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-4">
        <h1 class="text-center">Lista de Partidos</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Puntos Visitante</th>
                    <th>Puntos Local</th>
                    <th>Duracion</th>
                    <th>ID Equipo visitante</th>
                    <th>ID Equipo local</th>
                    <th>ID cancha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($partidos as $partido): ?>
                    <?php

                    if (($idEquipo['id'] == $partido['idEquipo_local'] && $partido['puntosLocal'] > $partido['puntosVisitante']) || ($idEquipo['id'] == $partido['idEquipo_visitante'] && $partido['puntosVisitante'] > $partido['puntosLocal'])) {
                    ?>
                        <style>
                            .partidoG {
                                background-color: green;
                            }
                        </style>
                        <tr class="partidoG">
                            <td><?= $partido['idPartido'] ?></td>
                            <td><?= $partido['puntosVisitante'] ?></td>
                            <td><?= $partido['puntosLocal'] ?></td>
                            <td><?= $partido['duracion'] ?></td>
                            <td><?= $partido['idEquipo_visitante'] ?></td>
                            <td><?= $partido['idEquipo_local'] ?></td>
                            <td><?= $partido['Cancha_idCancha'] ?></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <style>
                            .partidoP {
                                background-color: red;
                            }
                        </style>
                        <tr class="partidoP">
                            <td><?= $partido['idPartido'] ?></td>
                            <td><?= $partido['puntosVisitante'] ?></td>
                            <td><?= $partido['puntosLocal'] ?></td>
                            <td><?= $partido['duracion'] ?></td>
                            <td><?= $partido['idEquipo_visitante'] ?></td>
                            <td><?= $partido['idEquipo_local'] ?></td>
                            <td><?= $partido['Cancha_idCancha'] ?></td>
                        </tr>
                    <?php

                    }

                    ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>