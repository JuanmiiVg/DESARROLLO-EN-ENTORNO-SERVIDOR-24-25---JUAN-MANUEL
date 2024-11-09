<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Galería de Imágenes Personalizable</title>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Galería de Imágenes Personalizable</h1>

        <form method="POST" action="">
            <h2>Opciones de cada imagen</h2>

            <?php
            // Listado de imágenes
            $imagenes = [
                "1_DeathNote",
                "2_Erased",
                "3_Parasyte",
                "4_JujutsuKaisen",
                "5_Evangelion",
                "6_ShingekiNoKyojin",
                "7_Monster",
                "8_VioletEvergarden",
                "9_CyberpunkEdgerunner",
                "10_SeriaLExperimentLain"
            ];

            // Opciones por defecto de cada imagen
            $opcionesPorDefecto = "700-400-solid#black#5px";

            // Generamos los campos para cada imagen
            foreach ($imagenes as $nombreImagen) {
                echo "<label for='{$nombreImagen}'>Opciones para {$nombreImagen}:</label><br>";
                echo "<input type='text' name='imagenes[{$nombreImagen}]' value='{$opcionesPorDefecto}-{$nombreImagen}' size='80'><br><br>";
            }
            ?>

            <input type="submit" value="Generar Galería" class="btn-generar">
        </form>

        <?php
        // Comprobamos si se ha enviado el formulario
        if (!empty($_POST['imagenes'])) {
            $imagenesCodificadas = $_POST['imagenes'];
            
            // Incluimos la función para crear la galería
            require_once 'lib/funciones.php';

            // Creamos la galería a partir de las opciones ingresadas
            echo crearGaleria($imagenesCodificadas);
        }
        ?>
    </div>
</body>
</html>