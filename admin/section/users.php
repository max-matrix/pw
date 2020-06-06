<div class="container my-5 text-center">
	<div class="row justify-content-center">
		<div class="col-12">
			<h1 class="text-center">Usuarios</h1>
		</div>
	</div>

	<div class="row justify-content-center">

		<?php
		$usuariosMenu = 'Usuarios';
		$usuarios = new Usuario($con);
		//var_dump($user);

            if (!in_array('user.add', $_SESSION['usuario']['permisos']) &&
                !in_array('user.del', $_SESSION['usuario']['permisos']) &&
                !in_array('user.edit', $_SESSION['usuario']['permisos']) &&
                !in_array('user.see', $_SESSION['usuario']['permisos'])) {
                header('Location: ../index.php');
            }
			//var_dump($_POST);
			
            if (isset($_POST['formulario_usuarios'])) {
                if ($_POST['id_usuario'] > 0) {
					//var_dump($_POST);					
					if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["usuario"])|| empty($_POST["clave"])|| empty($_POST["email"])){
						$_SESSION["estado"] = "error";
						$_SESSION["mensaje"] = "Todos los campos son obligatorios.";
						header("Location:index.php?section=users_abm&edit=$_POST[id_usuario]");					
					}
					else
					{
						$resp= $usuarios->get_por_nombreUsuario($_POST["nombre"]);
						if ($resp < 1) 
						{
					    	$usuarios->edit($_POST);
					    	$_SESSION["estado"] = "ok";
					    	$_SESSION["mensaje"] = "Ha modificado el usuario de forma exitosa.";
					    	header('Location: index.php?section=users');
				    	} else {
				    		$_SESSION["estado"] = "error";
				    	 	$_SESSION["mensaje"] = "Ya existe un usuario con ese nombre.";
				    		header("Location:index.php?section=users_abm&edit=$_POST[nombre]");
			    		}
			    	}		

		    	} else {
			    	if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["usuario"])|| empty($_POST["clave"])|| empty($_POST["email"])){
				    	$_SESSION["estado"] = "error";
				    	$_SESSION["mensaje"] = "Todos los campos son obligatorios.";
				    	header("Location:index.php?section=users_abm");
				    }else{
					    $resp= $usuarios->get_por_nombreUsuario($_POST["nombre"]);
					    if ($resp < 1 )
					    {
						    $usuarios->save($_POST);
						    $_SESSION["estado"] = "ok";
						    $_SESSION["mensaje"] = "Ha subido el usuario de forma exitosa.";
						    header('Location: index.php?section=users');
					    } else {
    						$_SESSION["estado"] = "error";
	    					$_SESSION["mensaje"] = "Ya existe un usuario con ese nombre.";
		    				header('Location: index.php?section=users_abm');
			    		}
				    }
			    }
		    }
        
            if (isset($_GET['del'])) {
				$resp = $usuarios->del($_GET['del']);
				if ($resp == 1) {
					$_SESSION["estado"] = "ok";
					$_SESSION["mensaje"] = "Ha eliminado el usuario con exito";
                    header('Location: index.php?section=users');
			    }
			    echo '<script>alert("'.$resp.'");</script>';
			}
        ?>

		<div class="col-12">
			<h2 class="sub-header text-left">
				<?php if (in_array('user.add', $_SESSION['usuario']['permisos'])) {?>
				<a href="index.php?section=users_abm"><button type="button" class="btn btn-success btn-md"
						title="Agregar">Agregar Usuario</button></a>
				<?php }?>
			</h2>
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
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
                    foreach ($user->getList() as $usuario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $usuario['id_usuario'];?></td>
						<td><?php echo $usuario['nombre'];?></td>
						<td><?php echo $usuario['apellido'];?></td>
						<td><?php echo $usuario['usuario'];?></td>
						<td><?php echo $usuario['email'];?></td>
						<td><?php echo isset($usuario['perfiles'])?implode(', ', $usuario['perfiles']):'No tiene perfiles asignados';?></td>
						<td><?php echo ($usuario['activo'])?'si':'no';?></td>
						<td>
							<?php if (in_array('user.edit', $_SESSION['usuario']['permisos'])) {?>
							<a	href="index.php?section=users_abm&edit=<?php echo $usuario['id_usuario']?>"><button
								type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>
							<?php }?>
							<!--Esto de borrar esta sin uso, ya que el borrado de usuarios se haria desde la db -->
							<?php if (in_array('user.del', $_SESSION['usuario']['permisos'])) {?>
							<a
								href="index.php?section=users&del=<?php echo $usuario['id_usuario']?>"><button
									type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
							<?php }?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>