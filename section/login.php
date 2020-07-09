<?php
if (logueado()) :
    header("Location:index.php");
endif;
?>
<div class="slider wrapper-login">

  <div class="container separator">
    <div class="row align-items-center">
      <div class="col-4 offset-1 text-center card-login px-4 pt-2">
        <h2>TECHNLOGY</h2>
        <p>Dónde el futuro se hace realidad</p>
      </div>
      <div class="col-6 offset-1">
        <div class="row justify-content-center mt-4">
          <div class="col-12">
            <h1 class="text-center h2 white">INICIAR SESIÓN</h1>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card mb-4 card-login">
              <div class="card-body">
                <form action="admin/index.php?section=products" method="post">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder=""
                      value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>">
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
      </div>
    </div>
  </div>
</div>