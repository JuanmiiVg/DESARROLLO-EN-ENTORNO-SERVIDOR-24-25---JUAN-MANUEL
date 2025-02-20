<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-3"> Detalles del Entrenador </h2>

    <div class ="card p-3">
        <p><strong>Nombre:</strong> <?= $entrenador['nombre'] ?> </p>
        <p><strong>Edad:</strong> <?= $entrenador['edad'] ?></p>
    </div>

    <h3 class="mt-4">Equipos Entrenados</h3
    <div class="d-flex">
        <select id="selectEquipos" class="form-select w-50 me-2">
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= $equipo['id'] ?>"><?= $equipo['nombre'] ?> </option>
                <?php endforeach; ?>
        </select>
        <button class="btn btn-primary" id="btnCargar">Cargar</button>
</div>

<script>
    document.getElementById('btnCargar').addEventListener('click', function()
    {
        let equipoId = document.getElementById('selectEquipos').value;
        fetch(`/equipo/jugadores?id=${equipoID}`)
        .then(response => response.json())
        .then(data => {
            let lista = document.getElementById('listaJugadores');
            lista.innerHTML='';
            data.forEach(jugador => {
                lista.innerHTML+= `
                <div class="card p-2 mb-2">
                <p class="mb-1"><strong>${jugador.nombre}</strong> - ${jugador.posicion}</p>
                <button class="btn btn warning btn-sm" onclick="despedir(${jugador.id})>Traspasar</button>
                </div>`
            });
        });
    });

    function traspasar (id) {
        window.location.href = `/jugador/despedir?id=${id}`;
    }

    function despedir (id){
        if (confirm ("¿Seguro que quieres despedir al jugador?")) {
            window.location.href = `/jugador/despedir?id={id}`;
        }
    }

    document.getElementById('btnFichar').addEventListener('click', function() {
        window.location.href = "/jugador/insertar";
    });
</script>

<?php include 'footer.php'; ?>