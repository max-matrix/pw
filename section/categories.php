    <div class="panel-group category-products" id="accordian">
      <div class="panel panel-default">
        <div class="panel-heading panel pl-0">
          <h4 class="panel-title text-left">

            <?php
            $m = isset($_GET['marca']) ? $_GET['marca'] : '';

            function printCategoria($con, $m, $id_padre = 0) {

              $sql = 'SELECT * FROM categoria WHERE id_padre = ' . $id_padre;
              $resultado = $con->query($sql);
              
              if (!empty($resultado)) {
                $salida = '<div class="panel-body text-left"><ul class="pl-3 cat">';
    
                foreach ($resultado as $row) {
                  $salida .= '
                    <li>
                      <a href="index.php?section=products&cat=' . $row['id_categoria'] . '&marca='.$m.'">' . $row['nombre'] . '</a>' .
                      printCategoria($con, $m, $row['id_categoria']) . '
                    </li>';
                }
                $salida .= '</ul></div>';
              }
              return $salida;
            }
            echo printCategoria($con, $m);
            ?>

        </div>
      </div>
    </div>