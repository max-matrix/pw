<div class="container mt-5">
<div class="row">
	<div class="col-12">
		<h2 class="text-center">Destacados</h2>
		<hr class="mb-5">
		<div class="row">

			<?php

                $product = new Product($con);
                // echo "<p><h3>productos obtenidos de la base primera vez </h3><br/>";
                // foreach ($product->getProductByRandom() as $row) {
                //     echo print_r($row)."<p><p>";
                // }

                // $productArray = $product->getProductByRandom();
                // echo "<p><h3>productos obtenidos por segunda vez</h3> <p>";
                // foreach ($product->getProductByRandom() as $row) {
                //     echo print_r($row)."<p><p>";
                // }
                // exit ;
                
                echo printProductByOutstanding($product->getProductByRandom());

            ?>

		</div>
	</div>
</div>
</div>