<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Crear Jugador</h1>

        <form method="POST" action="/jugadores/crear" class="mt-4">
            <div class="mb-3">
                <label for="nif" class="form-label">NIF</label>
                <input type="text" name="nif" id="nif" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="puntos" class="form-label">Puntos</label>
                <input type="number" name="puntos" id="puntos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="posicion" class="form-label">Posición</label>
                <input type="number" name="posicion" id="posicion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="number" name="altura" id="altura" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Equipo_idEquipo" class="form-label">ID Equipo</label>
                <input type="number" name="Equipo_idEquipo" id="Equipo_idEquipo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Jugador</button>
        </form>
    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>