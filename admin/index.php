<?php require_once('partials/head.php');?>

<?php require_once('partials/header.php'); ?>

<main>
  <div class="wrapper container-fluid">

    <?php
    notificacion();
    if (file_exists("section/$section.php")) :
        require_once("section/$section.php");
    else :
        require_once("section/404.php");
    endif;
    ?>

  </div>
</main>

<?php require_once('partials/footer.php');
