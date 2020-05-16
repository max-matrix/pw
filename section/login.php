
<?php
    if(logueado()):
        header("Location:index.php");
    endif;
?>

<div class="row justify-content-center mt-4">
    <div class="col-6">
        <h1 class="text-center h2">Iniciar Sesión</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <form action="admin/index.php" method="post">
                <!-- ACTIVAR CUANDO ESTÉ HECHO LOGIN.PHP (FUNCTION)
                <form action="function/login.php" method="post">
                -->
                    <div class="form-group">
                        <label for="usuario">Usuario o Email</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese su usuario o email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Ingresar</button>
                </form>
            </div>
        </div>    
    </div>
</div>