<?php
if($_GET['token']){
    $token = $_GET['token'];

    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=album", "root", "");

    // Verificar si el token es válido
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE token = :token");
    $consulta->bindParam(":token", $token);
    $consulta->execute();

    if($consulta->rowCount() > 0){
        // El token es válido, permitir restablecer la contraseña
        if($_POST){
            $nueva_contrasenia = $_POST['nueva_contrasenia'];
            $hash_contrasenia = password_hash($nueva_contrasenia, PASSWORD_BCRYPT);

            // Actualizar la contraseña y eliminar el token
            $sql = $conexion->prepare("UPDATE usuarios SET contrasenia = :contrasenia, token = NULL WHERE token = :token");
            $sql->bindParam(":contrasenia", $hash_contrasenia);
            $sql->bindParam(":token", $token);
            $sql->execute();

            echo "<script>alert('Contraseña actualizada con éxito'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Enlace inválido o expirado'); window.location.href = 'recuperar_contraseña.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <form action="restablecer_contraseña.php?token=<?php echo $token; ?>" method="post">
        <label for="nueva_contrasenia">Introduce la nueva contraseña:</label>
        <input type="password" name="nueva_contrasenia" required>
        <button type="submit">Restablecer contraseña</button>
    </form>
</body>
</html>
