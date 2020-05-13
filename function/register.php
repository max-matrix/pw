<?php

require_once '../mysql-login.php';
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password, $charset);

require_once("../function/config.php");
require_once("../function/function.php");

// Contenido obligatorio:
if(empty($_POST["email"]) || empty($_POST["clave"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos Email y Contraseña son obligatorios.";

    header("Location:../index.php?section=register");
    die();
endif;

// Levanto datos de POST:
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$clave = encrypt($_POST["clave"],$_POST["salt"]);
$salt = $_POST["salt"];

//$nuevoUsuario = explode("@",$email)[0];

// Verifico que el usuario no exista:

// Creo el nuevo usuario:
$sql = "INSERT INTO usuarios(nombre,apellido,usuario,clave,email,tipo,activo,salt) 
               VALUES ('$nombre','$apellido','$usuario','$clave','$email','4','1','$salt');";
               /* echo $sql; */
       $count = $con->exec($sql);
	  
// Mensaje de confirmación:
$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Ya podés ingresar con los datos con los que te registraste";

// Envío al login:
header("Location: ../index.php?section=login");