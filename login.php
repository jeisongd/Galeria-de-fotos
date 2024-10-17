<?php
session_start();
if($_POST){
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=album", "root", "");
    
    // Recoger datos del formulario
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    
    // Preparar consulta para verificar si el usuario existe
    $sql = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
    $sql->bindParam(':usuario', $usuario);
    $sql->execute();
    
    // Obtener los datos del usuario
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);
    
    if($resultado){
        // Verificar la contraseña
        if(password_verify($contrasenia, $resultado['contrasenia'])){
            // Iniciar sesión si la contraseña es correcta
            $_SESSION['usuario'] = $resultado['usuario'];
            header("location:index.php");
        } else {
            echo "<script> alert('Contraseña incorrecta') </script>";
        }
    } else {
        echo "<script> alert('Usuario no encontrado') </script>";
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"crossorigin="anonymous"/>
    </head>

    <body>
      
      <div class="container">

              <div class="row">

                <div class="col-md-4">
                    
                </div>

                <div class="col-md-4">
                 <br/>
                 <div class="card">
                 <div class="card-header">Iniciar sesión</div>
                      <div class="card-body">
                          <form action="login.php" method="post" autocomplete="off">

                              Usuario: <input class="form-control" type="text" name="usuario" id="" required>
                              </br>
                              Contraseña: <input class="form-control" type="password" name="contrasenia" id="" required>
                              </br>
                              <a  href = "recuperar_contrasenia.php"> ¿Olvidó su contraseña?</a>
                              </br>
                              </br>
                              <button class="btn btn-success" type="submit">Entrar a la galería</button>
                              </br> 
                              <br>
                              <a  href = "registro.php"> ¿No tienes cuenta?</a>
                              <br>
                          </form>
                      </div>
                 <div class="card-footer text-muted"></div>
                </div>
               
                </div>

                <div class="col-md-4">
                    
                </div>
                 
              </div>

        </div>

    </body>
</html>
