<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php   

$objconexion= new conexion();
$resultado=$objconexion->consultar("SELECT * FROM `proyectos`");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Agregar Bootstrap Icons -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef; /* Color de fondo suave */
            color: #343a40; /* Color de texto */
        }
        .carousel-item img {
            object-fit: cover;
            height: 500px; /* Aumenté la altura del carousel */
        }
        .bg-dark-custom {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 1rem;
            overflow: hidden; /* Para evitar desbordes */
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }
        footer {
            background-color: #222;
            color: white;
            padding: 20px 0;
        }
        
        .btn-custom {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            transition: transform 0.3s, background-color 0.3s;
            font-weight: bold;
        }
        .btn-custom:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #2575fc, #6a11cb);
        }
        h1 {
            font-weight: 700;
            color: #6a11cb; /* Color atractivo */
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #6a11cb;
            margin-bottom: 1rem;
        }
        .whatsapp-bubble {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .whatsapp-bubble img {
            width: 40px; /* Tamaño del icono */
        }

        /* Estilos para las tarjetas */
        .card-img-top {
            object-fit: contain; /* Mantiene las proporciones de la imagen sin recortarla */
            max-width: 100%; /* Ajusta el ancho máximo */
            max-height: 250px; /* Limita la altura máxima de la imagen */
            width: auto; /* Mantiene la proporción original */
            height: auto; /* Mantiene la proporción original */
        }

        /* Estilo de la barra de búsqueda */
        .input-group {
            max-width: 400px; /* Ajusta el ancho de la barra de búsqueda */
            width: 100%;
        }

        .input-group-text {
            background-color: #6a11cb; /* Fondo del icono de búsqueda */
            color: white;
        }

        input.form-control {
            border-radius: 0.5rem; /* Bordes redondeados */
        }

        /* Icono de búsqueda */
        .bi-search {
            font-size: 1.2rem;
        }

        /* Icono de favoritos */
        .favorite-btn {
            cursor: pointer;
            font-size: 1.5rem;
            color: #f39c12; /* Color dorado para la estrella */
        }

        .favorite-btn.favorited {
            color: #f1c40f; /* Color dorado brillante para la estrella llena */
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="p-5 bg-light text-center">
    <h1 class="display-3">Bienvenidos a Gallery Up</h1>
    <p class="lead">Este es un portafolio privado</p>
    <hr class="my-4">
    <p>Más información</p>
</div>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide mb-4" style="max-width: 800px; margin: auto;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Foto 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Foto 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Foto 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Imagenes/paisajes naturales.jpg" class="d-block w-100" alt="Foto 1">
            <div class="carousel-caption d-none d-md-block bg-dark-custom p-3 rounded">
                <h5>Reencuentro</h5>
                <p>Salida con Mis ex compañeros de la Universidad, fuimos a una discoteca y la pasamos muy bien.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Imagenes/lago.jpg" class="d-block w-100" alt="Foto 2">
            <div class="carousel-caption d-none d-md-block bg-dark-custom p-3 rounded">
                <h5>Título de la Foto 2</h5>
                <p>Descripción breve de la Foto 2.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Imagenes/Aventura.jpg" class="d-block w-100" alt="Foto 3">
            <div class="carousel-caption d-none d-md-block bg-dark-custom p-3 rounded">
                <h5>Título de la Foto 3</h5>
                <p>Descripción breve de la Foto 3.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<!-- Barra de Búsqueda -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-search"></i> <!-- Icono de búsqueda usando Bootstrap Icons -->
                </span>
                <input id="searchInput" type="text" class="form-control" placeholder="Buscar fotos..." oninput="filterGallery()">
            </div>
        </div>
    </div>
</div>

<!-- Project Gallery -->
<div class="container my-4">
    <h2 class="section-title text-center">Tus Fotos</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($resultado as $proyecto) { ?>
            <div class="col">
                <div class="card h-100 shadow">
                    <!-- La imagen dentro de la tarjeta -->
                    <img src="<?php echo 'imagenes/' . $proyecto['imagen']; ?>" 
                         class="card-img-top" 
                         alt="<?php echo $proyecto['titulo'] ?? 'Imagen'; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $proyecto['titulo'] ?? 'Título no disponible'; ?></h5>
                        <p class="card-text"><?php echo $proyecto['descripcion'] ?? 'Descripción no disponible'; ?></p>
                        <button class="btn btn-custom w-100">Ver Detalles</button>
                    </div>
                    <!-- Botón de favoritos -->
                    <div class="card-footer text-end">
                        <span class="favorite-btn" onclick="toggleFavorite(this)">
                            <i class="bi bi-star"></i> <!-- Estrella vacía -->
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
    <div class="container d-flex justify-content-center align-items-center">
        <img src="Imagenes/Up.png" alt="Logo de Gallery Up" style="width: 100px; margin-right: 20px;"> <!-- Logo -->
        <div>
            <p class="mb-0">© 2023 Gallery Up. Todos los derechos reservados.</p>
            <p>Desarrollado por [Tu Nombre]</p>
        </div>
    </div>
</footer>

<!-- Burbuja de WhatsApp -->
<a href="https://wa.me/573182792733?text=Hola" class="whatsapp-bubble" target="_blank">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
</a>

<script>
    // Función para filtrar las fotos en la galería
    function filterGallery() {
        const searchQuery = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const description = card.querySelector('.card-text').textContent.toLowerCase();
            if (title.includes(searchQuery) || description.includes(searchQuery)) {
                card.style.display = '';  // Mostrar tarjeta
            } else {
                card.style.display = 'none';  // Ocultar tarjeta
            }
        });
    }

    // Función para alternar el estado de favorito
    function toggleFavorite(button) {
        button.classList.toggle('favorited'); // Cambiar el estilo al hacer clic
        const icon = button.querySelector('i');
        if (button.classList.contains('favorited')) {
            icon.classList.replace('bi-star', 'bi-star-fill'); // Estrella llena
        } else {
            icon.classList.replace('bi-star-fill', 'bi-star'); // Estrella vacía
        }
    }
</script>

</body>
</html>
