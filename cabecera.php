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
    <style>
        .btn-custom {
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
  
<div class="container my-4 d-flex align-items-center">
    <img src="Imagenes/Up.png" alt="Logo de Gallery Up" style="width: 100px; margin-right: 20px;"> <!-- Logo -->
    <a href="index.php" class="btn btn-primary btn-custom me-2">Inicio</a>
    <a href="galeria.php" class="btn btn-secondary btn-custom me-2">Galería</a>
    <a href="cerrar.php" class="btn btn-danger btn-custom">Cerrar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

