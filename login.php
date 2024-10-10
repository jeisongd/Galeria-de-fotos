<?php
session_start();
if($_POST){
    if(($_POST['usuario']=="Jeisson") && ($_POST['contrasenia']=="12345")){
      $_SESSION['usuario']="Jeisson";
      
      header("location:index.php");

    }else{
        echo "<script> alert('Usuario o contraseña incorrectos') </script>";
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
                 <div class="card-header">Iniciar sesion</div>
                      <div class="card-body">
                          <form action="login.php" method="post">

                              Usuario: <input class="form-control" type="text" name="usuario" id="">
                             </br>
                              Cotraseña: <input class="form-control" type="password" name="contrasenia" id="">
                              </br>
                              <button class="btn btn-success" type="submit">Entrar al portafolio</button>

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
