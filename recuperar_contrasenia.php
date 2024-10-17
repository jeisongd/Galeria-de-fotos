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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <br/>
                <div class="card">
                    <div class="card-header">Recuperar contraseña</div>
                    <div class="card-body">
                        <form action="registro.php" method="post">
                            Correo: <input class="form-control" type="email" name="correo" required>
                            <br/>
                            <button class="btn btn-primary" type="submit">Enviar enlace</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

