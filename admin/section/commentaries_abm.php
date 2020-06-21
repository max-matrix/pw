<div class="container-fluid">

    <?php $comentariosMenu = 'Comentarios';
    
    $comentario = new Comentario($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $comentarios = $comentario->get($_GET['edit']);
        $titulo = 'Modificar Comentario';
    }
    else
    {
      $titulo = 'Nuevo Comentario';
    }
    ?>

    
    <div class="col-sm-9 col-md-10 main">

    <h1 class="page-header">
        <? echo $titulo ?>
    </h1>

        <div class="col-md-2"></div>

        <form action="index.php?section=commentaries" method="post" class="col-md-6 from-horizontal">

            <div class="form-group">
                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
                        value="<?php echo(isset($comentarios->descripcion)?$comentarios->descripcion:'');?>">
                </div>
            </div>           

            <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">                        
               <label>Activo</label>
              <input type="hidden" name="activo" value="0">
              <input type="checkbox" name="activo" value="1"  <?php echo (isset($comentarios->activo)?(($comentarios->activo == 1) ?'checked="checked"':''):'');?>>
          </div>
      </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-warning" name="formulario_comentarios">Guardar Comentario</button>
                </div>
            </div>
            <input type="hidden" class="form-control" id="id" name="id" placeholder=""
                value="<?php echo(isset($comentarios->id)?$comentarios->id:'');?>">

        </form>
    </div>


</div>
</div>
</div>