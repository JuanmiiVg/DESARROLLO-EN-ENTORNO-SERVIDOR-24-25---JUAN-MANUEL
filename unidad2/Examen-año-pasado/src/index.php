<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ayuda</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Formulario de Solicitud de Ayuda</h1>
    <form action="process.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="edad">Edad:</label>
        <select id="edad" name="edad" required>
            <option value="0">Seleccione</option>
            <?php for ($i = 18; $i <= 100; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select><br>

        <label for="estado">Estado Civil:</label>
        <input type="radio" id="soltero" name="estado" value="soltero" required>
        <label for="soltero">Soltero</label>
        <input type="radio" id="casado" name="estado" value="casado">
        <label for="casado">Casado</label><br>

        <label for="sueldo">Rango de Sueldo:</label>
        <select id="sueldo" name="sueldo" required>
            <option value="0">Seleccione</option>
            <?php for ($i = 0; $i <= 50000; $i += 10000): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select><br>

        <label for="hijos">Hijos (nombre edad sexo minusvalía):</label><br>
        <textarea id="hijos" name="hijos" rows="5" cols="30" required></textarea><br>

        <label for="domicilios">Domicilios (provincia núm. habitaciones piso vivienda habitual):</label><br>
        <textarea id="domicilios" name="domicilios" rows="5" cols="30" required></textarea><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>