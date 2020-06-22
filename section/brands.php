<div class="panel-group category-products" id="accordian">
  <div class="panel panel-default">
    <div class="panel-heading panel pl-0">
    <div class="panel-title text-left" id="sportswear">
      <div class="panel-body text-left">
          <ul class="pl-3 cat">
          <?php

          $brand = new Brand($con);
          $cat = isset($_GET['cat']) ? $_GET['cat'] : '';
          echo printBrand($brand->getBrands(), $cat);
         
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>