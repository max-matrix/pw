<?php

$id_usuario = $_SESSION['usuario']['id_usuario'];
$ip_usuario = $_SERVER['REMOTE_ADDR'];
$fecha = date("Y-m-d H:i:s");
?>

<?php

// antes de insertar el comentario
// verificar si ya hay un comentario desde esa ip las últimas 24 horas
//SELECT count(1) as cantidad FROM comentario WHERE ip_us_com = "::1" 
//and fecha_us_com > DATE_ADD(now(), INTERVAL -1  MINUTE)

//SELECT count(1) as cantidad FROM comentario WHERE ip_us_com = "::1" 
//and fecha_us_com > DATE_ADD(now(), INTERVAL -24  HOUR)
$query = 'SELECT count(1) as cantidad FROM comentario WHERE ip_us_com = "'.$ip_usuario.'" AND ';
$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
return $consulta->cantidad ;
// si cantidad > 0
// no pueden dejar grabar el comentario no hacer el insert y mostrar error

// Creo el nuevo comentario:

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