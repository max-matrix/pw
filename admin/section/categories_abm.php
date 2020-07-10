<?php $categoriasMenu = 'Categoria';
  
$categoria = new Categoria($con);

$query = 'SELECT * FROM permisos';
$permisos = $con->query($query);

if (isset($_GET['edit'])) {
    $categorias = $categoria->get($_GET['edit']);
    $titulo = 'Modificar Categoria';
} else {
    $titulo = 'Nueva Categoria';
}
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
    <div class="col-12">
      <form action="index.php?section=categories" method="post">
        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
              value="<?php echo(isset($categorias->nombre)?$categorias->nombre:'');?>">
          </div>

          <div class="form-group col-6">
            <label for="nombre" class="control-label">ID Padre</label>
            <input type="text" class="form-control" id="id_padre" name="id_padre" placeholder=""
              value="<?php echo(isset($categorias->id_padre)?$categorias->id_padre:'');?>">

          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-6">
            <label>Activo</label>
            <input type="hidden" name="activo" value="0">
            <input type="checkbox" name="activo" value="1" <?php echo(isset($categorias->activo)?(($categorias->activo == 1) ?'checked="checked"':''):'');?>>
          </div>

          <div class="form-group col-6 ">
            <button type="submit" class="btn btn-warning float-right" name="formulario_categorias">Guardar
              Categoria</button>
          </div>
          <input type="hidden" class="form-control" id="id" name="id_categoria" placeholder=""
            value="<?php echo(isset($categorias->id_categoria)?$categorias->id_categoria:'');?>">
        </div>
      </form>
    </div>
  </div>