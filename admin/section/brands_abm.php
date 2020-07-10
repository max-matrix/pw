<?php $marcasMenu = 'Marcas';
    
    $marca = new Marca($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $marcas = $marca->get($_GET['edit']);
        $titulo = 'Modificar Marca';
    } else {
        $titulo = 'Nueva Marca';
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
      <form action="index.php?section=brands" method="post">

        <div class="form-group col-12 px-0">
          <label for="nombre" class="control-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nom_marca" placeholder=""
            value="<?php echo(isset($marcas->nom_marca)?$marcas->nom_marca:'');?>">
        </div>
        <div class="form-row">
          <div class="form-group col-6">
            <label>Activo</label>
            <input type="hidden" name="activo" value="0">
            <input type="checkbox" name="activo" value="1" <?php echo(isset($marcas->activo)?(($marcas->activo == 1) ?'checked="checked"':''):'');?>>
          </div>

          <div class="form-group col-6">
            <button type="submit" class="btn btn-warning float-right" name="formulario_marcas">Guardar Marca</button>
          </div>
          <input type="hidden" class="form-control" id="id" name="id_marca" placeholder=""
            value="<?php echo(isset($marcas->id_marca)?$marcas->id_marca:'0');?>">
        </div>
      </form>
    </div>
  </div>