<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Fichar Nuevo Jugador</h2>

    <form method="POST" action="/jugador/insertar" class="mt-3">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Edad:</label>
            <input type="number" name="edad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Posición:</label>
            <input type="text" name="posicion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Equipo:</label>
            <select name="equipo_id" class="form-select">
                <?php foreach ($equipos as $equipo): ?>
                    <option value="<? $equipo['id'] ?>"><?= $equipo['nombre'] ?> </option>
                    <?php endforeach; ?>
                </select>
        </div>

        <button  type="submit" class="btn btn-success"?>Insertar</button>
        <a href="/entrenadores/detalle" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<?php include 'footer.php'; ?>