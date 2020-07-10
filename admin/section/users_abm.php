<?php $userMenu = 'Usuarios';
        
if (!in_array('user.add', $_SESSION['usuario']['permisos']) &&
    !in_array('user.del', $_SESSION['usuario']['permisos']) &&
    !in_array('user.edit', $_SESSION['usuario']['permisos']) &&
    !in_array('user.see', $_SESSION['usuario']['permisos'])) {
    header('Location: ../../index.php');
}

$perfil = new Perfil($con);

if (isset($_GET['edit'])) {
    $usuario = $user->get($_GET['edit']);
    $titulo = 'Modificar Usuario';
} else {
    $titulo = 'Nuevo Usuario';
}
//echo var_dump($usuario);
?>

<div class="container">
  <div class="row">
    <div class="col-12">

      <h1 class="page-header">
        <?php echo $titulo ?>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-8">

      <form action="index.php?section=users" method="post">
        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
              value="<?php echo isset($usuario->nombre)?$usuario->nombre:'';?>">
          </div>

          <div class="form-group col-6">
            <label for="apellido" class="control-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder=""
              value="<?php echo isset($usuario->apellido)?$usuario->apellido:'';?>">
          </div>


        </div>

        <div class="form-row">
          <div class="form-group col-6">
            <label for="usuario" class="control-label">Usuario</label>
            <input type="text" class="form-control" id="usuarioBis" name="usuario" placeholder=""
              value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>">
          </div>

          <div class="form-group col-6">
            <label for="clave" class="control-label">Clave</label>
            <input type="password" class="form-control" id="claveBis" name="clave" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="control-label">eMail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder=""
            value="<?php echo isset($usuario->email)?$usuario->email:'';?>">
        </div>

    </div>
    <div class="col-4">
      <div class="form-group col-12">
        <label for="tipo" class="control-label">Perfil</label>
        <div class="col-12 px-0">
          <select name="perfil[]" id="perfil" multiple='multiple' required>
            <?php  foreach ($perfil->getList() as $t) {?>
            <option style="width: 240px;"
              value="<?php echo $t['id']?>" <i>
              </i>
              <?php
                    if (isset($usuario->perfiles)) {
                        if (in_array($t['id'], $usuario->perfiles)) {
                            echo ' selected="selected" ';
                        }
                    }
                ?>><?php echo $t['nombre']?>
            </option>
            <?php }?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <label>Activo</label>
          <input type="hidden" name="activo" value="0">
          <input  type="checkbox" name="activo" value="1" <?php echo(isset($usuario->activo)?(($usuario->activo == 1) ?'checked="checked"':''):'');?>>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-warning float-right" name="formulario_usuarios">Guardar
            Usuario</button>
        </div>
      </div>
      <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" placeholder=""
        value="<?php echo isset($usuario->id_usuario)?$usuario->id_usuario:'0';?>">
    </div>
    </form>

  </div>