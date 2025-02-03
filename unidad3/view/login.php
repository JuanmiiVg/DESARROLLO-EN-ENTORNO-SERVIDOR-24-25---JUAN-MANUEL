<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect - Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ea;
        }
        .login-container {
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
                <img src="img/foto1.avif" alt="Mascotas felices">
            </div>

            <!-- Formulario de Login -->
            <div class="col-md-6">
                <div class="card shadow-lg p-4 login-container">
                    <div class="text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Logo PetConnect" class="pet-logo">
                        <h2 class="mt-2">🐾 PetConnect</h2>
                        <p class="text-muted">Conéctate con otros amantes de los animales</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?= ($error) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="contrasenia" class="form-label">Contraseña</label>
                            <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-custom w-100">🐶 Ingresar</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/registro" class="btn btn-link">¿No tienes una cuenta? Regístrate</a>
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
