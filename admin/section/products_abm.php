<?php $productosMenu = 'Productos';
    
    $producto = new Producto($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $productos = $producto->get($_GET['edit']);
        $titulo = 'Modificar Producto';
    } else {
        $titulo = 'Nuevo Producto';
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
    <div class="col-8">


      <form action="index.php?section=products" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
              value="<?php echo(isset($productos->nombre)?$productos->nombre:'');?>">
          </div>

          <div class="form-group col-6">
            <label for="precio" class="control-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" placeholder=""
              value="<?php echo(isset($productos->precio)?$productos->precio:'');?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre" class="control-label">Descripciòn</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder=""
              value="<?php echo(isset($productos->descripcion)?$productos->descripcion:'');?>">
          </div>

          <div class="form-group col-6">
            <label for="nombre" class="control-label">Disponibilidad</label>
            <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" placeholder=""
              value="<?php echo(isset($productos->disponibilidad)?$productos->disponibilidad:'');?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre" class="control-label">Ranking</label>
            <input type="text" class="form-control" id="ranking" name="ranking" placeholder=""
              value="<?php echo(isset($productos->ranking)?$productos->ranking:'');?>">
          </div>

          <!-- <div class="form-group">
                    <div class="col-sm-10">
                        Destacado: <select class="controls" id="prod_destacado" name="prod_destacado">
                        <option value= 1> Destacado</option>
                        <option value= 0> No destacado</option>
                        </select>
                    </div>
                </div>  -->

          <div class="form-group col-6">
            <label for="nombre" class="control-label">Nombre imagen</label>
            <input type="text" class="form-control" id="nombre_imagen" name="nombre_imagen" placeholder="" disabled
              value="<?php echo(isset($productos->nombre_imagen)?$productos->nombre_imagen:'');?>">
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col-6">
            <label for="nombre_categoria" class="control-label">Categoria</label>
            <input type="text" class="form-control" id="nombre_categoria" name="id_categoria" placeholder=""
              value="<?php echo(isset($productos->id_categoria)?$productos->id_categoria:'');?>">
          </div>

          <div class="form-group col-6">
            <label for="nombre_marca" class="control-label">Marca</label>
            <input type="text" class="form-control" id="nombre_marca" name="id_marca" placeholder=""
              value="<?php echo(isset($productos->id_marca)?$productos->id_marca:'');?>">
          </div>
        </div>

    </div>


    <div class="col-4">
      <div class="form-group h6 col-12">
        <label for="imagen" class="control-label">Imagen</label>
        <input type="file" class="form-control-file" name="ARCHIVO_SUBIDO" id="imagen" aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted"></small>
      </div>


      <input type="hidden" class="form-control" id="id_producto" name="id_producto" placeholder=""
        value="<?php echo(isset($productos->id_producto)?$productos->id_producto:'0');?>">

      <div class="form-group col-12">
        <img class="img-fluid" src="../img/<?php
                if (isset($productos->nombre_imagen)) {
                    echo $productos->nombre_imagen;
                } else {
                    echo 'sin_imagen.jpg';
                }?>">
      </div>

      <div class="form-row">
        <div class="form-group col-6">
          <div class="col-12">
            <label>Destacado</label>
            <input type="hidden" name="prod_destacado" value="0">
            <input type="checkbox" name="prod_destacado" value="1" <?php echo(isset($productos->prod_destacado)?(($productos->prod_destacado == 1) ?'checked="checked"':''):'');?>>
          </div>
        </div>

        <div class="form-group col-6">
          <div class="col-12">
            <label>Activo</label>
            <input type="hidden" name="activo" value="0">
            <input type="checkbox" name="activo" value="1" <?php echo(isset($productos->activo)?(($productos->activo == 1) ?'checked="checked"':''):'');?>>
          </div>
        </div>
      </div>

      <div class="form-group h6 col-12">
        <div class="col-12">
          <button type="submit" class="btn btn-warning float-right" name="formulario_productos">Guardar
            Producto</button>
        </div>
      </div>
    </div>
  </div>

  </form>
</div>