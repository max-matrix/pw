<div class="panel-group category-products" id="accordian">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href="#">Marcas</a>
          </h4>
        </div>
        <div id="sportswear">
          <div class="panel-body">
            <ul>
              <?php

              function printMarca($con)
              {
                $sql2 = 'SELECT * FROM marca WHERE id_marca';
                $resultadoMarca = $con->query($sql2);

                foreach ($resultadoMarca as $row) {
                  echo '<li><a href="index.php?section=products&marca=' . $row['id_marca'] . '">' . $row['nom_marca'] . '</a></li>';
                }
              }
              echo printMarca($con);
              ?>

            </ul>
          </div>


        </div>
      </div>
    </div>