<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Comentarios</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 
		    $comentariosMenu = 'Comentarios';
			$comentarios = new Comentario($con);

			//si el usuario tiene el permiso de categories.adm entra, si no, lo saco (no esta hecho)			
            /* if (!in_array('commentaries.admin', $_SESSION['usuario']['permisos'])) {
            	header('Location: ../index.php');
            } */

			if(isset($_POST['formulario_comentarios'])){ 

				if($_POST['id'] > 0){
						
						if(empty($_POST["nombre"])){
							$_SESSION["estado"] = "error";
							$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
							header("Location:index.php?section=commentaries_abm&edit=$_POST[id]");
						}
						else
						{							
						    if ($resp < 1) 
						    {  
							    $comentarios->edit($_POST);
							    $_SESSION["estado"] = "ok";
							    $_SESSION["mensaje"] = "Ha modificado el comentario de forma exitosa.";
								header('Location: index.php?section=commentaries');
							} else {
								$_SESSION["estado"] = "error";
								$_SESSION["mensaje"] = "Ya existe un comentario con ese nombre.";								
								header("Location:index.php?section=commentaries_abm&edit=$_POST[id]");
							}
						}	

				}else{			
					if(empty($_POST["nombre"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=commentaries_abm");
					}else{						
						if ($resp < 1 )
						{
						    $comentarios->save($_POST);
						    $_SESSION["estado"] = "ok";
						    $_SESSION["mensaje"] = "Ha subido el comentario de forma exitosa.";
							header('Location: index.php?section=commentaries');
						} else {
                            $_SESSION["estado"] = "error";
                            $_SESSION["mensaje"] = "Ya existe un comentario con ese nombre.";
                            header('Location: index.php?section=commentaries_abm');
                        }
					}					 
				}				
			}	
			
			if(isset($_GET['del'])){
					$resp = $comentarios->del($_GET['del']) 	;
					if($resp == 1){
						$_SESSION["estado"] = "ok";
						$_SESSION["mensaje"] = "Ha eliminado el comentario con exito";
						header('Location: index.php?section=commentaries');						
					}
					echo '<script>alert("'.$resp.'");</script>';
			}
		?>	 

		<div class="col-12">
			<h2 class="sub-header text-left"> 
				<a href="index.php?section=commentaries_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Comentario</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Nombre</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody> 
					<?php  	 
						foreach($comentarios->getList() as $comentario){?>
					<tr>
						<td class="font-weight-bold"><?php echo $comentario['id_comentario'];?></td>
						<td><?php echo $comentario['descripcion'];?></td> 
						<td><?php echo ($comentario['activo'])?'si':'no';?></td>
						<td>							
							<div class="col-12">
								<div class="row justify-content-center">
									<form action="index.php?section=commentaries_abm&edit=<?php echo $comentario['id_comentario']?>" method="POST" class="modify mr-2">
										<button type="submit" class="btn btn-info btn-sm">Modificar</button>
									</form>
									<form action="index.php?section=commentaries&del=<?php echo $comentario['id_comentario']?>" method="POST" class="delete">
										<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
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