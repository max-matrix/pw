<!DOCTYPE html>
<html lang="es">

<?php
require_once("function/arrays.php");
require_once("function/config.php");
require_once("function/function.php");
require_once("class/Product.php");
require_once("class/Category.php");
require_once("class/Brand.php");
require_once("class/Comment.php");


require_once 'mysql-login.php';
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password, $charset);

$section = $_GET["section"] ?? "home";
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styles.css">
	<title>Home</title>
</head>

<body>
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php?section=home">TECHNOLOGY</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?php
						foreach ($navitem as $navname => $link) :
						?>
							<li class="nav-item <?= $section == strtolower($navname) ? "active" : "" ?> ">
								<a class="nav-link" href="<?php echo $link; ?>"><?php echo $navname; ?></a>
							</li>
						<?php
						endforeach;
						?>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="¿Qué desea buscar?" aria-label="Search">
						<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Buscar</button>
					</form>
				</div>
			</nav>
		</div>
	</header>

	<main>
		<div class="wrapper container">

			<?php
			if (file_exists("section/$section.php")) :
				require_once("section/$section.php");
			else :
				require_once("section/404.php");
			endif;
			?>

		</div>
	</main>

	<footer class="container-fluid fixed-bottom">
		<p>Copyright © 2020 TECHNOLOGY Inc. All rights reserved.</p>

	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>

</html>