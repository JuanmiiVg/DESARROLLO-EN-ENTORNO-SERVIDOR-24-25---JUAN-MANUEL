<?php
define("HORTALIZAS", 1);
define("FLORALES", 2);
define("ORNAMENTALES", 3);
define("TROPICALES", 4);

function plantas_tienda($nombreTienda, $plantas) {
    $lista_planta = [];
    foreach (explode("\n", $plantas) as $linea) {
        $datos = explode("-", trim($linea));
        if ($datos[0] === $nombreTienda) {
            $lista_planta[] = $datos;
        }
    }
    return $lista_planta;
}

function comprobar_plantas_tienda($tiendas, $plantas) {
    $resultados = [];
    foreach ($tiendas as $tienda) {
        list($nombre, , , , , $numPlantas) = explode("-", $tienda);
        $plantasDeTienda = plantas_tienda($nombre, $plantas);
        $resultados[$nombre] = count($plantasDeTienda) == $numPlantas;
    }
    return $resultados;
}

function comprobar_sevilla($tiendas, $plantas) {
    foreach ($tiendas as $tienda) {
        $datos = explode("-", $tienda);
        if ($datos[2] === "Sevilla") {
            $plantasDeTienda = plantas_tienda($datos[0], $plantas);
            $preciosValidos = true;
            $orquideasRosas = false;
            foreach ($plantasDeTienda as $planta) {
                if (in_array($planta[1], ["Orquidea", "Rosa"]) && $planta[3] <= 10) {
                    $orquideasRosas = true;
                }
                if ($planta[3] > 10) {
                    $preciosValidos = false;
                }
            }
            if (!$orquideasRosas || !$preciosValidos) {
                return false;
            }
        }
    }
    return true;
}

function comprobar_tienda_plantas($tiendas, $plantas) {
    foreach ($tiendas as $tienda) {
        $datos = explode("-", $tienda);
        if (!plantas_tienda($datos[0], $plantas)) {
            return false;
        }
    }
    return true;
}

function listar_plantas_totales($tiendas, $plantas) {
    $resultados = [];
    foreach ($tiendas as $tienda) {
        $datos = explode("-", $tienda);
        $plantasDeTienda = plantas_tienda($datos[0], $plantas);
        $totalPlantas = 0;
        foreach ($plantasDeTienda as $planta) {
            $totalPlantas += $planta[2];
        }
        $resultados[$datos[0]] = $totalPlantas;
    }
    return $resultados;
}

function recaudado_tienda($tiendas) {
    $mejor = null;
    $peor = null;
    $max = PHP_INT_MIN;
    $min = PHP_INT_MAX;

    foreach ($tiendas as $tienda) {
        $datos = explode("-", $tienda);
        $facturacion = $datos[4];
        if ($facturacion > $max) {
            $max = $facturacion;
            $mejor = $datos[0];
        }
        if ($facturacion < $min) {
            $min = $facturacion;
            $peor = $datos[0];
        }
    }
    return ["mejor" => $mejor, "peor" => $peor];
}

$nombre = $_POST['nombre'];
$pais = $_POST['pais'];
$comunidad = $_POST['comunidad'];
$tiendas = explode("\n", trim($_POST['tiendas']));
$plantas = trim($_POST['plantas']);

$comprobaciones = [];
$comprobaciones['plantas_tienda'] = comprobar_plantas_tienda($tiendas, $plantas);
$comprobaciones['sevilla'] = comprobar_sevilla($tiendas, $plantas);
$comprobaciones['una_planta'] = comprobar_tienda_plantas($tiendas, $plantas);
$comprobaciones['plantas_totales'] = listar_plantas_totales($tiendas, $plantas);
$comprobaciones['facturacion'] = recaudado_tienda($tiendas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Tiendas</title>
</head>
<body>
    <h1>Análisis del Mes: <?php echo date("F Y"); ?></h1>
    <h2>Comunidad: <?php echo $comunidad; ?>, País: <?php echo $pais; ?></h2>
    <h3>Resultados</h3>
    <table border="1">
        <tr>
            <th>Comprobación</th>
            <th>Resultado</th>
        </tr>
        <?php foreach ($comprobaciones as $key => $resultado): ?>
            <tr>
                <td><?php echo str_replace('_', ' ', $key); ?></td>
                <td>
                    <?php 
                    if (is_array($resultado)) {
                        foreach ($resultado as $k => $v) {
                            echo "$k -> $v<br>";
                        }
                    } else {
                        echo $resultado ? "True" : "False";
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>