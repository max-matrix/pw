<div class="container-fluid">

  <?php $comentariosMenu = 'Comentarios';
    
    $comentario = new Comentario($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $comentarios = $comentario->get($_GET['edit']);
        $titulo = 'Modificar Comentario';
    }

    if (isset($_GET['id'])) {
        $id_comentario = $_GET['id'];
        $comentario->modify($id_comentario);
        header('Location:'. getenv('HTTP_REFERER'));
    }

    ?>

  <div class="col-sm-9 col-md-10 main">

    <h1 class="page-header">
      <?php echo $titulo ?>
    </h1>

    <div class="col-md-2"></div>

    <form action="index.php?section=commentaries" method="post" class="col-md-6 from-horizontal"
      enctype="multipart/form-data">

      <div class="form-group">
        <label for="comentario" class="col-sm-2 control-label">Comentario</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="comentario" name="comentario" placeholder="" disabled
            value="<?php echo(isset($comentarios->comentario)?$comentarios->comentario:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="id_prod_com" class="col-sm-2 control-label">Id_producto</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="id_prod_com" name="id_prod_com" placeholder="" disabled
            value="<?php echo(isset($comentarios->id_prod_com)?$comentarios->id_prod_com:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="ip_us_com" class="col-sm-2 control-label">IP_usuario</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="ip_us_com" name="ip_us_com" placeholder="" disabled
            value="<?php echo(isset($comentarios->ip_us_com)?$comentarios->ip_us_com:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="fecha_us_com" class="col-sm-2 control-label">Fecha</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="fecha_us_com" name="fecha_us_com" placeholder="" disabled
            value="<?php echo(isset($comentarios->fecha_us_com)?$comentarios->fecha_us_com:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="puntaje_us_com" class="col-sm-2 control-label">Puntaje</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="puntaje_us_com" name="puntaje_us_com" placeholder="" disabled
            value="<?php echo(isset($comentarios->puntaje_us_com)?$comentarios->puntaje_us_com:'');?>">
        </div>
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" placeholder="" disabled
            value="<?php echo(isset($comentarios->email)?$comentarios->email:'');?>">
        </div>
      </div>

      <div class=" form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <label>Activo</label>
          <input type="hidden" name="activo" value="0">
          <input type="checkbox" name="activo" value="1" <?php echo(isset($comentarios->activo)?(($comentarios->activo == 1) ?'checked="checked"':''):'');?>>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-warning" name="formulario_comentarios">Guardar
            Comentario</button>
        </div>
      </div>


      <input type="hidden" class="form-control" id="id_comentario" name="id_comentario" placeholder=""
        value="<?php echo(isset($comentarios->id_comentario)?$comentarios->id_comentario:'0');?>">

    </form>
  </div>


</div>
</div>
</div>