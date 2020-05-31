<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Marcas</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 	
			$marcasMenu = 'Marcas';
			$marcas = new Marca($con);


			if (isset($_POST['formulario_marcas'])) {
				if ($_POST['id_marca'] > 0) {

					$marcas->edit($_POST);
				} else {
					
					$marcas->save($_POST);
				}				
				header('Location: index.php?section=brands');
			}
			
			if (isset($_GET['del'])) {
				$resp = $marcas->del($_GET['del']) 	;
				if ($resp == 1) {
					header('Location: index.php?section=brands');
				}				
				echo '<script>alert("'.$resp.'");</script>';
			}
        ?>	 

		<div class="col-12">
			<h2 class="sub-header text-left">
				<a href="index.php?section=brands_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Marca</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody> 
					<?php
						foreach ($marcas->getList() as $marca) {?>
						<tr>
							<td class="font-weight-bold"><?php echo $marca['id_marca'];?></td>
							<td><?php echo $marca['nom_marca'];?></td>
							<td>
								<a	href="index.php?section=brands_abm&edit=<?php echo $marca['id_marca']?>"><button
									type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>

								<a	href="index.php?section=brands&del=<?php echo $marca['id_marca']?>"><button
									type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
							</td>
						</tr>
					<?php }?> 
				</tbody>
			</table>
		</div>	
	</div>
</div>
