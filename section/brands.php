<div class="panel-group category-products" id="accordian">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      </h4>
    </div>
    <div id="sportswear">
      <div class="panel-body">
        <ul>
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