<div class="container-fluid">

  <?php $categoriasMenu = 'Categoria';
      
    $categoria = new Categoria($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $categorias = $categoria->get($_GET['edit']);
        $titulo = 'Modificar Categoria';
    }
    else
    {
      $titulo = 'Nueva Categoria';
    }
    ?>


  <div class="col-sm-9 col-md-10 main">

    <h1 class="page-header">
        <? echo $titulo ?>
    </h1>

    <div class="col-md-2"></div>

    <form action="index.php?section=categories" method="post" class="col-md-6 from-horizontal">
    
      <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
            value="<?php echo(isset($categorias->nombre)?$categorias->nombre:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Id padre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="id_padre" name="id_padre" placeholder=""
            value="<?php echo(isset($categorias->id_padre)?$categorias->id_padre:'');?>">
        </div>
      </div>

      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">                        
               <label>Activo</label>
              <input type="hidden" name="activo" value="0">
              <input type="checkbox" name="activo" value="1"  <?php echo (isset($categorias->activo)?(($categorias->activo == 1) ?'checked="checked"':''):'');?>>
          </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-warning" name="formulario_categorias">Guardar Categoria</button>
        </div>
      </div>
      <input type="hidden" class="form-control" id="id" name="id_categoria" placeholder=""
        value="<?php echo(isset($categorias->id_categoria)?$categorias->id_categoria:'');?>">

    </form>
  </div>

</div>
</div>
</div>
