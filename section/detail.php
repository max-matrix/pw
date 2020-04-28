<?php
$idP = $_GET['id'];
?>

<div class="row">
  <div class="col-3">
    <h2 class="text-center">Filtros</h2>
      <hr class="mb-5">
      <h4>Destacados</h4>
      <li>
        <a href="index.php?section=products&rankeo=desc">Mayor a Menor</a>
      </li>

      <hr>
      <h4>Ordenamiento</h4>
      <li>
        <a href="index.php?section=products&order=desc">A > Z</a>
      </li>
      <li>
        <a href="index.php?section=products&order=asc">Z > A</a>
      </li>
      <hr>
      <h4>Cartegorías</h4>
      <?php require_once("section/categories.php"); ?>
      <hr>
      <h4>Marcas</h4>
      <?php require_once("section/brands.php"); ?>
  </div>
  
  <div class="col-9">
    <div class="row">

      <?php

      $product = new Product($con);
      echo printProductByID($product->getProductByID($idP));

      ?> 

    </div>
  </div>
</div>