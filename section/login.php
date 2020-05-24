
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
                <form action="admin/index.php?section=products" method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>">  
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="**********"> 
                    </div>
                    <button type="submit" class="btn btn-info btn-block" name="login">Ingresar</button>

                </form>
            </div>
        </div>    
    </div>
</div>