<div class="container-fluid px-5 text-center">
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
            
            //si el usuario tiene el permiso de products.adm entra, si no, lo saco
            /* if (!in_array('products.admin', $_SESSION['usuario']['permisos'])) {
                header('Location: ../index.php');
            } */

            if (isset($_POST['formulario_productos'])) {
                $resp1= $productos->get_por_nombreProducto($_POST["nombre"], $_POST["id_producto"]);

                if ($_POST['id_producto'] > 0) {
                    //var_dump($_POST);
                    //$productos->edit($_POST);
                                                
                    if (empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["descripcion"])||
                    empty($_POST["disponibilidad"])|| empty($_POST["ranking"])) {
                        $_SESSION["estado"] = "error";
                        $_SESSION["mensaje"] = "Todos los campos son obligatorios.";
                        header("Location:index.php?section=products_abm&edit=$_POST[id_producto]");
                    } else {
                        if (isset($_FILES['ARCHIVO_SUBIDO']) && isset($_POST['id_producto']) && ($resp1 < 1)) {
                            $nombre_archivo_imagen = $_FILES['ARCHIVO_SUBIDO']['name'];
                            $nombreImagen = saveName($nombre_archivo_imagen);
                            $ruta = '../img/';
                            move_uploaded_file($_FILES['ARCHIVO_SUBIDO']['tmp_name'], $ruta.$nombreImagen);
                            $_POST['nombre_imagen'] = $nombreImagen;
                        
                            $productos->edit($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ha modificado el producto de forma exitosa.";
                            header('Location: index.php?section=products');
                        } else {
                            $_SESSION["estado"] = "error";
                            $_SESSION["mensaje"] = "Ya existe un producto con ese nombre.";
                            header("Location:index.php?section=products_abm&edit=$_POST[id_producto]");
                        }
                    }
                } else {
                    if (empty($_POST["nombre"]) || empty($_POST["precio"]) || empty($_POST["descripcion"])||
                    empty($_POST["disponibilidad"])|| empty($_POST["ranking"]) || $_FILES["ARCHIVO_SUBIDO"]["size"] == "0") {
                        $_SESSION["estado"] = "error";
                        $_SESSION["mensaje"] = "Todos los campos son obligatorios.";
                        header("Location:index.php?section=products_abm");
                    } else {
                        if (isset($_FILES['ARCHIVO_SUBIDO']) && isset($_POST['id_producto']) && ($resp1 < 1)) {
                            $nombre_archivo_imagen = $_FILES['ARCHIVO_SUBIDO']['name'];
                            $nombreImagen = saveName($nombre_archivo_imagen);
                            $ruta = '../img/';
                            move_uploaded_file($_FILES['ARCHIVO_SUBIDO']['tmp_name'], $ruta.$nombreImagen);
                            $_POST['nombre_imagen'] = $nombreImagen;
                                                
                            $productos->save($_POST);
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ha subido el producto de forma exitosa.";
                            header('Location: index.php?section=products');
                        } else {
                            $_SESSION["estado"] = "ok";
                            $_SESSION["mensaje"] = "Ya existe un producto con ese nombre.";
                            header('Location: index.php?section=products_abm');
                        }
                    }
                }
            }
            
            if (isset($_GET['del'])) {
                $resp1 = $productos->del($_GET['del']) 	;
                if ($resp1 == 1) {
                    $_SESSION["estado"] = "ok";
                    $_SESSION["mensaje"] = "Ha eliminado el producto con exito";
                    header('Location: index.php?section=products');
                }
                echo '<script>alert("'.$resp1.'");</script>';
            }
        ?>


        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h2 class="sub-header text-left">
                        <a href="index.php?section=products_abm"><button type="button" class="btn btn-success btn-md"
                                title="Agregar">Agregar Producto</button></a></h2>
                </div>
                <div class="col-4 ">
                    <form action="index.php?section=products" method="POST">
                        <div class="form-row justify-content-end">
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categoria">
                                    <option selected value="1000">Todas</option>
                                    <?php
           

            function printCategoria($con, $id_padre = 1)
            {
                $sql = 'SELECT * FROM categoria WHERE activo = "1" AND id_padre = ' . $id_padre;
                $resultado = $con->query($sql);
                
                if (!empty($resultado)) {
                    $salida = '';
    
                    foreach ($resultado as $row) {
                        $salida .= '
                    <option value="' . $row['id_categoria'] . '">' . $row['nombre'] . '</option>'.
                      printCategoria($con, $row['id_categoria']);
                    }
                    $salida .= '';
                }
                return $salida;
            }
            echo printCategoria($con);
            ?>

                                </select>
                            </div>
                            <div class="col-auto my-1 justify-content-between">
                                <button type="submit" class="btn btn-success">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($_POST['categoria'])) {
                            foreach ($productos->getListByID($_POST['categoria']) as $producto) {?>
                    <tr>
                        <td class="font-weight-bold align-middle"><?php echo $producto['id_producto']; ?>
                        </td>
                        <td class="align-middle"><?php echo $producto['nombre']; ?>
                        </td>
                        <td class="align-middle"><?php echo $producto['precio']; ?>
                        </td>
                        <td class="align-middle" width="200"><?php echo $producto['descripcion']; ?>
                        </td>
                        <td class="align-middle"><?php echo $producto['disponibilidad']; ?>
                        </td>
                        <td class="align-middle"><?php echo $producto['ranking']; ?>
                        </td>
                        <td class="align-middle"><?php echo $producto['nombre_imagen']; ?>
                        </td>
                        <td class="align-middle"><img class="img-fluid"
                                src="../img/<?php echo $producto['nombre_imagen']; ?>"
                                alt="..." height="100px" width="100px"> </td>
                        <td class="align-middle"><?php echo ($producto['activo'])?'si':'no'; ?>
                        </td>
                        <td class="align-middle">
                            <div class="col-12">
                                <div class="row justify-content-center">
									<form action="index.php?section=products_abm&edit=<?php echo $producto['id_producto']?>" method="POST" class="modify mr-1">
										<button type="submit" class="btn btn-info btn-sm" title="Modificar"><i
                                        class="fas fa-edit"></i></button>
									</form>
									<form action="index.php?section=products&del=<?php echo $producto['id_producto']?>" method="POST" class="delete">
										<button type="submit" class="btn btn-danger btn-sm" title="Borrar"><i
                                        class="far fa-trash-alt"></i></button>
									</form>
									<form action="index.php?section=commentaries&id=<?php echo $producto['id_producto']?>" method="POST" class="ml-1">
										<button type="submit" class="btn btn-secondary btn-sm" title="Comentario"><i
                                        class="fas fa-comments"></i></button>
									</form>
								</div>
							</div>
                        </td>
                    </tr>
                    <?php }
                        } else {
                            foreach ($productos->getList() as $producto) {?>
                    <tr>
                        <td class="font-weight-bold align-middle"><?php echo $producto['id_producto'];?>
                        </td>
                        <td class="align-middle"><?php echo $producto['nombre'];?>
                        </td>
                        <td class="align-middle"><?php echo $producto['precio'];?>
                        </td>
                        <td class="align-middle" width="200"><?php echo $producto['descripcion'];?>
                        </td>
                        <td class="align-middle"><?php echo $producto['disponibilidad'];?>
                        </td>
                        <td class="align-middle"><?php echo $producto['ranking'];?>
                        </td>
                        <td class="align-middle"><?php echo $producto['nombre_imagen'];?>
                        </td>
                        <td class="align-middle"><img class="img-fluid"
                                src="../img/<?php echo $producto['nombre_imagen']; ?>"
                                alt="..." height="100px" width="100px"></td>
                        <td class="align-middle"><?php echo ($producto['activo'])?'si':'no';?>
                        </td>
                        <td class="align-middle">                           
                            <div class="col-12">
                                <div class="row justify-content-center">
									<form action="index.php?section=products_abm&edit=<?php echo $producto['id_producto']?>" method="POST" class="modify mr-1">
										<button type="submit" class="btn btn-info btn-sm" title="Modificar"><i
                                        class="fas fa-edit"></i></button>
									</form>
									<form action="index.php?section=products&del=<?php echo $producto['id_producto']?>" method="POST" class="delete">
										<button type="submit" class="btn btn-danger btn-sm" title="Borrar"><i
                                        class="far fa-trash-alt"></i></button>
									</form>
									<form action="index.php?section=commentaries&id=<?php echo $producto['id_producto']?>" method="POST" class="ml-1">
										<button type="submit" class="btn btn-secondary btn-sm" title="Comentario"><i
                                        class="fas fa-comments"></i></button>
									</form>
								</div>
							</div>
                        </td>
                    </tr>
                    <?php }
                        }?>
                </tbody>
            </table>
        </div>
    </div>
</div>