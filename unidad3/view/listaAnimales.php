<!DOCTYPE html>
<html lang="es">
<?php 
    include_once 'auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect - Lista de Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ea;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
        .card {
            border-radius: 15px;
        }
        .pet-logo {
            width: 60px;
        }
        .pagination a {
            margin: 0 5px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Logo PetConnect" class="pet-logo">
        <h1 class="mt-2">🐾 Lista de Animales</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="/animales/crear" class="btn btn-success mb-3">➕ Agregar Nuevo Animal</a>
        <a href="/logout" class="btn btn-danger">🚪 Cerrar Sesión</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animales as $animal): ?>
                <tr>
                    <td><?= $animal['id_animal'] ?></td>
                    <td><a href="/animales/<?= $animal['id_animal'] ?>" class="btn btn-link"><?= $animal['nombre'] ?></a></td>
                    <td><?= $animal['especie'] ?></td>
                    <td><?= $animal['edad'] ?> años</td>
                    <td>
                        <a href="/animales/<?= $animal['id_animal'] ?>/modificar" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <a href="/animales/<?= $animal['id_animal'] ?>/eliminar" class="btn btn-danger btn-sm">❌ Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <?php if ($pagina > 1): ?>
                <li class="page-item"><a href="/listaAnimales/<?= ($pagina-1) ?>" class="btn btn-secondary">⬅ Anterior</a></li>
            <?php endif; ?>

            <?php for ($i=1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item">
                    <a href="/listaAnimales/<?= $i ?>" class="btn <?= ($i == $pagina) ? 'btn-success' : 'btn-primary' ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($pagina < $totalPaginas): ?>
                <li class="page-item"><a href="/listaAnimales/<?= ($pagina+1) ?>" class="btn btn-secondary">Siguiente ➡</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
