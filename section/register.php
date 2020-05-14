<?php
    if(logueado()):
        header("Location:index.php");
    endif;
?>

<div class="row justify-content-center mt-4">
    <div class="col-6">
        <h1 class="text-center h2">¡Registrate!</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-6 mt-3">
        <div class="card mb-4">
            <div class="card-body">
                <form action="function/register.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingrese su nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"  placeholder="Ingrese su apellido">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese su usuario">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  placeholder="Ingrese su email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="************">
                    </div>
                    <div class="form-group">
                        <label for="password">Palabra Secreta</label>
                        <input type="password" class="form-control" name="salt" id="salt" placeholder="************">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Registrate</button>
                </form>
            </div>
        </div>    
    </div>
</div>