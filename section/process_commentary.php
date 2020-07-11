<?php
if (isset($_SESSION['usuario']['id_usuario'])) {
    $id_usuario = $_SESSION['usuario']['id_usuario'];
} else {
    $id_usuario = 0;
}

$ip_usuario = $_SERVER['REMOTE_ADDR'];
$fecha = date("Y-m-d H:i:s");
$fechaunix = strtotime($fecha);
$valid = true;

$q = "SELECT * FROM comentario WHERE id_prod_com = '$_POST[productoID]'";

//var_dump($con->query($q)->fetch(PDO::FETCH_ASSOC));

foreach ($con->query($q) as $comment) {
    $ip = $comment['ip_us_com'];
    $f = strtotime($comment['fecha_us_com']);
    $dif = $fechaunix - $f;

    if ($dif < 24*60*60 && $ip == $ip_usuario) {
        $valid = false;
        break;
    }
}

if ($valid) {
  
  // Creo el nuevo comentario:
    $sql = "INSERT INTO comentario(comentario,id_prod_com,id_us_com,ip_us_com,fecha_us_com,puntaje_us_com,email,activo) 
VALUES ('$_POST[comments]','$_POST[productoID]','$id_usuario','$ip_usuario','$fecha','$_POST[puntaje]','$_POST[email]',0);";

    $count = $con->exec($sql);

    // Mensaje de confirmación:
    $_SESSION["estado"] = "ok";
    $_SESSION["mensaje"] = "En breve podrás ver tu comentario";

    // Envío al login:

    header("Location: index.php?section=detail&id=$_POST[productoID]");
} else {
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Espera 24 hs para poder volver a comentar";

    // Envío al login:

    header("Location: index.php?section=detail&id=$_POST[productoID]");
}
