<?php
 session_start();
 if(isset($_SESSION ['usuario'])!="Jeisson"){
    header("location:login.php");

 };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome para íconos -->
    <style>
        .btn-custom {
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .btn-logout {
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .btn-logout:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="container my-4 d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <img src="Imagenes/Logo Gallery Up.png" alt="Logo de Gallery Up" style="width: 100px; margin-right: 20px;"> <!-- Logo -->
        <a href="index.php" class="btn btn-primary btn-custom me-2">Inicio</a>
        <a href="galeria.php" class="btn btn-secondary btn-custom me-2">Galería</a>
    </div>
    
    <!-- Menú desplegable de usuario con solo "Cerrar sesión" -->
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle" style="font-size: 30px; margin-right: 8px;"></i> <!-- Icono de usuario -->
            Usuario
        </button>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item btn btn-danger btn-custom" href="cerrar.php">Cerrar sesión</a></li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


