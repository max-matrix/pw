<?php
   session_start(); // Inicia la sesión
   
   if( isset( $_SESSION['counter'] ) )  { // $_SESSION para acceder a esos datos
      $_SESSION['counter'] += 1;
   } else {
      $_SESSION['counter'] = 1;
   }
   
   $msg = "Visito esta página ".  $_SESSION['counter'];
   $msg .= "veces en la session.";
?>
<html>   
   <head>
      <title>Setting up a PHP session</title>
   </head>   
   <body>
      <?php  echo ( $msg ); ?>
   </body>   
</html>
