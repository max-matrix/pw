<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Categorías</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 	
			$categoriasMenu = 'Categorias';
			$categorias = new Categoria($con);

			if (isset($_POST['formulario_categorias'])) {
				if ($_POST['id_categoria'] > 0) {
					$categorias->edit($_POST);
				} else {
					$categorias->save($_POST);
				}
				header('Location: index.php?section=categories');
			}
			
			if (isset($_GET['del'])) {
				$resp = $categorias->del($_GET['del']) 	;
				if ($resp == 1) {
					header('Location: index.php?section=categories');
				}
				echo '<script>alert("'.$resp.'");</script>';
			}
		?>	 

		<div class="col-12">
			<h2 class="sub-header text-left"> 
				<a href="index.php?section=categories_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Categoría</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Nombre</th>
						<th>Id_padre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody> 
					<?php
						foreach ($categorias->getList() as $categoria) {?>
						<tr>
							<td><?php echo $categoria['id_categoria'];?></td>
							<td><?php echo $categoria['nombre'];?></td>
							<td><?php echo $categoria['id_padre'];?></td>
							<td>
								<a	href="index.php?section=categories_abm&edit=<?php echo $categoria['id_categoria']?>"><button
									type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>
								
								<a	href="index.php?section=categories&del=<?php echo $categoria['id_categoria']?>"><button
									type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
							</td>
						</tr>
					<?php }?>     
				</tbody>
			</table>
		</div>	
	</div>
</div>
