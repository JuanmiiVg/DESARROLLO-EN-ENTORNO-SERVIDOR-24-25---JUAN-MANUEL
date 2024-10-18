<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Básico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body style="display: flex; justify-content: center; background-color: #f5f5f5;">
    <div class="container" style="width: 50%;">
        <h1 class="mt-3">Formulario de Tratamiento de Texto</h1>
        <form method="post" action="ejemplo_tratamiento_texto.php">
            <div class="form-group mt-3">
                <label for="palabra">Palabra</label>
                <input type="text" id="palabra" name="palabra" class="form-control" required style="width: 50%;">
            </div>
            <div class="form-group mt-3">
                <div class="form-check">
                    <input type="checkbox" id="ignoraMayusculas" name="ignoraMayusculas" class="form-check-input">
                    <label class="form-check-label" for="ignoraMayusculas">Ignorar mayúsculas</label>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="texto">Texto</label>
                <textarea id="texto" name="texto" class="form-control" rows="5" required style="width: 50%;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>
</body>

</html>