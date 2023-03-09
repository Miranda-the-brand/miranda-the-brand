<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar los datos del formulario
    $nombre = $_POST["nombre"];
    $celular = $_POST["celular"];
    $correo = $_POST["correo"];
    $motivo = $_POST["motivo"];
    $mensaje = $_POST["mensaje"];

    // Destinatario y asunto del correo electrónico
    $destinatario = "miranda.thebrand@gmail.com";
    $asunto = "Formulario de contacto";

    // Cuerpo del correo electrónico
    $cuerpo = "Nombre: " . $nombre . "\n";
    $cuerpo .= "Celular: " . $celular . "\n";
    $cuerpo .= "Email: " . $correo . "\n";
    $cuerpo .= "Motivo: " . $motivo . "\n";
    $cuerpo .= "Mensaje: " . $mensaje;

    // Encabezados
    $encabezados = "From: " . $correo . "\r\n";
    $encabezados .= "Reply-To: " . $correo . "\r\n";
    $encabezados .= "X-Mailer: PHP/" . phpversion();

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $cuerpo, $encabezados)) {
        // Si el correo electrónico se envió correctamente, redirigir a la página "gracias.html"
        header("Location: gracias.html#sobre-nosotros");
        exit;
    } else {
        // Si el correo electrónico no se pudo enviar, mostrar un mensaje de error
        echo "Lo sentimos, no se pudo enviar el correo electrónico. Por favor, intenta de nuevo más tarde.";
    }
}
?>


