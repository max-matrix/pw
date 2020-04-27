<div class="row">
	<div class="col-12">
		<h2 class="text-center">Destacados</h2>
		<hr class="mb-5">
		<div class="row">

			<?php
			$sql = 'SELECT * FROM producto ORDER BY ranking DESC LIMIT 6';
			$resultado = $con->query($sql);
		
			foreach ($resultado as $row) {

				echo '<div class="col-4 mb-5">
				<div class="card" >
					<img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title">$' . number_format($row['precio'], 2, ',', '.') . '</h5>
							<p class="card-text">' . $row['nombre'] . '</p>
						</div>
						<div class="card-body text-center text-center">
							<a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalles</a>
						</div>
				</div>
			</div>';
			}

			?>

		</div>
	</div>
</div>