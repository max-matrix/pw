<?php
$idP = $_GET['id'];
// id 10
?>
<div class="container my-5">
<div class="row">
    <div class="col-3">
        <h2 class="text-center">Filtros</h2>
        <hr class="mb-5">
        <h4>Destacados</h4>
        <div class="panel-group category-products">
            <div class="panel panel-default">
                <div class="panel-heading panel pl-0">
                    <div class="panel-title text-left">
                        <div class="panel-body text-left">
                            <ul class="pl-3 cat">
                                <li>
                                    <a href="index.php?section=products&rankeo=desc">Mayor a Menor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <h4>Ordenamiento</h4>
        <div class="panel-group category-products">
            <div class="panel panel-default">
                <div class="panel-heading panel pl-0">
                    <div class="panel-title text-left">
                        <div class="panel-body text-left">
                            <ul class="pl-3 cat">
                                <li>
                                    <a href="index.php?section=products&order=desc">A > Z</a>
                                </li>
                                <li>
                                    <a href="index.php?section=products&order=asc">Z > A</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
      $puntaje = $product->getPromedioByID($idP);
      $prod = $product->getProductByID($idP);
      array_push($prod, $puntaje);
      echo printProductByCommentary($prod);

      ?>

        </div>
    </div>
</div>
</div>
