<div class="container my-5 text-center">
<<<<<<< HEAD
	<div class="row justify-content-center">
		<div class="col-12">
			<h1 class="text-left">Usuarios</h1>
		</div>
	</div>
=======
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-center">Usuarios</h1>
        </div>      
    </div>
>>>>>>> 9828495e851ff8d21b2e05a42c9150c90d6173de

	<div class="row justify-content-center">

		<?php $userMenu = 'Usuarios';

            if (!in_array('user.add', $_SESSION['usuario']['permisos']) &&
                !in_array('user.del', $_SESSION['usuario']['permisos']) &&
                !in_array('user.edit', $_SESSION['usuario']['permisos']) &&
                !in_array('user.see', $_SESSION['usuario']['permisos'])) {
                header('Location: ../index.php');
            }
                
            if (isset($_POST['submit'])) {
                if ($_POST['id_usuario'] > 0) {
                    $user->edit($_POST);
                } else {
                    $user->save($_POST);
                }
                header('Location: index.php?section=users');
            }
        
            if (isset($_GET['del'])) {
                $user->del($_GET['del']);
                header('Location: index.php?section=users');
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
<<<<<<< HEAD
				<tbody>
					<?php
                    foreach ($user->getList() as $usuario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $usuario['id_usuario'];?>
						</td>
						<td><?php echo $usuario['nombre'];?>
						</td>
						<td><?php echo $usuario['apellido'];?>
						</td>
						<td><?php echo $usuario['usuario'];?>
						</td>
						<td><?php echo $usuario['email'];?>
						</td>
						<td><?php echo isset($usuario['perfiles'])?implode(', ', $usuario['perfiles']):'No tiene perfiles asignados';?>
						</td>
						<td><?php echo ($usuario['activo'])?'si':'no';?>
						</td>
						<td>
							<?php if (in_array('user.edit', $_SESSION['usuario']['permisos'])) {?>
							<a <a
								href="index.php?section=users_abm&edit=<?php echo $usuario['id_usuario']?>"><button
									type="button" class="btn btn-info btn-md" title="Modificar">M</button></a>
							<?php }?>
							<?php if (in_array('user.del', $_SESSION['usuario']['permisos'])) {?>
							<a
								href="index.php?section=users&del=<?php echo $usuario['id_usuario']?>"><button
									type="button" class="btn btn-danger btn-md" title="Borrar">B</button></a>
							<?php }?>
						</td>
					</tr>
					<?php }?>
=======
				<tbody> 
				<?php  	 
					foreach($user->getList() as $usuario){?>
						<tr>
							<td class="font-weight-bold"><?php echo $usuario['id_usuario'];?></td>
							<td><?php echo $usuario['nombre'];?></td>
							<td><?php echo $usuario['apellido'];?></td>
							<td><?php echo $usuario['usuario'];?></td>
							<td><?php echo $usuario['email'];?></td>
							<td><?php echo isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
							<td><?php echo ($usuario['activo'])?'si':'no';?></td>
							<td>
								<?php if(in_array('user.edit',$_SESSION['usuario']['permisos'])){?>
										<a href="index.php?section=users_abm&edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info btn-md" title="Modificar">M</button></a>
								<?php }?>
								<?php if(in_array('user.del',$_SESSION['usuario']['permisos'])){?>
										<a href="index.php?section=users&del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger btn-md" title="Borrar">B</button></a>
								<?php }?>
							</td>
						</tr>
				<?php }?>      
>>>>>>> 9828495e851ff8d21b2e05a42c9150c90d6173de
				</tbody>
			</table>
		</div>
	</div>
</div>