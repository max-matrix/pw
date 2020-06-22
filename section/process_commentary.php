<?php

$id_usuario = $_SESSION['usuario']['id_usuario'];
$ip_usuario = $_SERVER['REMOTE_ADDR'];
$fecha = date("Y-m-d H:i:s");
?>

<?php
  // Creo el nuevo usuario:
$sql = "INSERT INTO comentario(comentario,id_prod_com,id_us_com,ip_us_com,fecha_us_com,puntaje_us_com,email,activo) 
               VALUES ('$_POST[comments]','$_POST[productoID]','$id_usuario','$ip_usuario','$fecha','$_POST[puntaje]','$_POST[email]',0);";
       
       $count = $con->exec($sql);


// Mensaje de confirmación:
$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "En breve podrás ver tu comentario";

// Envío al login:

header("Location: index.php?section=detail&id=$_POST[productoID]");

?>

</div>
</div>
</div>