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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="Registro.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h1>Registro </h1>
      <div class="input-box">
        <input type="text" placeholder="Usuario" name="usuario" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Correo" name="correo" required>
        <i class='bx bxl-gmail'></i>  
      </div>
      <div class="input-box">
        <input type="password" placeholder="Contraseña" name="contrasenia" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="submit" class="btn">Registrame</button>
    </form>
  </div>
</body>
</html>