<?php
  $perfilesMenu = 'Perfiles';
  $perfiles = new Perfil($con);

  //si el usuario tiene el permiso de profiles.adm entra, si no, lo saco
        /* if (!in_array('profiles.admin', $_SESSION['usuario']['permisos'])) {
          header('Location: ../index.php');
        } */

  if (isset($_POST['formulario_perfiles'])) {
      $resp= $perfiles->get_por_nombrePerfil($_POST["nombre"], $_POST["id"]);

      if ($_POST['id'] > 0) {
          if (empty($_POST["nombre"])) {
              $_SESSION["estado"] = "error";
              $_SESSION["mensaje"] = "El campo nombre es obligatorio.";
              header("Location:index.php?section=profiles_abm&edit=$_POST[id]");
          } else {
              if ($resp < 1) {
                  $perfiles->edit($_POST);
                  $_SESSION["estado"] = "ok";
                  $_SESSION["mensaje"] = "Ha modificado el perfil de forma exitosa.";
                  header('Location: index.php?section=profiles');
              } else {
                  $_SESSION["estado"] = "error";
                  $_SESSION["mensaje"] = "Ya existe un perfil con ese nombre.";
                  header("Location:index.php?section=profiles_abm&edit=$_POST[id]");
              }
          }
      } else {
          if (empty($_POST["nombre"])) {
              $_SESSION["estado"] = "error";
              $_SESSION["mensaje"] = "El campo nombre es obligatorio.";
              header("Location:index.php?section=profiles_abm");
          } else {
              if ($resp < 1) {
                  $perfiles->save($_POST);
                  $_SESSION["estado"] = "ok";
                  $_SESSION["mensaje"] = "Ha subido el perfil de forma exitosa.";
                  header('Location: index.php?section=profiles');
              } else {
                  $_SESSION["estado"] = "error";
                  $_SESSION["mensaje"] = "Ya existe un perfil con ese nombre.";
                  header('Location: index.php?section=profiles_abm');
              }
          }
      }
  }
  
  if (isset($_GET['del'])) {
      $resp = $perfiles->del($_GET['del']);
      if ($resp == 1) {
          $_SESSION["estado"] = "ok";
          $_SESSION["mensaje"] = "Ha eliminado el perfil con exito";
          header('Location: index.php?section=profiles');
      }
      echo '<script>alert("'.$resp.'");</script>';
  }
?>

<div class="container-fluid px-5 text-center">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Perfiles</h1>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="sub-header text-left">
        <a href="index.php?section=profiles_abm"><button type="button" class="btn btn-success btn-md"
            title="Agregar">Agregar Perfil</button></a></h2>
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
            foreach ($perfiles->getList() as $perfil) {?>
          <tr>
            <td class="font-weight-bold align-middle"><?php echo $perfil['id'];?>
            </td>
            <td class="align-middle"><?php echo $perfil['nombre'];?>
            </td>
            <td class="align-middle"><?php echo ($perfil['activo'])?'si':'no';?>
            </td>
            <td class="align-middle">
              <div class="col-12">
                <div class="row justify-content-center">
                  <form
                    action="index.php?section=profiles_abm&edit=<?php echo $perfil['id']?>"
                    method="POST" class="modify mr-2">
                    <button type="submit" class="btn btn-info btn-sm" title="Modificar"><i
                        class="fas fa-edit"></i></button>
                  </form>
                  <form
                    action="index.php?section=profiles&del=<?php echo $perfil['id']?>"
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