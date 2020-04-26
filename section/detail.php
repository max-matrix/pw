<?php
$idP = $_GET['id'];
?>

<div class="row">
	<div class="col-3">
		<h2 class="text-center">Filtros</h2>
			<div class="panel-group category-products" id="accordian">
				<div class="panel panel-default">
					<div class="panel-heading pl-0">
						<h4 class="panel-title text-left">
						
						<?php
							function printCategoria($con, $id_padre = 0){
								$sql = 'SELECT * FROM categoria WHERE id_padre = '.$id_padre;
								$resultado = $con->query($sql);
								if(!empty($resultado)){
									$salida = '<div class="panel-body text-left"><ul class="pl-3">';
									foreach($resultado as $row){
										$salida.='
													<li>
														<a href="categoriasrec.php?cat='.$row['id_categoria'].'&marca='.(isset($_GET['marca'])?$_GET['marca']:'').'">'.$row['nombre'].'</a>'.
															printCategoria($con,$row['id_categoria']).'
													</li>
												';
										}
										$salida.='</ul></div>';
									}
									return $salida;
							}
							echo printCategoria($con); 
						?>
					</div>
				</div>
			</div>
	</div>
	<div class="col-9">
		<div class="row">

<?php


$sql = $con->prepare('SELECT * FROM producto WHERE id_producto = '.$idP);
$sql->execute();
$resultado = $sql->fetch(PDO::FETCH_ASSOC);


$sql2 = $con->prepare('SELECT * FROM marca WHERE id_marca = '.$resultado['id_marca']);
$sql2->execute();
$resultado2 = $sql2->fetch(PDO::FETCH_ASSOC);


	echo '<div class="col-6">
        <div class="card">
        <img src="img/'.$resultado['nombre_imagen'].'.jpg" class="card-img-top" alt="...">
      </div> 
    </div>
	<div class="col-4">
	<div class="card-description">
		<h5 class="card-title">'.$resultado['nombre'].'</h5>
		<p class="card-text">'.$resultado['descripcion'].'</p>
		<p>Disponibilidad:'.$resultado['disponibilidad'].'</p>
		<p>Condición:'.$resultado['condicion'].'</p>
		<p>Marca:'.$resultado2['nombre'].'</p>
		<p>Precio:'.$resultado['precio'].'</p>
		<a href="#" class="btn btn-danger">Comprar</a>
	</div>
	</div>';


?>
		
		</div>
	</div>
</div>
