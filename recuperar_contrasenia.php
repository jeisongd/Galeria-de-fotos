<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  
if ($_POST) {
    // Recoger el correo del formulario
    $correo = $_POST['correo'];

    // Inicializar PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurar el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'jeison2740@gmail.com';  // Tu dirección de Gmail
        $mail->Password = 'tu_contraseña';  // Tu contraseña de Gmail
        $mail->SMTPSecure = 'tls';  // Encriptación TLS
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('tu_email@gmail.com', 'Nombre');  // Remitente
        $mail->addAddress($correo);  // Destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Recuperar contraseña';
        $mail->Body    = 'Haz clic en el siguiente enlace para restablecer tu contraseña: ' . $link;

        // Enviar correo
        $mail->send();
        echo "<script>alert('Se ha enviado un enlace para restablecer tu contraseña a tu correo.');</script>";
    } catch (Exception $e) {
        echo "<script>alert('El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}');</script>";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Recuperar Contraseña</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Recuperar.css">
</head>
<body>
<div class="wrapper">
    <form action="registro.php" method="post">
    
      <h1>Recuperar Contraseña</h1>
      
      <div class="input-box">
        <input type="text" placeholder="Correo" name="correo" required>
        <i class='bx bxl-gmail'></i>  
      </div>
   
      <button type="submit" class="btn">Recuperar</button>
    </form>
  </div>
</body>
</html>


