<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect - Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ea;
        }
        .register-container {
            max-width: 400px;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
        .card {
            border-radius: 15px;
        }
        .pet-logo {
            width: 80px;
            display: block;
            margin: 0 auto;
        }
        .image-container {
            text-align: center;
        }
        .image-container img {
            max-width: 90%;
            border-radius: 10px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 d-flex align-items-center">
            <!-- Imagen decorativa -->
            <div class="col-md-6 image-container d-none d-md-block">
                <img src="img/foto2.jpg" alt="Mascotas felices">
            </div>

            <!-- Formulario de Registro -->
            <div class="col-md-6">
                <div class="card shadow-lg p-4 register-container">
                    <div class="text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Logo PetConnect" class="pet-logo">
                        <h2 class="mt-2">🐾 PetConnect</h2>
                        <p class="text-muted">Únete a la comunidad de amantes de los animales</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/registro">
                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label">Usuario</label>
                            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenia" class="form-label">Contraseña</label>
                            <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-custom w-100">🐶 Registrarse</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
