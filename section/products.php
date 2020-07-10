<div class="container mt-5 mb-5">
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
                    <a href="index.php?section=products&dest=1">Nuestra selección</a>
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
                    <?php
                      $orden = isset($_GET['orden']) ? $_GET['orden'] : '';
                      $_SESSION['orden'] = $orden;
                      $marca = isset($_GET['marca']) ? $_GET['marca'] : '';
                      $categoria = isset($_GET['cat']) ? $_GET['cat'] : '';
                    ?>
                    <a
                      href="index.php?section=products&cat=<?=$categoria?>&marca=<?=$marca?>&orden=asc">A
                      - Z</a>
                  </li>
                  <li>
                    <a
                      href="index.php?section=products&cat=<?=$categoria?>&marca=<?=$marca?>&orden=desc">Z
                      - A</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>
      <h4>Categorías</h4>
      <?php require_once("section/categories.php"); ?>
      <hr>
      <h4>Marcas</h4>
      <?php require_once("section/brands.php"); ?>
    </div>

    <div class="col-9">
      <h2 class="text-center">Productos</h2>
      <hr class="mb-5">
      <div class="row">

        <?php
        $product = new Product($con);
      if (empty($_GET['marca']) && empty($_GET['cat']) && empty($_GET['dest'])) {
          echo printProduct($product->getProduct());
      } elseif (!empty($_GET['dest'])) {
          echo printProduct($product->getProductImportant());
      } elseif (!empty($_GET['cat']) && empty($_GET['marca'])) {
          echo printProduct($product->getProductByCategory($_GET['cat']));
      } elseif (!empty($_GET['marca']) && empty($_GET['cat'])) {
          echo printProduct($product->getProductByBrand($_GET['marca']));
      } else {
          echo printProduct($product->getProductByCategoryAndBrand($_GET['cat'], $_GET['marca']));
      }

      ?>
      </div>
    </div>
  </div>
</div>