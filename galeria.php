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



</br>
 <div class="container">
    <div class="row">
        <div class="col-md-6">

  <div class="card">
    <div class="card-header">Datos del proyecto

    </div>
         <div class="card-body">
       
                <form action="galeria.php" method="post" enctype="multipart/form-data">

                 Nombre del proyecto <input  required class = "form-control" type="text" name="nombre" id="">
                 <br>
                 Imagen del proyecto <input  required class = "form-control" type="file" name="archivo" id="">
                 <br>
                 Descripción:
                  <textarea  required class="form-control" name="descripcion" id="" rows="3"></textarea>
                 <br>
                 <input  class ="btn btn-success" type="submit" value="Enviar">

             </form>
         </div>
  </div>
  
    
</div>

    <div class="col-md-6" >

            <table class="table ">
             <thead>
                    <tr>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Imagen</th>
                         <th>Descripcion</th>
                         <th>Acciones</th>
                    </tr>
              </thead>
                <tbody>
                  <?php  foreach($resultado as $proyecto) {?>
                  <tr>
                      <td><?php echo $proyecto['id'];?></td>
                      <td><?php echo $proyecto['nombre'];?></td>
                      <td>
                        <img width="100"src="imagenes/<?php echo $proyecto['imagen'];?>" alt="" srcset="">
                       
                      
                      </td>
                      <td><?php echo $proyecto['descripcion'];?></td>
                      <td><a name=""id=""class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>" role="button">Eliminar</a></td>
                     </tr>
                  <?php }?>   
                </tbody>
            </table>

        </div>
        
    </div>
 </div>
 


 



 
 <?php include("pie.php");?>