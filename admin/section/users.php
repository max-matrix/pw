<?php
require_once('class/user.php');
require_once('class/profile.php');
require_once('class/user_type.php');
?>

<div class="container-fluid">
      
    <?php $userMenu = 'Usuarios';
	  
	  
	   if(  !in_array('user.add',$_SESSION['usuario']['permisos']) &&
			!in_array('user.del',$_SESSION['usuario']['permisos']) &&		
			!in_array('user.edit',$_SESSION['usuario']['permisos']) &&
			!in_array('user.see',$_SESSION['usuario']['permisos'])){ 
			header('Location: ../index.php');
			}
			
		if(isset($_POST['submit'])){ 
			if($_POST['id_usuario'] > 0){
					$user->edit($_POST); 
			}else{
					$user->save($_POST); 
			}
			header('Location: index.php?section=users');
		}	
	
		if(isset($_GET['del'])){
				$user->del($_GET['del']);
				header('Location: section/users.php');
		}

        ?>
	  
	  
        
        <div class="col-sm-12 col-md-12 main">
          
		  <h1 class="page-header">
            Usuarios
          </h1>
 

          <h2 class="sub-header">Listado 
		  <?php if(in_array('user.add',$_SESSION['usuario']['permisos'])){?>
				<a href="index.php?section=users_ae"><button type="button" class="btn btn-success btn-lg" title="Agregar">Agregar</button></a>
		  <?php }?>	
		  </h2>
		   <?php if(in_array('user.see',$_SESSION['usuario']['permisos'])){?>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Usuario</th>
					  <th>eMail</th>
					  <th>Perfil</th>
					  <th>Activo</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody>
					<?php  	 
						foreach($user->getList() as $usuario){?>
				  
							<tr>
							  <td><?php echo $usuario['id_usuario'];?></td>
							  <td><?php echo $usuario['nombre'];?></td>
							  <td><?php echo $usuario['apellido'];?></td>
							  <td><?php echo $usuario['usuario'];?></td>
							  <td><?php echo $usuario['email'];?></td>
							  <td><?php echo isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
							  <td><?php echo ($usuario['activo'])?'si':'no';?></td>
							  <td>
								  <?php if(in_array('user.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="section/users_ae.php?edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
									<?php /*
									if(in_array('user.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios_abm.php?edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
								  	<?php } */?>
								  <?php }?>
								   <?php if(in_array('user.del',$_SESSION['usuario']['permisos'])){?>
										<a href="section/users_ae.php?del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">X</button></a>
								<?php }?>
								   <?php /*if(in_array('user.del',$_SESSION['usuario']['permisos'])){?>
										<a href="usuarios.php?del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">X</button></a>
									<?php }
								*/?>

							  </td>
							</tr>
						<?php }?>                
				  </tbody>
				</table>
			  </div>
 			<?php }?> 
          
      	</div>
	</div>
</div>
