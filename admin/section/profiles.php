<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Perfiles</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php 
		    $perfilesMenu = 'Perfiles';
			$perfiles = new Perfil($con);
		

			if(isset($_POST['formulario_perfiles'])){ 
				if($_POST['id'] > 0){
						
						if(empty($_POST["nombre"])){
							$_SESSION["estado"] = "error";
							$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
							header("Location:index.php?section=profiles_abm&edit=$_POST[id]");
						}
						else
						{
							$resp= $perfiles->get_por_nombrePerfil($_POST["nombre"]);
						    if ($resp < 1) 
						    {  
							    $perfiles->edit($_POST);
							    $_SESSION["estado"] = "ok";
							    $_SESSION["mensaje"] = "Ha modificado el perfil de forma exitosa.";
								header('Location: index.php?section=profiles');
							} else {
								$_SESSION["estado"] = "error";
								$_SESSION["mensaje"] = "Ya existe una perfil con ese nombre.";								
								header("Location:index.php?section=profiles_abm&edit=$_POST[id]");
							}
						}	

				}else{			
					if(empty($_POST["nombre"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "El campo nombre es obligatorio.";
						header("Location:index.php?section=profiles_abm");
					}else{
						$resp= $perfiles->get_por_nombrePerfil($_POST["nombre"]);
						if ($resp < 1 )
						{
						    $perfiles->save($_POST);
						    $_SESSION["estado"] = "ok";
						    $_SESSION["mensaje"] = "Ha subido el perfil de forma exitosa.";
							header('Location: index.php?section=profiles');
						} else {
                            $_SESSION["estado"] = "error";
                            $_SESSION["mensaje"] = "Ya existe un perfil con ese nombre.";
                            header('Location: index.php?section=profiles_abm');
                        }
					}					 
				}				
			}	
			
			if(isset($_GET['del'])){
					$resp = $perfiles->del($_GET['del']) 	;
					if($resp == 1){
						$_SESSION["estado"] = "ok";
						$_SESSION["mensaje"] = "Ha eliminado el perfil con exito";
						header('Location: index.php?section=profiles');						
					}
					echo '<script>alert("'.$resp.'");</script>';
			}
		?>	 

		<div class="col-12">
			<h2 class="sub-header text-left"> 
				<a href="index.php?section=profiles_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Perfil</button></a></h2>
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
						foreach($perfiles->getList() as $perfil){?>
					<tr>
						<td class="font-weight-bold"><?php echo $perfil['id'];?></td>
						<td><?php echo $perfil['nombre'];?></td> 
						<td>
							<a href="index.php?section=profiles_abm&edit=<?php echo $perfil['id']?>"><button
							   type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>

							<a href="index.php?section=profiles&del=<?php echo $perfil['id']?>"><button
							   type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
						</td>
					</tr>
					<?php }?>      
				</tbody>
			</table>
		</div>	
	</div>
</div>