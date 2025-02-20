<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Traspasar Jugador</h2>

    <form method="POST" action="/jugador/traspasar" class="mt-3">
        <input type="hidden" name="jugador_id" value="<?= $jugador_id ?>">
        <label class="form-label">Selecciona un equipo: </label>
        <div class="d-flex">
            <select name="equipo_id" class="form-select  w-50 me-2">
                <?php foreach ($equipos as $equipo): ?>
                    <option value="<?= $equipo['id']?>"><?= $equipo['nombre'] ?> </option>
                    <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary">Traspasar</button>
        </div>
    </form>
    <a href="/entrenadores/detalle?id=<?= $jugador['entrenador_id'] ?>" class="btn btn-secondary mt-3">Cancelar</a>
</div>

<?php include 'footer.php'; ?>