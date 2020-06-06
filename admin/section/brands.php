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

			//$nombre = $_POST["nom_marca"];
			//$id = $POST["id_marca"];
			
			if (isset($_POST['formulario_marcas'])) {
				if ($_POST['id_marca'] > 0) {
					
					if(empty($_POST["nom_marca"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=brands_abm&edit=$_POST[id_marca]");
					}
					else
					{
                        $resp= $marcas->get_por_nom_marca($_POST["nom_marca"]);
						if ($resp < 1) 
						{
                            $marcas->edit($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ha modificado la marca de forma exitosa.";
                            header('Location: index.php?section=brands');
                        } else {
                            $_SESSION["estado"] = "error";
							$_SESSION["mensaje"] = "Ya existe una marca con ese nombre.";							
							header("Location:index.php?section=brands_abm&edit=$_POST[id_marca]");
                        }
                    }
	
				} else {
					if(empty($_POST["nom_marca"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=brands_abm");
					}else{
						$resp= $marcas->get_por_nom_marca($_POST["nom_marca"]);
						if ($resp < 1 )
						{
							$marcas->save($_POST);
							$_SESSION["estado"] = "ok";
							$_SESSION["mensaje"] = "Ha subido la marca de forma exitosa.";
							header('Location: index.php?section=brands');
						} else {
                            $_SESSION["estado"] = "error";
                            $_SESSION["mensaje"] = "Ya existe una marca con ese nombre.";
                            header('Location: index.php?section=brands_abm');
                        }
					}
				}				
			}

			if (isset($_GET['del'])) {
				$resp = $marcas->del($_GET['del']) 	;
				if ($resp == 1) {
					$_SESSION["estado"] = "ok";
					$_SESSION["mensaje"] = "Ha eliminado la marca con exito";
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
