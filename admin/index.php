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
    require_once('class/class_user.php');
    require_once('class/class_profile.php');
    require_once('class/class_product.php');
    require_once('class/class_brands.php');
    require_once('class/class_categories.php');
    require_once('class/class_commentaries.php');
    require_once('../mysql-login.php');

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
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Home</title>
</head>

<body>
  <header>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">TECHNOLOGY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>

            <?php if (in_array('products.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
               <li class="nav-item"><a class="nav-link" href="index.php?section=products">Productos</a></li>
            <?php }?>

            <?php if (in_array('brands.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
               <li class="nav-item"><a class="nav-link" href="index.php?section=brands">Marcas</a></li>
            <?php }?>

            <?php if (in_array('categories.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
            <li class="nav-item"><a class="nav-link" href="index.php?section=categories">Categorías</a></li>
            <?php }?>

            <?php if (in_array('users.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
               <a class="nav-link" href="index.php?section=users">Usuarios</a></li>
            <?php }?>

            <?php if (in_array('commentaries.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
            <li class="nav-item"><a class="nav-link" href="index.php?section=commentaries">Comentarios</a></li>
            <?php }?>

            <?php if (in_array('profiles.admin', $_SESSION['usuario']['permisos']) ) {?>
               <li class="<?php echo isset($userMenu)?'active':''?>">
            <li class="nav-item"><a class="nav-link" href="index.php?section=profiles">Perfiles</a></li>
            <?php }?>

            <li class="nav-item"><a class="nav-link" href="../function/logout.php">Logout</a></li>
          </ul>

        </div>
      </nav>
    </div>
  </header>

  <main>
    <div class="wrapper container-fluid">

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

  <!-- JS -->
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
  <script>
    let formBorrar = document.querySelectorAll(".delete");

    for (let i = 0; i < formBorrar.length; i++) {

      formBorrar[i].addEventListener("submit", function(evento) {
        let botonTocado = this;

        evento.preventDefault();

        Swal.fire({
          title: '¿Desea eliminar?',
          text: "Esta acción es irreversible.",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then((result) => {

          if (result.value) {

            botonTocado.submit();

          }
        })
      })
    }
  </script>
  <script>
    let formModificar = document.querySelectorAll(".modify");

    for (let i = 0; i < formModificar.length; i++) {

      formModificar[i].addEventListener("submit", function(evento) {
        let botonTocado = this;

        evento.preventDefault();

        Swal.fire({
          title: '¿Desea modificar?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then((result) => {

          if (result.value) {

            botonTocado.submit();

          }
        })
      })
    }
  </script>

  <script>
    let formActivarDesactivar = document.querySelectorAll(".actinact");

    for (let i = 0; i < formActivarDesactivar.length; i++) {

      formActivarDesactivar[i].addEventListener("submit", function(evento) {
        let botonTocado = this;

        evento.preventDefault();

        Swal.fire({
          title: '¿Desea activar/desactivar?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
        }).then((result) => {

          if (result.value) {

            botonTocado.submit();

          }
        })
      })
    }
  </script>

</body>

</html>