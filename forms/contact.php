<?php
 
 if (true) {
  $email = trim($_POST['email']);
  $nombre = trim($_POST['name']);
  $subject = trim($_POST['subject']);
  $phone = trim($_POST['telefono']);
  $mensaje = trim($_POST['message']);
  
  $consulta = "E-mail: " . $email . "Nombre: " . $nombre . "Telefono: " . $phone . "Asunto: " . $subject . "Mensaje: " . $mensaje;
  
  mail("contacto@rburgues.com", "Contacto desde la web", $consulta);
  } else {
  echo "Error al enviar";
  }
  header('Location: https://www.rburgues.com/#enviado');
  end();
  ?>