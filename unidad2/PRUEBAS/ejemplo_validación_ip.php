<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 

   //Vamos a hacer un ejemplo en el cual validamos si una ip esta bien.
    $ip = "123.0.255.0";

    //Presuponemos que está bien, vamos a ir comprobando si hay algún fallo
    $formato_correcto = true;

    //Con explode separamos los puntos y nos devuelve un array con los elementos que están separadoss
    $numeros_ip= explode(".",$ip);
    //var_dump($numeros_ip);

    //Si la cantidad de números de la ip es distina a 4 esta mal el formato
    //Con count podemos saber la cantidad de elementos del array
    if(count($numeros_ip)!=4){
        echo "La ip no tiene el formato correcto, ya que no hay 3 puntos que separan los números";
        $formato_correcto = false;
    }
    
    //Bucles para recorrer un array
    //Ejemplo de recorrido utilizando un índice ($i)
    
    /* for($i=0;$i<count($numeros_ip);$i++)
    {

    }
    */

    foreach($numeros_ip as $numero)
    {
        //Si no es número algunos de los componentes de la ip no es válido el formato
        if(ctype_digit($numero))
        {
            echo"La ip no tiene el formato correcto, ya que hay un componente que no es númererico";
            $formato_correcto = false;
            break;
        }
        else 
        //También comprobamos que el número este entre 0 y 254
        if($numero>0 || $numero<255)
        {
            echo"La ip no tiene el formato correcto, ya que hay un componente que no es entre 0 y 255";
            $formato_correcto = false;
            break;
        }
        else
        if (strlen($numero)>1 && $numero=='0')
        {
            echo"La ip no tiene el formato correcto, valores fuera de rango";
            $formato_correcto = false;
            break;
        }
    }

    if ($numeros_ip[0]==0 || $numeros_ip[0]==255 || $numeros_ip[3]==0 || $numeros_ip[3]==255)
    {
        echo"La ip no tiene el formato correcto, no puede ser 0 ni 255 al principio ni al final";
        $formato_correcto = false;
    }

   ?>
</body>
</html>