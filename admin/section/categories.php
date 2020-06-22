<div class="container-fluid px-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Categorías</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 	
			$categoriasMenu = 'Categorias';
			$categorias = new Categoria($con);

            //si el usuario tiene el permiso de categories.adm entra, si no, lo saco			
           /*  if (!in_array('categories.admin', $_SESSION['usuario']['permisos'])) {
            	header('Location: ../index.php');
            } */

			if (isset($_POST['formulario_categorias'])) {
				
				$resp1= $categorias->get_por_nombreCategoria($_POST["nombre"], $_POST["id_categoria"]);				
				
				if ($_POST['id_categoria'] > 0) {

					if(empty($_POST["nombre"]) || empty($_POST["id_padre"])){ 
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "Todos los campos son obligatorios.";
						header("Location:index.php?section=categories_abm&edit=$_POST[id_categoria]");					
					}
					else
					{		
						if ($resp1 < 1 )						
						{						
                            $categorias->edit($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ha modificado la categoria de forma exitosa.";
                            header('Location: index.php?section=categories');
                        } else {
                            $_SESSION["estado"] = "error";
							$_SESSION["mensaje"] = "Ya existe una categoria con ese nombre.";							
							header("Location:index.php?section=categories_abm&edit=$_POST[id_categoria]");
                        }
                    }						
	
				} else {
					if(empty($_POST["nombre"]) || empty($_POST["id_padre"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "Todos los campos son obligatorios.";
						header("Location:index.php?section=categories_abm");
					}else{
						if ($resp1 < 1 )						
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
				$resp1 = $categorias->del($_GET['del']) 	;
				if ($resp1 == 1) {
					$_SESSION["estado"] = "ok";
					$_SESSION["mensaje"] = "Ha eliminado la categoria con exito";					
					header('Location: index.php?section=categories');
				}
				echo '<script>alert("'.$resp1.'");</script>';
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
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody> 
					<?php
						foreach ($categorias->getList() as $categoria) {?>
						<tr>
							<td class="align-middle"><?php echo $categoria['id_categoria'];?></td>
							<td class="align-middle"><?php echo $categoria['nombre'];?></td>
							<td class="align-middle"><?php echo $categoria['id_padre'];?></td>
							<td class="align-middle"><?php echo ($categoria['activo'])?'si':'no';?></td>
							<td class="align-middle">
								<div class="col-12">
									<div class="row justify-content-center">
										<form action="index.php?section=categories_abm&edit=<?php echo $categoria['id_categoria']?>" method="POST" class="modify mr-2">
											<button type="submit" class="btn btn-info btn-sm" title="Modificar"><i
                                        class="fas fa-edit"></i></button>
										</form>
										<form action="index.php?section=categories&del=<?php echo $categoria['id_categoria']?>" method="POST" class="delete">
											<button type="submit" class="btn btn-danger btn-sm" title="Borrar"><i
                                        class="far fa-trash-alt"></i></button>
										</form>
									</div>
								</div>
							</td>
						</tr>
					<?php }?>     
				</tbody>
			</table>
		</div>	
	</div>
</div>
