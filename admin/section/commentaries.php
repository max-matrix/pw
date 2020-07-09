<?php
function printTableHead()
{
    $tableHead =
                        '<thead>
  <tr class="font-weight-bold h5 text-center">
    <th>#</th>
    <th>Comentario</th>
    <th>ID_Producto</th>
    <th>ID_Usuario</th>
    <th>IP_Usuario</th>
    <th>Fecha</th>
    <th>Puntaje</th>
    <th>email</th>
    <th>Activo</th>
    <th>Acciones</th>
  </tr>
</thead>';

    return $tableHead;
};

function printTableBody($comentarios)
{
    $tableBody = '';
    foreach ($comentarios as $comentario) {
        $tableBody .= '<tbody>
                <tr>
          <td class="font-weight-bold align-middle">' . $comentario['id_comentario'] . '</td>
          <td class="align-middle">' . $comentario['comentario'] . '</td>
          <td class="align-middle">' . $comentario['id_prod_com'] . '</td>
          <td class="align-middle">' . $comentario['id_us_com'] . '</td>
          <td class="align-middle">' . $comentario['ip_us_com'] . '</td>
          <td class="align-middle">' . $comentario['fecha_us_com'] . '</td>
          <td class="align-middle">' . $comentario['puntaje_us_com'] . '</td>
          <td class="align-middle">' . $comentario['email'] . '</td>
          <td class="align-middle">' . ($comentario['activo'] ? 'si' : 'no') .'</td>
          <td class="align-middle">
            <div class="col-12">
              <div class="row justify-content-center">
                <form action="index.php?section=commentaries_abm&id=' . $comentario['id_comentario'] . '"method="POST" class="actinact mr-2">
                  <button type="submit" class="btn btn-sm">' . ($comentario['activo'] ? '<i class="far fa-thumbs-down btn btn-danger btn-sm"></i>':'<i class="far fa-thumbs-up btn btn-success btn-sm"></i>') . '</button>
                </form>
              </div>
            </div>
          </td>
        </tr>';
    }
    $tableBody .= '</tbody>';
                                
    return $tableBody;
}

?>

<div class="container-fluid px-5 text-center">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Comentarios</h1>
    </div>
  </div>

  <div class="filtros mb-3">
    <a href="index.php?section=commentaries&filtros=off" class="btn btn-success mr-5">Activo</a>
    <a href="index.php?section=commentaries&filtros=on" class="btn btn-danger">Inactivo</a>
  </div>

  <div class="row justify-content-center">

    <?php
            $comentariosMenu = 'Comentarios';
            $comentarios = new Comentario($con);

            //si el usuario tiene el permiso de categories.adm entra, si no, lo saco (no esta hecho)
            /* if (!in_array('commentaries.admin', $_SESSION['usuario']['permisos'])) {
              header('Location: ../index.php');
            } */

        if (isset($_GET['id'])) {
            ?>

    <div class="col-12">
      <table class="table table-striped">

        <?php
            echo printTableHead();

            echo printTableBody($comentarios->getComByProduct($_GET['id'])); ?>

      </table>
    </div>

    <?php
        } elseif (isset($_GET['filtros'])) {
            if ($_GET['filtros'] == 'on') {
                ?>

    <div class="col-12">
      <table class="table table-striped">

        <?php
            echo printTableHead();

                echo printTableBody($comentarios->getActivos()); ?>

      </table>
    </div>

    <?php
            } else {
                ?>
    <div class="col-12">
      <table class="table table-striped">

        <?php
            echo printTableHead();

                echo printTableBody($comentarios->getInactivos()); ?>

      </table>
    </div>


    <?php
            }
        } else {
            ?>
    <div class="col-12">
      <table class="table table-striped">


        <?php
            echo printTableHead();

            echo printTableBody($comentarios->getList()); ?>

      </table>
    </div>


    <?php
        }?>


  </div>
</div>