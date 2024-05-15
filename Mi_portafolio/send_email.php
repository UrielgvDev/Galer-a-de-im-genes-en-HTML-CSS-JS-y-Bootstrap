<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Configurar el correo electrónico
  $to = "tu_correo_electronico@example.com"; // Cambia esto por tu dirección de correo electrónico
  $subject = "Nuevo mensaje de contacto desde tu sitio web";
  $body = "Nombre: $name\nCorreo electrónico: $email\nMensaje: $message";

  // Enviar el correo electrónico
  if (mail($to, $subject, $body)) {
    // Si el correo se envía correctamente, enviar una respuesta JSON al cliente
    http_response_code(200);
    echo json_encode(array("message" => "Mensaje enviado con éxito."));
  } else {
    // Si hay un error al enviar el correo, enviar una respuesta de error al cliente
    http_response_code(500);
    echo json_encode(array("message" => "Hubo un error al enviar el mensaje."));
  }
} else {
  // Si no se envió el formulario correctamente, enviar una respuesta de error al cliente
  http_response_code(400);
  echo json_encode(array("message" => "Error: solicitud incorrecta."));
}
?>
