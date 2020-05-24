<!DOCTYPE html>
<html lang="es">

<?php
require_once("../function/arrays.php");
require_once("../function/config.php");
require_once("../function/function.php");
require_once("../function/helpers.php");
require_once("../class/Product.php");
require_once("../class/Category.php");
require_once("../class/Brand.php");
require_once("../class/Comment.php");
require_once('class/user.php');
require_once('class/profile.php');
require_once('class/product.php');
require_once('class/brands.php');

require_once('../mysql-login.php');

try {
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
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
    header('Location: ../index.php?section=login');
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Podrás ingresar colocando un nombre de usuario y contraseña válidos. 
  <br> Si no estás registrado ponte en contacto con el administrador del sitio.";
}

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styles.css">
	<title>Home</title>
</head>

<body>
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php?section=home">TECHNOLOGY</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php?section=products">Productos</a></li>
						<li class="nav-item"><a class="nav-link" href="index.php?section=brands">Marcas</a></li>
						<!--<li class="<?php echo isset($promoMenu)?'active':''?>"><a
							class="nav-link" href="promociones.php">Promociones</a></li>-->
						<!--<li class="<?php echo isset($newsMenu)?'active':''?>"><a
							class="nav-link" href="noticias.php">Noticias</a></li>-->
						<?php if (in_array(array('pedido.add','pedido.del','pedido.edit','pedido.see'), $_SESSION['usuario']['permisos'])) {?>
						<!--<li class="<?php echo isset($pedidosMenu)?'active':''?>
						nav-item"><a class="nav-link" href="pedidos.php">Pedidos</a></li>-->
						<?php }?>
						<?php if (in_array('user.add', $_SESSION['usuario']['permisos']) ||
                                in_array('user.del', $_SESSION['usuario']['permisos'])||
                                in_array('user.edit', $_SESSION['usuario']['permisos'])||
                                in_array('user.see', $_SESSION['usuario']['permisos'])) {?>
						<li
							class="<?php echo isset($userMenu)?'active':''?>">
							<a class="nav-link" href="index.php?section=users">Usuarios</a></li>
						<?php }?>
						<li
							class="<?php echo isset($perfilMenu)?'active':''?> nav-item">
							<a class="nav-link" href="index.php?section=profiles">Perfiles</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Export</a></li>
						<li class="nav-item"><a class="nav-link" href="../function/logout.php">Logout</a></li>
					</ul>

				</div>
			</nav>
		</div>
	</header>

	<main>
		<div class="wrapper container">

			<?php
            notificacion();
            if (file_exists("section/$section.php")) :
                require_once("section/$section.php");
            else :
                require_once("../section/404.php");
            endif;
            ?>

		</div>
	</main>

	<footer class="container-fluid fixed-bottom">
		<p>Copyright © 2020 TECHNOLOGY Inc. All rights reserved.</p>

	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script src="js/main.js"></script>
</body>

</html>