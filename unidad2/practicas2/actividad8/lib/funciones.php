<?php

function crearGaleria($imagenesCodificadas) {
    $galeriaHtml = "<div class='galeria'>";

    // Procesamos cada imagen
    foreach ($imagenesCodificadas as $nombreImagen => $opciones) {
        // Descomponemos las opciones de cada imagen
        list($ancho, $alto, $estilo, $nombreImagenReal) = explode('-', $opciones, 4);
        $estilos = explode('#', $estilo);
        
        // Extraemos los estilos: borde, color y sombra
        $borde = $estilos[0] ?? 'solid';
        $colorBorde = $estilos[1] ?? 'black';
        $sombra = $estilos[2] ?? 'none';
        
        // Construimos el estilo inline para la imagen
        $estiloImagen = "width: {$ancho}px; height: {$alto}px; border: 2px {$borde} {$colorBorde}; box-shadow: {$sombra};";
        
        // Construimos la ruta completa de la imagen
        $rutaImagen = "img/{$nombreImagenReal}.jpg";
        
        // Generamos el HTML de la imagen
        $galeriaHtml .= "
            <div class='imagen' style='border: 2px {$borde} {$colorBorde}; box-shadow: {$sombra};'>
                <img src='{$rutaImagen}' alt='{$nombreImagenReal}' style='{$estiloImagen}' 
                    onmouseover=\"this.style.transform='scale(1.1)';\" 
                    onmouseout=\"this.style.transform='scale(1)';\">
            </div>
        ";
    }
    
    $galeriaHtml .= "</div>";
    return $galeriaHtml;
}
?>