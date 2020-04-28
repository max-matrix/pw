<?php
function printProduct($prod) {

  if (!empty($prod)) {

    $salidaProduct = '';
    
    foreach ($prod as $row) {

      $salidaProduct .= '
        <div class="col-4 mb-4">
              <div class="card">
                  <img src="img/' . $row['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
                  <div class="card-body text-center">                                     
                      <h5 class="card-title">' . $row['nombre'] . '</h5>
                      <p class="card-text h-fix">' . $row['descripcion'] . '</p>
                  </div>
                  <div class="card-body text-center text-center">
                      <a href="index.php?section=detail&id=' . $row['id_producto'] . '" class="card-link ">Detalle</a>
                  </div>
              </div>
          </div>'
        ;
    }
    $salidaProduct .= '';
  }
  return $salidaProduct;
}

function printProductByID($prod) {

  if (!empty($prod)) {

    $salidaProduct = '<div class="col-6">
    <div class="card">
      <img src="img/' . $prod['nombre_imagen'] . '.jpg" class="card-img-top" alt="...">
    </div> 
    </div>
      <div class="col-4">
        <div class="card-description">
          <h5 class="card-title">' . $prod['nombre'] . '</h5>
          <p class="card-text">' . $prod['descripcion'] . '</p>
          <p>Disponibilidad:' . $prod['disponibilidad'] . '</p>
          <p>Condición:' . $prod['condicion'] . '</p>
          <p>Marca:' . $prod['nom_marca'] . '</p>
          <p>Precio: $' . number_format($prod['precio'], 2, ',', '.') . '</p>
          <a href="#" class="btn btn-danger">Comprar</a>
      </div>
    </div>'
      ;
  }
  return $salidaProduct;
}

function printProductByOutstanding($prodByOutstanding) {

  if (!empty($prodByOutstanding)) {

    $salidaProduct = '';
    
    foreach ($prodByOutstanding as $row) {

      $salidaProduct .= '
        <div class="col-4 mb-5">
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
        </div>'
        ;
    }
    $salidaProduct .= '';
  }
  return $salidaProduct;
}
?>