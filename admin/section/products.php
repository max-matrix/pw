<div class="container my-5 text-center">
	<div class="row justify-content-center">
		<div class="col-12">
			<h1 class="text-center">Productos</h1>
		</div>
	</div>

	<div class="row justify-content-center">

		<?php
            $productosMenu = 'Productos';
            $productos = new Producto($con);
            //var_dump($productos);
            
            if (isset($_POST['formulario_productos'])) {
                if ($_POST['id_producto'] > 0) {
                    //var_dump($_POST);
                    $productos->edit($_POST);
                                                
                    if (empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["descripcion"])|| empty($_POST["disponibilidad"])|| empty($_POST["ranking"])) {
                        $_SESSION["estado"] = "error";
                        $_SESSION["mensaje"] = "Todos los campos son obligatorios.";
                        header("Location:index.php?section=products_abm&edit=$_POST[id_producto]");
                    } else {
                        if (isset($_FILES['ARCHIVO_SUBIDO']) && isset($_POST['id_producto'])) {
                            $nombre_archivo_imagen = $_FILES['ARCHIVO_SUBIDO']['name'];
                            $nombreImagen = saveName($nombre_archivo_imagen);
                            $ruta = '../img/';
                            move_uploaded_file($_FILES['ARCHIVO_SUBIDO']['tmp_name'], $ruta.$nombreImagen);
                            $_POST['nombre_imagen'] = $nombreImagen;
                        }
                        //----------------------
                        $productos->edit($_POST);
                        $_SESSION["estado"] = "ok";
                        $_SESSION["mensaje"] = "Ha modificado el producto de forma exitosa.";
                        header('Location: index.php?section=products');
                    }
                    //---------------------
                } else {
					
					if (empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["descripcion"])|| empty($_POST["disponibilidad"])|| empty($_POST["ranking"])) {
                        $_SESSION["estado"] = "error";
                        $_SESSION["mensaje"] = "Todos los campos son obligatorios.";
                        header("Location:index.php?section=products_abm");
                    } else {

						if (isset($_FILES['ARCHIVO_SUBIDO']) && isset($_POST['id_producto'])) 
						{
                            $nombre_archivo_imagen = $_FILES['ARCHIVO_SUBIDO']['name'];
                            $nombreImagen = saveName($nombre_archivo_imagen);
                            $ruta = '../img/';
                            move_uploaded_file($_FILES['ARCHIVO_SUBIDO']['tmp_name'], $ruta.$nombreImagen);
                            $_POST['nombre_imagen'] = $nombreImagen;

							$productos->save($_POST);
                            $_SESSION["estado"] = "ok";
							$_SESSION["mensaje"] = "Ha subido el producto de forma exitosa.";
						}
						else {
                            $productos->save($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "No se subió ningun archivo de imagen";
                            header('Location: index.php?section=products');
                        }
                    }
                }
            }

            
            if (isset($_GET['del'])) {
                $resp = $productos->del($_GET['del']) 	;
                if ($resp == 1) {
                    $_SESSION["estado"] = "ok";
                    $_SESSION["mensaje"] = "Ha eliminado el producto con exito";
                    header('Location: index.php?section=products');
                }
                echo '<script>alert("'.$resp.'");</script>';
            }
        ?>

		<div class="col-12">
			<h2 class="sub-header text-left">
				<a href="index.php?section=products_abm"><button type="button" class="btn btn-success btn-md"
						title="Agregar">Agregar Producto</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="h5 font-weight-bold text-center">
						<th>#</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripcion</th>
						<th>Disponibilidad</th>
						<th>Ranking</th>
						<th>Nombre Imagen</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        foreach ($productos->getList() as $producto) {?>
					<tr>
						<td class="font-weight-bold"><?php echo $producto['id_producto'];?>
						</td>
						<td><?php echo $producto['nombre'];?>
						</td>
						<td><?php echo $producto['precio'];?>
						</td>
						<td><?php echo $producto['descripcion'];?>
						</td>
						<td><?php echo $producto['disponibilidad'];?>
						</td>
						<td><?php echo $producto['ranking'];?>
						</td>
						<td><?php echo $producto['nombre_imagen'];?>
						</td>
						<td><img class="img-fluid"
								src="../img/<?php echo $producto['nombre_imagen']; ?>"
								alt="..."></td>
						<td>
							<a
								href="index.php?section=products_abm&edit=<?php echo $producto['id_producto']?>"><button
									type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>

							<a
								href="index.php?section=products&del=<?php echo $producto['id_producto']?>"><button
									type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>