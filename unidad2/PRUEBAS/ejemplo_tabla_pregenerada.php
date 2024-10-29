<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php

    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill"/>
    </svg>
    <div>
        An example danger alert with an icon
    </div>
    </div>

    //Si me llegan los datos muestro la persona seleccionada
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Felicidades!</h4>
            <p>Los datos han sido guardados correctamente.</p>
            <hr>
            <p class="mb-0">Gracias por tu colaboración.</p>
        </div>
    }
    //Al cargar el autoload me permite que se automatice
    //La carga de librerias y objetos que tengamos incluidos en el proyecto
    require_once('C:\xampp\htdocs\DES\vendor\autoload.php');

    use Faker\Factory;

    //Configuramos el idioma de el contenido a generar
    $faker = Factory::create('es_ES');
    $faker_ingles = Factory::create('en_EN');

    //Con el método name podemos generar un nombre aleatorio
    $nombre_espanol = $faker->name;
    $nombre_ingles = $faker_ingles->name;

    print "En español me llamo $nombre_espanol y en ingles $nombre_ingles <br/>";

    $lista_personas;

    //Ejemplo de datos que nos podrían llegar desde BD
    for ($i = 0; $i < 20; $i++) {

        //Creamos una persona aleatoria en un array asociativo
        $persona =
        [
            "nombre" => $faker->name,
            "email" => $faker->email,
            "direccion" => $faker->address,
            "telefono" => $faker->phoneNumber
        ];

        //Metemos las personas en un array
        $lista_personas[] = $persona;

    }
?>
<div class="bd-content ps-lg-2">
<div class="bd-example">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">&nbsp</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //Recorremos los datos de las personas y vamos creando las celdas
    foreach ($lista_personas as $persona) {
        print "<tr>";
        print "<th>{$persona['nombre']}</th>"; // <th>1</th>
        print "<td>{$persona['email']}</td>";
        print "<td>{$persona['direccion']}</td>";
        print "<td>{$persona['telefono']}</td>";

        //Creamos un boton que al pulsarlo pase todos los datos
        //de la persona de esta fila a otra web
        print "<td>";
        print "<form action='#' <method='post'>";
        print "<button type='submit' class='btn btn-primary'> Seleccionar </button>";
        print "<input type='hidden' value='" . $persona['nombre'] ."' name='nombre'>";
        print "<input type='hidden' value='" . $persona['email'] ."' name='email'>";
        print "<input type='hidden' value='" . $persona['direccion'] ."' name='direccion'>";
        print "<input type='hidden' value='" . $persona['telefono'] ."' name='telefono'>";
        print "</form>";
        print "<td>";

        print "</tr>";
    }
    ?>
  </tbody>
</div>
</div>

    <?php

    //Mostramos los datos de la persona seleccionada

    ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>