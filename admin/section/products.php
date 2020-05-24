<?php
require_once('class/user.php');
require_once('class/profile.php');
require_once('class/user_type.php');
?>

<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-left">Productos</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 
			$productosMenu = 'Productos';	  
			$productos = new Producto($con);

			if (isset($_POST['formulario_productos'])){ 
				if($_POST['id_producto'] > 0){
						$productos->edit($_POST);                
				}else{			
						$productos->save($_POST); 
				}
				
				header('Location: index.php?section=products');
			}	
			
			if(isset($_GET['del'])){
					$resp = $productos->del($_GET['del']) 	;
					if($resp == 1){
						header('Location: index.php?section=products');	
					}
					echo '<script>alert("'.$resp.'");</script>';
			}
        ?> 

		<div class="col-12">
			<h2 class="sub-header text-left"><a href="index.php?section=products_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Producto</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="h5 font-weight-bold text-center">
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
						  <td class="font-weight-bold"><?php echo $producto['id_producto'];?></td>
						  <td><?php echo $producto['nombre'];?></td> 
						  <td><?php echo $producto['precio'];?></td>
						  <td><?php echo $producto['descripcion'];?></td>
						  <td><?php echo $producto['disponibilidad'];?></td>
						  <td><?php echo $producto['ranking'];?></td>
						  <td>
						      <a href="index.php?section=products_abm&edit=<?php echo $producto['id_producto']?>"><button 
							     type="button" class="btn btn-info btn-md" title="Modificar">M</button></a>

							  <a href="index.php?section=products&del=<?php echo $producto['id_producto']?>"><button 
							     type="button" class="btn btn-danger btn-md" title="Borrar">B</button></a>
					      </td>
						</tr>
				    <?php }?>
				</tbody>
			</table>
		</div>	
	</div>
</div>