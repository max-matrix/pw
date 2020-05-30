<div class="row">
	<div class="col-12">
		<h2 class="text-center">Destacados</h2>
		<hr class="mb-5">
		<div class="row">

			<?php

                $product = new Product($con);                
                echo printProductByOutstanding($product->getProductByRandom());

            ?>

		</div>
	</div>
</div>