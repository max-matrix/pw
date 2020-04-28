<div class="row">
  <div class="col-3">
    <h2 class="text-center">Filtros</h2>
      <hr class="mb-5">
      <h4>Destacados</h4>
      <li>
        <a href="index.php?section=products&rankeo=desc">Mayor a Menor</a>
      </li>

      <hr>
      <h4>Ordenamiento</h4>
      <li>
        <a href="index.php?section=products&order=desc">A > Z</a>
      </li>
      <li>
        <a href="index.php?section=products&order=asc">Z > A</a>
      </li>
      <hr>
      <h4>Cartegorías</h4>
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
      
      if (empty($_GET['marca']) && empty($_GET['cat']) ) {
        function printProduct($con)
        {
          $sqlProduct = 'SELECT * FROM producto';
          $resultadoProduct = $con->query($sqlProduct);
          if (!empty($resultadoProduct)) {
            $salidaProduct = '';
            foreach ($resultadoProduct as $row) {

              $salidaProduct .= '
                <div class="col-4 mb-4">
                      <div class="card">
                          <img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
                          <div class="card-body text-center">                                     
                              <h5 class="card-title">' . $row['nombre'] . '</h5>
                              <p class="card-text h-fix">' . $row['descripcion'] . '</p>
                          </div>
                          <div class="card-body text-center text-center">
                              <a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalle</a>
                          </div>
                      </div>
                  </div>
                      ';
            }
            $salidaProduct .= '';
          }
          return $salidaProduct;
        }
        echo printProduct($con);

      } elseif (!empty($_GET['cat']) && empty($_GET['marca'])) {
        function printProduct($con)
        {
          $sqlProductCat = 'SELECT * FROM producto WHERE id_categoria = ' . $_GET['cat'];
          $resultadoProduct = $con->query($sqlProductCat);
          if (!empty($resultadoProduct)) {
            $salidaProduct = '';
            foreach ($resultadoProduct as $row) {

              $salidaProduct .= '

                <div class="col-4 mb-4">
                    <div class="card">
                        <img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">                                     
                            <h5 class="card-title">' . $row['nombre'] . '</h5>
                            <p class="card-text h-fix">' . $row['descripcion'] . '</p>
                        </div>
                        <div class="card-body text-center text-center">
                            <a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalle</a>
                        </div>
                    </div>
                </div>
                    ';
            }
            $salidaProduct .= '';
          }
          return $salidaProduct;
        }
        echo printProduct($con);
      } elseif (!empty($_GET['marca']) && empty($_GET['cat'])) {
        function printProduct($con)
        {
          $sqlProductMarca = 'SELECT * FROM producto WHERE id_marca = ' . $_GET['marca'];
          $resultadoProduct = $con->query($sqlProductMarca);
          if (!empty($resultadoProduct)) {
            $salidaProduct = '';
            foreach ($resultadoProduct as $row) {

              $salidaProduct .= '
                  <div class="col-4 mb-4">
                      <div class="card">
                          <img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
                          <div class="card-body text-center">                                     
                              <h5 class="card-title">' . $row['nombre'] . '</h5>
                              <p class="card-text h-fix">' . $row['descripcion'] . '</p>
                          </div>
                          <div class="card-body text-center text-center">
                              <a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalle</a>
                          </div>
                      </div>
                  </div>';
            }
            $salidaProduct .= '';
          }
          return $salidaProduct;
        }
        echo printProduct($con);

      } else { 
        function printProduct($con)
        {
          $sqlProductTodas = 'SELECT * FROM producto WHERE id_marca = ' . $_GET['marca'] . ' AND id_categoria = ' . $_GET['cat'];
          $resultadoProduct = $con->query($sqlProductTodas);
          if (!empty($resultadoProduct)) {
            $salidaProduct = '';
            foreach ($resultadoProduct as $row) {

              $salidaProduct .= '
                  <div class="col-4 mb-4">
                      <div class="card">
                          <img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
                          <div class="card-body text-center">                                     
                              <h5 class="card-title">' . $row['nombre'] . '</h5>
                              <p class="card-text h-fix">' . $row['descripcion'] . '</p>
                          </div>
                          <div class="card-body text-center text-center">
                              <a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalle</a>
                          </div>
                      </div>
                  </div>';
            }
            $salidaProduct .= '';
          }
          return $salidaProduct;
        }
        echo printProduct($con);



      }

      ?>
    </div>
  </div>
</div>