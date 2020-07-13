<?php
$marcasMenu = 'Marcas';
$marcas = new Marca($con);

$query = 'SELECT * FROM permisos';
$permisos = $con->query($query);

if (isset($_GET['edit'])) {
    $marcasEdit = $marcas->get($_GET['edit']);
    $titulo = 'Modificar Marca';
} else {
    $titulo = 'Nueva Marca';
}

if (isset($_POST['formulario_marcas'])) {
    $resp= $marcas->get_por_nom_marca($_POST["nom_marca"]);
    
    if ($_POST['id_marca'] > 0) {
        if (empty($_POST["nom_marca"])) {
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "El campo nombre es obligatorio.";
            header("Location:index.php?section=brands&edit=$_POST[id_marca]");
        } else {
            $marcas->edit($_POST);
            $_SESSION["estado"] = "ok";
            $_SESSION["mensaje"] = "Ha modificado la marca de forma exitosa.";
            header('Location: index.php?section=brands');
        }
    } else {
        if (empty($_POST["nom_marca"])) {
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "El campo nombre es obligatorio.";
            header("Location:index.php?section=brands");
        } else {
            if ($resp < 1) {
                $marcas->save($_POST);
                $_SESSION["estado"] = "ok";
                $_SESSION["mensaje"] = "Ha subido la marca de forma exitosa.";
                header('Location: index.php?section=brands');
            } else {
                $_SESSION["estado"] = "error";
                $_SESSION["mensaje"] = "Ya existe una marca con ese nombre.";
                header('Location: index.php?section=brands');
            }
        }
    }
}

if (isset($_GET['del'])) {
    $resp = $marcas->del($_GET['del']) 	;
    if ($resp == 1) {
        $_SESSION["estado"] = "ok";
        $_SESSION["mensaje"] = "Ha eliminado la marca con exito";
        header('Location: index.php?section=brands');
    }
    echo '<script>alert("'.$resp.'");</script>';
}
?>




<div class="container-fluid px-5 text-center">

  <div class="row justify-content-center mb-5">
    <div class="col-12">
      <h1 class="text-center">Marcas</h1>
    </div>
  </div>

  <div class="row justify-content-center mb-5">
    <div class="col-6">
      <form action="index.php?section=brands" method="post">
        <div class="form-row">
          <div class="form-group col-9 px-0">
            <input type="text" class="form-control" id="nombre" name="nom_marca" placeholder=""
              value="<?php echo(isset($marcasEdit->nom_marca)?$marcasEdit->nom_marca:'');?>">
          </div>

          <div class="form-group col-3">
            <button type="submit" class="btn btn-warning" name="formulario_marcas"><?php echo(isset($_GET['edit']) ?  "Editar Marca" : "Crear Marca"); ?></button>
          </div>
          <input type="hidden" class="form-control" id="id" name="id_marca" placeholder=""
            value="<?php echo(isset($marcasEdit->id_marca)?$marcasEdit->id_marca:'0');?>">
        </div>
      </form>
    </div>
  </div>



  <div class="row justify-content-center">



    <div class="col-12">

      <table class="table table-striped">
        <thead>
          <tr class="font-weight-bold h5 text-center">
            <th>#</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
                    foreach ($marcas->getList() as $marca) {?>
          <tr>
            <td class="font-weight-bold align-middle"><?php echo $marca['id_marca'];?>
            </td>
            <td class="align-middle"><?php echo $marca['nom_marca'];?>
            </td>
            <td class="align-middle"><?php echo ($marca['activo'])?'si':'no';?>
            </td>
            <td class="align-middle">
              <div class="col-12">
                <div class="row justify-content-center">

                  <form
                    action="index.php?section=brands_abm&id=<?php echo $marca['id_marca'];?>"
                    method="POST" class="actinact mr-2">
                    <button type="submit" <?php echo($marca['activo'] ? 'class="btn btn-sm btn-danger"><i
                    class="fas fa-window-close"></i>': 'class="btn btn-sm btn-success"><i
                    class="fas fa-check-square"></i>'); ?></button>
                  </form>

                  <form
                    action="index.php?section=brands&edit=<?php echo $marca['id_marca']?>"
                    method="POST" class="modify mr-2">
                    <button type="submit" class="btn btn-info btn-sm" title="Modificar"><i
                        class="fas fa-edit"></i></button>
                  </form>
                  <form
                    action="index.php?section=brands&del=<?php echo $marca['id_marca']?>"
                    method="POST" class="delete">
                    <button type="submit" class="btn btn-danger btn-sm" title="Borrar"><i
                        class="far fa-trash-alt"></i></button>
                  </form>


                </div>
              </div>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>