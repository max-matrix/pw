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

					if(empty($_POST["nombre"])){ //|| empty($_POST["id_padre"]) no se puede poner obligatorio el id_padre, ya que no permite "0"
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=categories_abm&edit=$_POST[id_categoria]");					
					}
					else
					{
						$resp= $categorias->get_por_nombreCategoria($_POST["nombre"],$_POST["id_padre"]);
						if ($resp < 1) 
						{
                            $categorias->edit($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ha modificado la categoria de forma exitosa.";
                            header('Location: index.php?section=categories');
                        } else {
                            $_SESSION["estado"] = "error";
							$_SESSION["mensaje"] = "Ya existe una categoria con ese nombre.";							
							header("Location:index.php?section=categories_abm&edit=$_POST[nombre]");
                        }
                    }						
	
				} else {
					if(empty($_POST["nombre"])){//|| empty($_POST["id_padre"]) no se puede poner obligatorio el id_padre, ya que no permite "0"
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=categories_abm");
					}else{
						$resp= $categorias->get_por_nombreCategoria($_POST["nombre"]);
						if ($resp < 1 )
						{
							$categorias->save($_POST);
						    $_SESSION["estado"] = "ok";
						    $_SESSION["mensaje"] = "Ha subido la categoria de forma exitosa.";
						    header('Location: index.php?section=categories');
						} else {
                            $_SESSION["estado"] = "error";
                            $_SESSION["mensaje"] = "Ya existe una categoria con ese nombre.";
                            header('Location: index.php?section=categories_abm');
                        }
					}
				}				
			}	
			
			if (isset($_GET['del'])) {
				$resp = $categorias->del($_GET['del']) 	;
				if ($resp == 1) {
					$_SESSION["estado"] = "ok";
					$_SESSION["mensaje"] = "Ha eliminado la categoria con exito";					
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
