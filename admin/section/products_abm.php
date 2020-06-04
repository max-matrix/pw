<div class="container-fluid">
      
      <?php $productosMenu = 'Productos';
	
	$producto = new Producto($con); 
	
	$query = 'SELECT * FROM permisos';
	$permisos = $con->query($query);
	
	if(isset($_GET['edit'])){
            $productos = $producto->get($_GET['edit']);
            $titulo = 'Modificar Producto'; 
    } 
    else
    {
            $titulo = 'Nuevo Producto';
    }
	?>
	  	  
        
        <div class="col-sm-9 col-md-10 main">
          
	  <h1 class="page-header">
          <? echo $titulo ?>
      </h1>
  
          <div class="col-md-2"></div>

            <form action="index.php?section=products" method="post" class="col-md-6 from-horizontal">

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" 
                        value="<?php echo (isset($productos->nombre)?$productos->nombre:'');?>">
                    </div>
                </div> 
                         
                <div class="form-group">
                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="" 
                        value="<?php echo (isset($productos->precio)?$productos->precio:'');?>">
                    </div>
                </div> 

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Descripciòn</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" 
                        value="<?php echo (isset($productos->descripcion)?$productos->descripcion:'');?>">
                    </div>
                </div> 

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Disponibilidad</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="" 
                        value="<?php echo (isset($productos->disponibilidad)?$productos->disponibilidad:'');?>">
                    </div>
                </div>               
                 
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Ranking</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ranking" name="ranking" placeholder="" 
                        value="<?php echo (isset($productos->ranking)?$productos->ranking:'');?>">
                    </div>
                </div> 
            <!--
                <div class="form-group h6">
                    <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                         <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                         <small id="fileHelpId" class="form-text text-muted">El formato debe ser <b>.jpg</b></small>
                </div>
            -->
                <div class="form-group h6">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-warning" name="formulario_productos" >Guardar Producto</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id_producto" placeholder="" 
                value="<?php echo (isset($productos->id_producto)?$productos->id_producto:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div>