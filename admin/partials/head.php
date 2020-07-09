<?php
  require_once("init.php");

try {
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password, $charset);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    print "�Error!: " . $e->getMessage();
    die();
}

$section = $_GET["section"] ?? "home";

$user = new Usuario($con);

if (isset($_POST['login'])) {
    $user->login($_POST);
}

if (isset($_GET['logout'])) {
    unset($_SESSION['usuario']);
}

if ($user->notLogged()) {
    redirect('../index.php?section=login');
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Podrás ingresar colocando un nombre de usuario y contraseña válidos.
<br> Si no estás registrado ponte en contacto con el administrador del sitio.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="vegas.min.css">
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Home</title>
</head>

<body>