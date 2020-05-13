<?php

require_once("../function/config.php");
require_once("../function/function.php");
require_once '../mysql-login.php';

        try {        
		    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            /* print "Conexión exitosa!"; */
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage();
            die();
        }

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$area = $_POST['area'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO dato(nombre,apellido,email,telefono,area,comentario) 
               VALUES ('$nombre','$apellido','$email','$telefono','$area','$comentario');";
               /* echo $sql; */
       $count = $con->exec($sql);
	  /*  if($count > 0 )
			print($count." Filas afectadas");
	   else
            print('ERROR'); */

// Mensaje de confirmación:
$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Muchas gracias por contactarte con nosotros, sus datos han sido enviado correctamente y en breve recibirás novedades de tu interés.";

// Envío al login:
header("Location: ../index.php?section=home");


