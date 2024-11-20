<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Análisis de Tiendas</title>
 
<body>
    <h1>Formulario de Tiendas y Plantas</h1>
    <form action="funciones.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" class="form-control" required>

        <label for="comunidad">Comunidad Autónoma:</label>
        <input type="text" id="comunidad" name="comunidad" class="form-control" required>

        <label for="tienda_seleccionada">Tienda Seleccionada:</label>
        <select id="tienda_seleccionada" name="tienda_seleccionada" class="form-control" required>
            <option value="Tienda Natural">Tienda Natural</option>
            <option value="Eco Plant">Eco Plant</option>
            <option value="Flora Bella">Flora Bella</option>
        </select>

        <label for="eliminar">
            <input type="checkbox" id="eliminar" name="eliminar"> Eliminar
        </label>

        <label for="tiendas">Tiendas:</label>
        <textarea id="tiendas" name="tiendas" required></textarea>

        <label for="plantas">Plantas:</label>
        <textarea id="plantas" name="plantas" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>