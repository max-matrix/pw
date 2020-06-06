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

function printBrand($brands, $category) {
  foreach ($brands as $row) {
    echo '<li><a href="index.php?section=products&cat='. $category . '&marca=' . $row['id_marca'] . '">' . $row['nom_marca'] . '</a></li>';
  }
}

function logueado(){
  return isset($_SESSION["usuario"]);
}

function is_admin(){
  if(!logueado())
      return false;
  return $_SESSION["usuario"]["perfil"] == "admin";
}

function mensajes(){
  return isset($_SESSION["estado"]);
}

function notificacion(){
  if(mensajes()):
      $clase = $_SESSION["estado"] == "error" ? "danger" : "success";

      $respuesta = "<div class='container text-center col-8'>
                      <div class='row my-4'>
                        <div class='col-12'>
                          <div class='alert alert-$clase alert-dismissible fade show' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                              <span class='sr-only'>Close</span>
                            </button>
                            $_SESSION[mensaje]
                          </div>
                        </div>
                      </div> 
                    </div>";

      unset($_SESSION["estado"]);
  else:
      $respuesta = false;
  endif;

  echo $respuesta;
}

// Esto tiene que ir en Class Usuarios
function encrypt($clave,$salt){
		
  /* concateno el salt con la clave */
  $clave .= $salt;
  
  /* pongo el salt al medio de la contraseña */
  //$clave = substr($clave,0,strlen($clave)/2).$salt.substr($clave,strlen($clave)/2,strlen($clave));
  
  /* para obtener la lista de algoritmos de hash usar hash_algos()*/
  //return md5($clave);
  return hash('md5',$clave);
}


function saveName($nombre){
  $nombreImagen = str_ireplace(" ","_",$nombre);
  return strtolower($nombreImagen);
}



?>
