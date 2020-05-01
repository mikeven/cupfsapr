<?php

  /* -- Funciones sobre envío de email -- */
  /* ---------------------------------------------------------------------------- */
  function sendMail( $data ){
    // Envía el mensaje por email con los datos recibido desde el formulario

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: CUPFSA PR<info@cupfsa.com>' . "\r\n";

    $receptor = "mikeven@gmail.com";
    $asunto   = "Mensaje desde CUPFSA PR";

    $mensaje  = "Se ha recibido un mensaje desde el formulario de comentarios de CUPFSA PR: <br>";
    $mensaje  .= "Nombre: $data[nombre]<br>";
    $mensaje  .= "Email: $data[email]<br>";
    $mensaje  .= "Comentario: $data[comentario]<br>";

    return mail( $receptor, $asunto, $mensaje, $headers );
  }
  /* ---------------------------------------------------------------------------- */
  if( isset( $_POST["form_ctc"] ) ){
    // Recibe los datos enviados desde formulario de comentarios

    parse_str( $_POST["form_ctc"], $data );
    echo sendMail( $data );
  }
  /* ---------------------------------------------------------------------------- */
?>
