<?php 
require('barras_navegacion/header.php');
?> 

<div class="container-fluid">
      
	  <?php $productsMenu = 'Productos';
	  
	  $productos = new Producto($con);
	include('barras_navegacion/side_bar.php');


	if(isset($_POST['formulario_productos'])){ 
	    if($_POST['id'] > 0){
                $productos->edit($_POST);                
	    }else{			
                $productos->save($_POST); 
        }
		
		header('Location: productos.php');
	}	
	 
	if(isset($_GET['del'])){
			$resp = $productos->del($_GET['del']) 	;
            if($resp == 1){
				header('Location: productos.php');	
			}
			echo '<script>alert("'.$resp.'");</script>';

	}

        ?>
	          
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Productos
          </h1>
 
          <h2 class="sub-header">Listado <a href="productos_abm"><button type="button" class="btn btn-success btn-lg" title="Agregar">Agregar</button></a></h2>
		

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
				  <th>Precio</th>
				  <th>Descripcion</th>
				  <th>Disponibilidad</th>
				  <th>Ranking</th>
                  <th>Acciones</th>                  
                </tr>
              </thead>
			  <tbody>       
			    <?php  	 
					foreach($productos->getList() as $producto){?>
              
						<tr>
						  <td><?php echo $producto['id_producto'];?></td>
						  <td><?php echo $producto['nombre'];?></td> 
						  <td><?php echo $producto['precio'];?></td>
						  <td><?php echo $producto['descripcion'];?></td>
						  <td><?php echo $producto['disponibilidad'];?></td>
						  <td><?php echo $producto['ranking'];?></td>
						  <td>
						      <a href="productos_abm.php?edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
							  <a href="productos.php?del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('barras_navegacion/footer.php');?>