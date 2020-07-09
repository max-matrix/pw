<?php
$idP = $_GET['id'];
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-3">
      <h2 class="text-center">Filtros</h2>
      <hr class="mb-5">
      <h4>Destacados</h4>
      <div class="panel-group category-products">
        <div class="panel panel-default">
          <div class="panel-heading panel pl-0">
            <div class="panel-title text-left">
              <div class="panel-body text-left">
                <ul class="pl-3 cat">
                  <li>
                    <a href="index.php?section=products&rankeo=desc">Mayor a Menor</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>
      <h4>Ordenamiento</h4>
      <div class="panel-group category-products">
        <div class="panel panel-default">
          <div class="panel-heading panel pl-0">
            <div class="panel-title text-left">
              <div class="panel-body text-left">
                <ul class="pl-3 cat">
                  <li>
                    <a href="index.php?section=products&order=desc">A > Z</a>
                  </li>
                  <li>
                    <a href="index.php?section=products&order=asc">Z > A</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


      <hr>
      <h4>Cartegorías</h4>
      <?php require_once("section/categories.php"); ?>
      <hr>
      <h4>Marcas</h4>
      <?php require_once("section/brands.php"); ?>
    </div>

    <div class="col-9">
      <div class="row">

        <?php
      $product = new Product($con);
      $puntaje = $product->getPromedioByID($idP);
      $prod = $product->getProductByID($idP);
      array_push($prod, $puntaje);
      echo printProductByID($prod);
      ?>

      </div>


      <div class="row">
        <h3 class="p-3">Comentarios</h3>

        <?php
        $comentaries = new Comment($con);
        foreach ($comentaries->getCommentariesByProductID($idP) as $comentario) {
            if ($comentario['activo'] != 0) {  ?>
        <div class="col-12 px-0 comentario">
          <div class="card">
            <i class="fas fa-comments">
            </i>
            <p class="com"><?php echo $comentario['comentario']; ?>
            </p>
            <p class="date"><?php echo $comentario['fecha_us_com']; ?>
            </p>
          </div>
        </div>
        <?php
        }
        }

      ?>

      </div>


    </div>
  </div>
</div>