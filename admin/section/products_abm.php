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
            
            <form action="index.php?section=products" method="post" class="col-md-6 from-horizontal" enctype="multipart/form-data" > 

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

                <div class="form-group">
                    <div class="col-sm-10">
                        Destacado: <select class="controls" id="prod_destacado" name="prod_destacado">
                        <option value= 1> Destacado</option>
                        <option value= 0> No destacado</option>
                        </select>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre imagen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre_imagen" name="nombre_imagen" 
                        placeholder="" 
                        disabled
                        value="<?php echo (isset($productos->nombre_imagen)?$productos->nombre_imagen:'');?>">
                    </div>
                </div> 
            
                <div class="form-group h6">
                    <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                         <input type="file" class="form-control-file" name="ARCHIVO_SUBIDO" id="imagen" aria-describedby="fileHelpId">
                         <small id="fileHelpId" class="form-text text-muted"></small>
                </div>
            
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">                        
                        <label>Activo</label>
                        <input type="hidden" name="activo" value="0">
                        <input type="checkbox" name="activo" value="1"  <?php echo (isset($productos->activo)?(($productos->activo == 1) ?'checked="checked"':''):'');?>>
                    </div>
                </div>

                <div class="form-group h6">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-warning" name="formulario_productos" >Guardar Producto</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_producto" name="id_producto" placeholder="" 
                value="<?php echo (isset($productos->id_producto)?$productos->id_producto:'0');?>">

                <div class="form-group">
                <img class="img-fluid" src="../img/<?php
                if (isset($productos->nombre_imagen)) {
                    echo $productos->nombre_imagen;
                } else {
                    echo 'sin_imagen.jpg';
                }?>">
                </div>



            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div>