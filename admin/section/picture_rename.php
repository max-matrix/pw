<?php
require_once("../../function/config.php");
require_once("../../function/function.php");

$id = $_POST["id"];

if(!empty($_POST["edit"])):
    $rename = $_POST["edit"];

    // COMPLETAR.

    header("Location: ../index.php?section=picture_rename");
endif;

if(!empty($_POST["delete"])):
    $delete = $_POST["delete"];

    if(empty($_POST["id"])):
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "La imágen <b>$_POST[id]</b> no existe.";
        header("Location: ../index.php?section=pictures");
        die();
    endif;
    
    $imagen = $_POST["id"];
    
    if(!file_exists("../../img/$imagen.jpg")):
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "La imágen <b>$_POST[id]</b> no existe.";
        header("Location: ../index.php?section=pictures");
        die();
    endif;
    
    // Para borrar los archivos:
    unlink("../../img/$imagen.jpg");
    
    $_SESSION["estado"] = "ok";
    $_SESSION["mensaje"] = "La imágen <b>" . printPicture($imagen) . "</b> ha sido eliminada.";
    header("Location: ../index.php?section=pictures");

endif;