<div class="container my-5 text-center">
	<div class="row justify-content-center">
		<div class="col-12">
			<h1 class="text-center">Comentarios</h1>
		</div>
	</div>

	<div class="filtros">
		<a href="index.php?section=commentaries&filtros=off">activo</a>
		<a href="index.php?section=commentaries&filtros=on">inactivo</a>
	</div>

	<div class="row justify-content-center">

		<?php
            $comentariosMenu = 'Comentarios';
            $comentarios = new Comentario($con);

            //si el usuario tiene el permiso de categories.adm entra, si no, lo saco (no esta hecho)
            /* if (!in_array('commentaries.admin', $_SESSION['usuario']['permisos'])) {
            	header('Location: ../index.php');
            } */

            if (isset($_POST['formulario_comentarios'])) {
                if ($_POST['id_comentario'] > 0) {
                    if (empty($_POST["activo"])) {
                        $comentarios->edit($_POST);
                        $_SESSION["estado"] = "ok";
                        $_SESSION["mensaje"] = "El comentario ahora esta desactivado.";
                        header('Location: index.php?section=commentaries');
                    } else {
                        $comentarios->edit($_POST);
                        $_SESSION["estado"] = "ok";
                        $_SESSION["mensaje"] = "El comentario ahora esta activado y listo para ver en la página";
                        header('Location: index.php?section=commentaries');
                    }
                }
            }

        if (isset($_GET['id'])) {
            ?>

		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Comentario</th>
						<th>ID_Producto</th>
						<th>ID_Usuario</th>
						<th>IP_Usuario</th>
						<th>Fecha</th>
						<th>Puntaje</th>
						<th>email</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
              foreach ($comentarios->getComByProduct($_GET['id']) as $comentario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $comentario['id_comentario'];?>
						</td>
						<td><?php echo $comentario['comentario'];?>
						</td>
						<td><?php echo $comentario['id_prod_com'];?>
						</td>
						<td><?php echo $comentario['id_us_com'];?>
						</td>
						<td><?php echo $comentario['ip_us_com'];?>
						</td>
						<td><?php echo $comentario['fecha_us_com'];?>
						</td>
						<td><?php echo $comentario['puntaje_us_com'];?>
						</td>
						<td><?php echo $comentario['email'];?>
						</td>
						<td><?php echo ($comentario['activo'])?'si':'no';?>
						</td>
						<td>
							<div class="col-12">
								<div class="row justify-content-center">
									<form
										action="index.php?section=commentaries_abm&edit=<?php echo $comentario['id_comentario']?>"
										method="POST" class="actinact mr-2">
										<button type="submit" class="btn btn-info btn-sm"><?php echo ($comentario['activo'])?'Desactivar':'Activar';?></button>
									</form>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>


		<?php
        } elseif (isset($_GET['filtros'])) {
            if ($_GET['filtros'] == 'on') {
                ?>

		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Comentario</th>
						<th>ID_Producto</th>
						<th>ID_Usuario</th>
						<th>IP_Usuario</th>
						<th>Fecha</th>
						<th>Puntaje</th>
						<th>email</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
            foreach ($comentarios->getActivos() as $comentario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $comentario['id_comentario'];?>
						</td>
						<td><?php echo $comentario['comentario'];?>
						</td>
						<td><?php echo $comentario['id_prod_com'];?>
						</td>
						<td><?php echo $comentario['id_us_com'];?>
						</td>
						<td><?php echo $comentario['ip_us_com'];?>
						</td>
						<td><?php echo $comentario['fecha_us_com'];?>
						</td>
						<td><?php echo $comentario['puntaje_us_com'];?>
						</td>
						<td><?php echo $comentario['email'];?>
						</td>
						<td><?php echo ($comentario['activo'])?'si':'no';?>
						</td>
						<td>
							<div class="col-12">
								<div class="row justify-content-center">
									<form
										action="index.php?section=commentaries_abm&edit=<?php echo $comentario['id_comentario']?>"
										method="POST" class="actinact mr-2">
										<button type="submit" class="btn btn-info btn-sm"><?php echo ($comentario['activo'])?'Desactivar':'Activar';?></button>
									</form>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<?php
            } else {
                ?>
		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Comentario</th>
						<th>ID_Producto</th>
						<th>ID_Usuario</th>
						<th>IP_Usuario</th>
						<th>Fecha</th>
						<th>Puntaje</th>
						<th>email</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
            foreach ($comentarios->getInactivos() as $comentario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $comentario['id_comentario'];?>
						</td>
						<td><?php echo $comentario['comentario'];?>
						</td>
						<td><?php echo $comentario['id_prod_com'];?>
						</td>
						<td><?php echo $comentario['id_us_com'];?>
						</td>
						<td><?php echo $comentario['ip_us_com'];?>
						</td>
						<td><?php echo $comentario['fecha_us_com'];?>
						</td>
						<td><?php echo $comentario['puntaje_us_com'];?>
						</td>
						<td><?php echo $comentario['email'];?>
						</td>
						<td><?php echo ($comentario['activo'])?'si':'no';?>
						</td>
						<td>
							<div class="col-12">
								<div class="row justify-content-center">
									<form
										action="index.php?section=commentaries_abm&edit=<?php echo $comentario['id_comentario']?>"
										method="POST" class="actinact mr-2">
										<button type="submit" class="btn btn-info btn-sm"><?php echo ($comentario['activo'])?'Desactivar':'Activar';?></button>
									</form>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>


		<?php
            } ?>



		<?php
        } else {
            ?>
		<div class="col-12">
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Comentario</th>
						<th>ID_Producto</th>
						<th>ID_Usuario</th>
						<th>IP_Usuario</th>
						<th>Fecha</th>
						<th>Puntaje</th>
						<th>email</th>
						<th>Activo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        foreach ($comentarios->getList() as $comentario) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $comentario['id_comentario'];?>
						</td>
						<td><?php echo $comentario['comentario'];?>
						</td>
						<td><?php echo $comentario['id_prod_com'];?>
						</td>
						<td><?php echo $comentario['id_us_com'];?>
						</td>
						<td><?php echo $comentario['ip_us_com'];?>
						</td>
						<td><?php echo $comentario['fecha_us_com'];?>
						</td>
						<td><?php echo $comentario['puntaje_us_com'];?>
						</td>
						<td><?php echo $comentario['email'];?>
						</td>
						<td><?php echo ($comentario['activo'])?'si':'no';?>
						</td>
						<td>
							<div class="col-12">
								<div class="row justify-content-center">
									<form
										action="index.php?section=commentaries_abm&edit=<?php echo $comentario['id_comentario']?>"
										method="POST" class="actinact mr-2">
										<button type="submit" class="btn btn-info btn-sm"><?php echo ($comentario['activo'])?'Desactivar':'Activar';?></button>
									</form>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>


		<?php
        }?>


	</div>
</div>