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
                <form action="#" method="post">
                <!-- ACTIVAR CUANDO ESTÉ HECHO REGISTER.PHP (FUNCTION)
                <form action="function/register.php" method="post">
                -->
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
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Registrate</button>
                </form>
            </div>
        </div>    
    </div>
</div>