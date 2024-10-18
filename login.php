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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="Login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h1>Inicar Sesión </h1>
      <div class="input-box">
        <input type="text" placeholder="Usuario" name="usuario" required>
       <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Contraseña" name="contrasenia" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Recuerdame</label>
        <a href="recuperar_contrasenia.php">¿Olvidaste tu contraseña?</a>
      </div>
      <button type="submit" class="btn">Iniciar sesión</button>
      <div class="register-link">
        <p>¿No tienes cuenta? <a href="registro.php">Registrate</a></p>
      </div>
    </form>
  </div>
</body>
</html>