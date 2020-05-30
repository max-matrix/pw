<?php

require_once("../../function/config.php");
require_once("../../function/function.php");
require_once("../../function/arrays.php");


// Campos obligatorios:
if(empty($_POST["nombre"]) || $_FILES["imagen"]["size"] == "0"):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Todos los campos son obligatorios.";
    header("Location:../index.php?section=pictures_abm");
    die();
endif;

$nombre = $_POST["nombre"];
$imagen = $_FILES["imagen"];

if($imagen["type"] != "image/jpeg"):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "La imagen debe estar en formato JPG.";
    header("Location:../index.php?section=pictures_abm");
    die();
endif;

$nombreImagen = saveName($nombre);

if(file_exists("../../img/$nombreImagen.jpg")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "La imágen con el nombre seleccionado ya existe.";
    header("Location:../index.php?section=pictures_abm");
    die();
endif;

move_uploaded_file($imagen["tmp_name"],"../../img/$nombreImagen.jpg");

$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Ha subido la imágen <b>" . printPicture($nombre). "</b> de forma exitosa.";

header("Location:../index.php?section=pictures");