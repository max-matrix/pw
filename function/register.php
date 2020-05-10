<?php

require_once("../funciones/config.php");
require_once("../funciones/funciones.php");

// Contenido obligatorio:
if(empty($_POST["email"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos Email y Contraseña son obligatorios.";

    header("Location:../index.php?section=register");
    die();
endif;

// Levanto datos de POST:
$email = $_POST["email"];
$password = $_POST["password"];
$nuevoUsuario = explode("@",$email)[0];

// Verifico que el usuario no exista:
$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $nuevoUsuario;


// Creo el nuevo usuario:




// Mensaje de confirmación:
$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Ya podés ingresar con los datos con los que te registraste";

// Envío al login:
header("Location: ../index.php?section=login");