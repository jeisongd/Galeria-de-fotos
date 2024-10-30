<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php

if($_POST){
  
   $nombre=$_POST['nombre'];
   $descripcion=$_POST['descripcion'];

   $fecha=new DateTime();
   $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];

   $imagen_temporal=$_FILES['archivo']['tmp_name'];

   move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

   $objconexion= new conexion();

   $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
   $objconexion->ejecutar($sql);
   header("location:galeria.php");

}

if($_GET){

  //DELETE FROM `proyectos` WHERE `proyectos`.`id` 
  $id=$_GET['borrar'];
  $objconexion = new conexion ();
  
  $imagen=$objconexion->consultar("SELECT imagen FROM `proyectos` where id=".$id);
  unlink("imagenes/".$imagen[0]['imagen']);
  $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` = ".$id;
  $objconexion->ejecutar($sql);
  
}

$objconexion= new conexion();
$resultado=$objconexion->consultar("SELECT * FROM `proyectos`");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-gradient text-white text-center">
                    <h5 class="mb-0">Datos del Proyecto</h5>
                </div>
                <div class="card-body">
                    <form action="galeria.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del proyecto">
                        </div>
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name="archivo" id="archivo">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Ingrese una descripción"></textarea>
                        </div>
                        <button class="btn btn-gradient w-100" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-gradient text-white text-center">
                    <h5 class="mb-0">Proyectos Registrados</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultado as $proyecto) { ?>
                                <tr>
                                    <td><?php echo $proyecto['id']; ?></td>
                                    <td><?php echo $proyecto['nombre']; ?></td>
                                    <td>
                                        <img width="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="<?php echo $proyecto['nombre']; ?>" class="img-fluid rounded shadow-sm">
                                    </td>
                                    <td><?php echo $proyecto['descripcion']; ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" role="button">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #eef2f3; /* Color de fondo moderno */
        font-family: 'Poppins', sans-serif; /* Fuente moderna */
    }
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 1rem;
        border: none;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .bg-gradient {
        background: linear-gradient(135deg, #ff758c, #ff7eb3); /* Gradiente vibrante */
    }

    .btn-gradient {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        border: none;
        color: white;
        transition: background-color 0.4s, transform 0.4s;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #2575fc, #6a11cb);
        transform: scale(1.05);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.3);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.9);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.2);
    }

    .img-fluid {
        border-radius: 0.5rem; /* Esquinas redondeadas para las imágenes */
    }
</style>
