<?php
function printProduct($prod)
{
    if (!empty($prod)) {
        $salidaProduct = '';
    
        foreach ($prod as $row) {
            $salidaProduct .= '
        <div class="col-4 mb-4">
              <div class="card">
                  <img src="img/' . $row['nombre_imagen'] . '" class="card-img-top" alt="...">
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

function printProductByID($prod)
{
    if (!empty($prod)) {
        $salidaProduct = '<div class="col-7 pl-0">
    <div class="card">
      <img src="img/' . $prod['nombre_imagen'] . '" class="card-img-top" alt="...">
    </div> 
    </div>
      <div class="col-5 px-0">
        <div class="card-description">
          <h5 class="card-title">' . $prod['nombre'] . '</h5>
          <p class="precio">$' . number_format($prod['precio'], 0, ',', '.') . '</p>
          <p class="card-text">' . $prod['descripcion'] . '</p>
          <p>Disponibilidad:' . $prod['disponibilidad'] . '</p>
          <p>Condición:' . $prod['condicion'] . '</p>
          <p>Marca:' . $prod['nom_marca'] . '</p>
          <p>Puntaje:' . $prod['0'] . '</p>
          
          <a href="#" class="btn btn-danger">Comprar</a>
          <a href="index.php?section=commentary&id=' . $prod['id_producto'] . '" class="btn btn-danger">Comentar</a>
      </div>
    </div>'
      ;
    }
    return $salidaProduct;
}


function printProductByCommentary($prod)
{
    if (!empty($prod)) {
        $salidaProduct = '<div class="col-7 pl-0">
    <div class="card">
      <img src="img/' . $prod['nombre_imagen'] . '" class="card-img-top" alt="...">
    </div> 
    </div>
      <div class="col-5 px-0">
        <div class="card-description">
          <h5 class="card-title">' . $prod['nombre'] . '</h5>
          <p class="precio">$' . number_format($prod['precio'], 0, ',', '.') . '</p>
          <p class="card-text">' . $prod['descripcion'] . '</p>
          <p>Disponibilidad:' . $prod['disponibilidad'] . '</p>
          <p>Condición:' . $prod['condicion'] . '</p>
          <p>Marca:' . $prod['nom_marca'] . '</p>
          <p>Puntaje:' . $prod['0'] . '</p>                  
      </div>
    </div>
    </div>
    <form action="index.php?section=process_commentary" method="POST">
    <div class="col-12 pb-4 px-0 pt-4">
      <div class="card">
             
          <div class="form-group mx-4">
              <label for="email" class="col-sm-2 control-label">eMail</label>
              <div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="">
              </div>
          </div> 

          <div class="form-group mx-4">
            <label class="col-sm-2 control-label">Comentario</label>
            <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="form-check form-check-inline mx-4">
            <label for="checkbox">Rankea este producto:</label>
            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">1</label>
            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio2" value="2">
            <label class="form-check-label" for="inlineRadio2">2</label>
            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio3" value="3">
            <label class="form-check-label" for="inlineRadio3">3</label>
            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio4" value="4">
            <label class="form-check-label" for="inlineRadio4">4</label>
            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio5" value="5">
            <label class="form-check-label" for="inlineRadio5">5</label>
        </div>

        <input name="productoID" type="hidden" value="' . $_GET['id'] . '">
        <button type="submit" class="btn btn-primary my-4">Enviar un comentario</button>

        </div>
        </div>

    
   
   </form>

      
    </div>


    '

      ;
    }
    return $salidaProduct;
}


function printProductByOutstanding($prodByOutstanding)
{
    if (!empty($prodByOutstanding)) {
        $salidaProduct = '';
    
        foreach ($prodByOutstanding as $row) {
            $salidaProduct .= '
        <div class="col-4 mb-5">
        <div class="card" >
          <img src="img/' . $row['nombre_imagen'] . '" class="card-img-top" alt="...">
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

function printBrand($brands, $category)
{
    foreach ($brands as $row) {
        echo '<li><a href="index.php?section=products&cat='. $category . '&marca=' . $row['id_marca'] . '">' . $row['nom_marca'] . '</a></li>';
    }
}

function logueado()
{
    return isset($_SESSION["usuario"]);
}

function is_admin()
{
    if (!logueado()) {
        return false;
    }
    return $_SESSION["usuario"]["perfil"] == "admin";
}

function mensajes()
{
    return isset($_SESSION["estado"]);
}

function notificacion()
{
    if (mensajes()):
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

    unset($_SESSION["estado"]); else:
      $respuesta = false;
    endif;

    echo $respuesta;
}

// Esto tiene que ir en Class Usuarios
function encrypt($clave, $salt)
{
        
  /* concateno el salt con la clave */
    $clave .= $salt;
  
    /* pongo el salt al medio de la contraseña */
    //$clave = substr($clave,0,strlen($clave)/2).$salt.substr($clave,strlen($clave)/2,strlen($clave));
  
    /* para obtener la lista de algoritmos de hash usar hash_algos()*/
    //return md5($clave);
    return hash('md5', $clave);
}


function saveName($nombre)
{
    $nombreImagen = str_ireplace(" ", "_", $nombre);
    return strtolower($nombreImagen);
}
