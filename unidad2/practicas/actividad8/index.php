<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Generador de Página Web</title>
    
</head>
<body>
    <div class="container">
        <h1 class="my-4">Selecciona los componentes de la página</h1>
        <form method="post">
            <div class="form-group">
                <label for="header">Encabezado</label>
                <select class="form-control" id="header" name="header">
                    <option value="encabezado/encabezado1">Encabezado 1</option>
                    <option value="encabezado/encabezado2">Encabezado 2</option>
                    <option value="encabezado/encabezado3">Encabezado 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="body">Cuerpo</label>
                <select class="form-control" id="body" name="body">
                    <option value="cuerpo/cuerpo1">Cuerpo 1</option>
                    <option value="cuerpo/cuerpo2">Cuerpo 2</option>
                    <option value="cuerpo/cuerpo3">Cuerpo 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="footer">Pie</label>
                <select class="form-control" id="footer" name="footer">
                    <option value="pie/pie1">Pie 1</option>
                    <option value="pie/pie2">Pie 2</option>
                    <option value="pie/pie3">Pie 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="style">Estilo</label>
                <select class="form-control" id="style" name="style">
                    <option value="estilo/estilo1.css">Estilo 1</option>
                    <option value="estilo/estilo2.css">Estilo 2</option>
                    <option value="estilo/estilo3.css">Estilo 3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Página</button>
        </form>

    <?php
    if (isset($_POST['header']) && isset($_POST['body']) && isset($_POST['footer']) && isset($_POST['style'])) {
        // Obtener las selecciones del formulario
        $header = $_POST['header'];
        $body = $_POST['body'];     
        $footer = $_POST['footer'];  
        $style = $_POST['style'];    
    } else {
        // Valores predeterminados
        $header = 'encabezado/encabezado1';
        $body = 'cuerpo/cuerpo1';
        $footer = 'pie/pie1';
        $style = 'estilo/estilo1.css';
    }

    // Incluir archivos seleccionados
    echo '<link rel="stylesheet" href="' . $style . '">';
    include($header . '.php');
    include($body . '.php');
    include($footer . '.php');
    ?>

    </div>
</body>
</html>
