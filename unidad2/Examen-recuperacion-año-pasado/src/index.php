<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Videojuego</title>
</head>
<body>
    <h1>Información del Videojuego</h1>
    <form action="process.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="aventura">Aventura</option>
            <option value="plataformas">Plataformas</option>
            <option value="shooter">Shooter</option>
        </select><br><br>

        <label>Digital:</label>
        <input type="radio" id="si" name="digital" value="si" required>
        <label for="si">Sí</label>
        <input type="radio" id="no" name="digital" value="no" required>
        <label for="no">No</label><br><br>

        <label for="desarrollador">Desarrollador:</label>
        <input type="text" id="desarrollador" name="desarrollador" required><br><br>

        <label for="precio">Precio:</label>
        <select id="precio" name="precio" required>
            <?php for ($i = 1; $i <= 150; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?> €</option>
            <?php endfor; ?>
        </select><br><br>

        <label for="fecha_lanzamiento">Fecha de Lanzamiento:</label>
        <input type="date" id="fecha_lanzamiento" name="fecha_lanzamiento" required><br><br>

        <label for="fases">Fases (una por línea):</label><br>
        <textarea id="fases" name="fases" rows="5" required></textarea><br><br>

        <label for="almacenes">Almacenes (una por línea):</label><br>
        <textarea id="almacenes" name="almacenes" rows="5" required></textarea><br><br>

        <button type="submit">Solicitud</button>
    </form>
</body>
</html>