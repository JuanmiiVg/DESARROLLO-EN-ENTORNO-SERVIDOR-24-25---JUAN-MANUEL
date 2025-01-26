<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Entrenadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Entrenadores</h1>

    <form method="POST" action="/entrenadores" class="mb-3 d-flex justify-content-between">
        <div class="input-group">
            <label class="input-group-text" for="pagina">Página:</label>
            <input type="number" name="pagina" id="pagina" class="form-control" value="<?= $pagina ?>" min="1" max="<?= $totalPaginas ?>">
        </div>
        <div class="input-group">
            <label class="input-group-text" for="cantidad">Elementos por página:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?= $cantidad ?>" min="1">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <a href="/entrenadores/crear" class="btn btn-success mb-3">Agregar Nuevo Entrenador</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Experiencia</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($entrenadores as $entrenador): ?>
            <tr>
                <td><?= $entrenador['id'] ?></td>
                <td><?= htmlspecialchars($entrenador['nombre']) ?></td>
                <td><?= $entrenador['experiencia'] ?> años</td>
                <td>
                    <a href="/entrenadores/<?= $entrenador['id'] ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/entrenadores/<?= $entrenador['id'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                    <form method="POST" action="/entrenadores/<?= $entrenador['id'] ?>/eliminar" style="display: inline;">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este entrenador?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pagina > 1): ?>
                <li class="page-item">
                    <form method="POST" action="/entrenadores">
                        <input type="hidden" name="pagina" value="<?= $pagina - 1 ?>">
                        <input type="hidden" name="cantidad" value="<?= $cantidad ?>">
                        <button type="submit" class="btn btn-link page-link">Anterior</button>
                    </form>
                </li>
            <?php endif; ?>
            <?php if ($pagina < $totalPaginas): ?>
                <li class="page-item">
                    <form method="POST" action="/entrenadores">
                        <input type="hidden" name="pagina" value="<?= $pagina + 1 ?>">
                        <input type="hidden" name="cantidad" value="<?= $cantidad ?>">
                        <button type="submit" class="btn btn-link page-link">Siguiente</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>
