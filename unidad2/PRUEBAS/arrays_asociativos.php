<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $jose = ["nombre" => "jose", "edad" => 23, "repetidor" => false, "notaM" => 6.78];
    $juan = ["nombre" => "juan", "edad" => 25, "repetidor" => false, "notaM" => 8.55];
    $pedro = ["nombre" => "pedro", "edad" => 33, "repetidor" => true, "notaM" => 5.67];
    $sofia = ["nombre" => "sofia", "edad" => 67, "repetidor" => true, "notaM" => 5.22];
    
    for ($i = 0; $i < 40; $i++) {
        //Vamos creando un array asociativo
        $alumnos[$i]["nombre"] = "Alumno".($i+1);
        $alumnos[$i]["edad"] = rand(1,100);
        //Tiene un 15% de probabilidad de repetir
        $alumnos[$i]["repetidor"] = (rand(1,6)> 1 ? false:true);
        $alumnos[$i]["notaM"] = rand(1.0,10.0);
      
    }

    //Con foreach podemos recorrer cada uno de los elementos de un array
    foreach($alumnos as $alumno) {
        {
            //Para cada alumno, que es un array asociativo
            //Puedo recorrer sus valores utilizando for each y
            //Acceder a las claves y los valores por separado
            foreach($alumno as $clave => $valor) {

                if ($clave == "nombre") {
                    print "<br/>".$valor;
                }
            }
        }
    }

    //var_dump($alumnos);
    ?>
</body>
</html>