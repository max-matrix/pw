<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Productos</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">TECHNOLOGY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contacto</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="¿Qué desea buscar?" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </div>
          </nav>
    </div>




<div class="wrapper container">
<div class="row">
<div class="col-3">
<h2 class="text-center">Filtros</h2>
<hr>
<div class="panel-group category-products" id="accordian">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
    <a href="#">TV</a>
</h4>
</div>
<div id="sportswear"  >
<div class="panel-body">
    <ul> 
<li><a href="#">32</a></li>
<li><a href="#">42</a></li>
</ul>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a href="#">Informatica</a>
</h4>
</div>
<div id="sportswear"  >
<div class="panel-body">
    <ul> 
<li><a href="#">Monitores</a></li>
<li><a href="#">Microprocesador</a></li>
<li><a href="#">Motherboard</a></li>
</ul>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a href="#">Celulares</a>
</h4>
</div>
<div id="sportswear">
<div class="panel-body">
    <ul> 
        <li><a href="#">Android</a></li>
        <li><a href="#">IPhone</a></li>
    </ul>
</div>
</div>
</div>
</div>
</div>
<div class="col-9">
  <div class="row">
    


    <?php

function printProduct($con){
    $sqlProduct = 'SELECT * FROM producto WHERE id_producto = $_GET['id']';
    $resultadoProduct = $con->query($sqlProduct);
    if(!empty($resultadoProduct)){
    $salidaProduct = '';
        foreach($resultadoProduct as $row){   

        $salidaProduct.='
        <div class="col-6">


        <div class="card">
        <img src="img/101.jpg" class="card-img-top" alt="...">
      </div> 
    </div>
    <div class="col-4">
      <div class="card-description">
        <h5 class="card-title">Producto 1</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
        <p>Disponibilidad: 10</p>
        <p>Condición: Nuevo</p>
        <p>Marca: EXO</p>
        <a href="#" class="btn btn-danger">Comprar</a>
      </div>
    </div>




        </div>
            ';
        }
        $salidaProduct.='';
    }
    return $salidaProduct;
}
echo printProduct($con);

?>


     
  
  
  
</div>


</div>
        
</div>

    <footer class="container-fluid fixed-bottom">
        <p>Copyright © 2020 TECHNOLOGY Inc. All rights reserved.</p>

    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>