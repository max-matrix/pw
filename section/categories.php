<h2 class="text-center">Filtros</h2>
    <hr class="mb-5">
    <div class="panel-group category-products" id="accordian">
      <div class="panel panel-default">
        <div class="panel-heading panel pl-0">
          <h4 class="panel-title text-left">

            <?php
            function printCategoria($con, $id_padre = 0)
            {
              $sql = 'SELECT * FROM categoria WHERE id_padre = ' . $id_padre;
              $resultado = $con->query($sql);
              if (!empty($resultado)) {
                $salida = '<div class="panel-body text-left"><ul class="pl-3">';
                foreach ($resultado as $row) {
                  $salida .= '
                                            <li>
                                                <a href="index.php?section=products&cat=' . $row['id_categoria'] . '">' . $row['nombre'] . '</a>' .
                    printCategoria($con, $row['id_categoria']) . '
                                            </li>
                                        ';
                }
                $salida .= '</ul></div>';
              }
              return $salida;
            }
            echo printCategoria($con);
            ?>

        </div>
      </div>
    </div>