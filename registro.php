<?php
session_start();
if ($_POST) {

    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=album", "root", "");

    // Recoger datos del formulario
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $correo = $_POST['correo'];  // Recoger el correo electrónico

    // Validación de la contraseña en el servidor (mínimo 8 caracteres, sin espacios)
    if (strlen($contrasenia) < 8 || preg_match('/\s/', $contrasenia)) {
        echo "<script> alert('La contraseña debe tener al menos 8 caracteres y no contener espacios.'); </script>";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        // Validación del correo electrónico
        echo "<script> alert('El formato del correo electrónico no es válido.'); </script>";
    } else {
        // Validar si el usuario ya existe
        $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario OR correo=:correo");
        $consulta->bindParam(":usuario", $usuario);
        $consulta->bindParam(":correo", $correo);
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            echo "<script> alert('El usuario o correo ya existen'); </script>";
        } else {
            // Encriptar la contraseña
            $hash_contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);

            // Insertar el nuevo usuario en la base de datos
            $sql = $conexion->prepare("INSERT INTO usuarios (usuario, contrasenia, correo) VALUES (:usuario, :contrasenia, :correo)");
            $sql->bindParam(":usuario", $usuario);
            $sql->bindParam(":contrasenia", $hash_contrasenia);
            $sql->bindParam(":correo", $correo);
            $sql->execute();

            echo "<script> alert('Registro exitoso'); window.location.href = 'login.php'; </script>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Registro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"crossorigin="anonymous"/>
    </head>

    <body>
      
      <div class="container">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                 <br/>
                 <div class="card">
                 <div class="card-header">Registro de usuario</div>
                      <div class="card-body">
                          <form action="registro.php" method="post">
                              Usuario: <input class="form-control" type="text" name="usuario" id="" required>
                              <br/>
                              Correo: <input class="form-control" type="email" name="correo" id="" required 
                              title="Debe ingresar un correo válido.">
                              <br/>
                              Contraseña: <input class="form-control" type="password" name="contrasenia" id="" required
                              pattern="^\S{8,}$" title="La contraseña debe tener al menos 8 caracteres y no contener espacios.">
                              <br/>
                              <button class="btn btn-primary" type="submit">Registrar</button>
                          </form>
                      </div>
                 <div class="card-footer text-muted"></div>
                </div>
                </div>
                <div class="col-md-4"></div>
              </div>
        </div>
    </body>
</html>
