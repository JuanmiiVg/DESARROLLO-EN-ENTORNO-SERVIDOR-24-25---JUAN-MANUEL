<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Entrenadores</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Entrenadores</h1>
        <a href="/entrenadores/crear" class="btn btn-success mb-3">Agregar Nuevo Entrenador</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nif</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Altura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entrenadores as $entrenador): ?>
                    <tr>
                        <td>
                            <a href="#" class="entrenador-id" data-id="<?= $entrenador['idEntrenador'] ?>">
                                <?= $entrenador['idEntrenador'] ?>
                            </a>
                        </td>
                        <td><?= $entrenador['nif'] ?></td>
                        <td><?= htmlspecialchars($entrenador['nombre']) ?></td>
                        <td><?= $entrenador['edad'] ?></td>
                        <td><?= $entrenador['altura'] ?> cm</td>
                        <td>
                            <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>?pagina=<?= $pagina ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>/modificar?pagina=<?= $pagina ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>/eliminar?pagina=<?= $pagina ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    <tr class="equipos-entrenador" id="equipos-<?= $entrenador['idEntrenador'] ?>" style="display: none;">
                        <td colspan="6">
                            <label for="equipos-<?= $entrenador['idEntrenador'] ?>-select" class="form-label">Equipos</label>
                            <select id="equipos-<?= $entrenador['idEntrenador'] ?>-select" class="form-select">
                                <!-- Opciones se cargarán dinámicamente -->
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                        <a class="page-link" href="/entrenadores?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>
    <script>
        $(document).ready(function() {
            $('.entrenador-id').on('click', function(e) {
                e.preventDefault();
                var entrenadorId = $(this).data('id');
                var $equiposRow = $('#equipos-' + entrenadorId);
                var $equiposSelect = $('#equipos-' + entrenadorId + '-select');

                if ($equiposRow.is(':visible')) {
                    $equiposRow.hide();
                } else {
                    $.get('/entrenadores/' + entrenadorId + '/equipos', function(data) {
                        var equipos = JSON.parse(data);
                        $equiposSelect.empty();
                        equipos.forEach(function(equipo) {
                            $equiposSelect.append(new Option(equipo.nombre, equipo.idEquipo));
                        });
                        $equiposRow.show();
                    });
                }
            });
        });
    </script>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>