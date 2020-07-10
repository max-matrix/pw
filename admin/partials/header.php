<header>
  <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.php">TECHNOLOGY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>

          <?php if (in_array('products.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
          <li class="nav-item"><a class="nav-link" href="index.php?section=products">Productos</a></li>
          <?php }?>

          <?php if (in_array('brands.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
          <li class="nav-item"><a class="nav-link" href="index.php?section=brands">Marcas</a></li>
          <?php }?>

          <?php if (in_array('categories.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
          <li class="nav-item"><a class="nav-link" href="index.php?section=categories">Categorías</a></li>
          <?php }?>

          <?php if (in_array('users.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
            <a class="nav-link" href="index.php?section=users">Usuarios</a></li>
          <?php }?>

          <?php if (in_array('commentaries.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
          <li class="nav-item"><a class="nav-link" href="index.php?section=commentaries">Comentarios</a></li>
          <?php }?>

          <?php if (in_array('profiles.admin', $_SESSION['usuario']['permisos'])) {?>
          <li
            class="<?php echo isset($userMenu)?'active':''?>">
          <li class="nav-item"><a class="nav-link" href="index.php?section=profiles">Perfiles</a></li>
          <?php }?>
        </ul>

        <a class="btn btn-danger px-4" href="../function/logout.php">Salir</a>
      </div>
    </nav>
  </div>
</header>