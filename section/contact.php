<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Contacto</title>
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
                  <a class="nav-link" href="products.html">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
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
            <div class="col-9">
                <h2>Escribinos</h2>
                <hr>

                <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nombre</label>
                        <input type="email" class="form-control" id="inputName" placeholder="Escribí tu nombre">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLastname">Apellido</label>
                        <input type="password" class="form-control" id="inputLastname" placeholder="Escribí tu apellido">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail">Email</label>
                      <input type="text" class="form-control" id="inputEmail" placeholder="Escribí tu dirección">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Teléfono</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Escribí tu teléfono">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Area</label>
                        <select id="inputState" class="form-control">
                          <option selected>Elegí Area...</option>
                          <option>Administración</option>
                          <option>Comercial</option>
                          <option>Ventas</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentario</label>
                        <textarea placeholder="Dejanos tu comentario acá" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </form>


            </div>
            <div class="col-3">
                <h2>Info de Contacto</h2>
                <hr>


            </div>
            

            
        </div>
    </div>





    <footer class="container-fluid">
        <p>Copyright © 2020 TECHNOLOGY Inc. All rights reserved.</p>

    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>