<?php
$idP = $_GET['id'];
?>

<div class="row">
  <div class="col-3">
    <?php require_once("section/categories.php"); ?>
  </div>
  
  <div class="col-9">
    <div class="row">

      <?php

        $sql = $con->prepare('SELECT * FROM producto INNER JOIN marca ON producto.id_marca = marca.id_marca WHERE id_producto='. $idP);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

       echo '<div class="col-6">
          <div class="card">
            <img src="img/' . $resultado['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
          </div> 
        </div>
        <div class="col-4">
          <div class="card-description">
            <h5 class="card-title">' . $resultado['nombre'] . '</h5>
            <p class="card-text">' . $resultado['descripcion'] . '</p>
            <p>Disponibilidad:' . $resultado['disponibilidad'] . '</p>
            <p>Condición:' . $resultado['condicion'] . '</p>
            <p>Marca:' . $resultado['nom_marca'] . '</p>
            <p>Precio: $' . number_format($resultado['precio'], 2, ',', '.') . '</p>
            <a href="#" class="btn btn-danger">Comprar</a>
          </div>
        </div>'; 
      ?>

    </div>
  </div>
</div>