<?php
// cambia require por require_once, ya que impide la carga de un mismo fichero varias veces
require_once('barras_navegacion/header.php'); 
?>

<div class="container-fluid">

  <?php $marcasMenu = 'Marcas';
  // cambiar por require_once
  require_once('barras_navegacion/side_bar.php');
    
    $marca = new Marca($con);
    
    $query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);
    
    if (isset($_GET['edit'])) {
        $marcas = $marca->get($_GET['edit']);
        $titulo = 'Modificar Marca';
    }
    else
    {
      $titulo = 'Nueva Marca';
    }
    ?>


  <div class="col-sm-9 col-md-10 main">

    <!--toggle sidebar button-->
    <p class="visible-xs">
      <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
    </p>

    <h1 class="page-header">
        <? echo $titulo ?>
    </h1>

    <div class="col-md-2"></div>

    <form action="marcas.php" method="post" class="col-md-6 from-horizontal">
    
      <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nombre" name="nom_marca" placeholder=""
            value="<?php echo(isset($marcas->nom_marca)?$marcas->nom_marca:'');?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-warning" name="formulario_marcas">Guardar</button>
        </div>
      </div>
      <input type="hidden" class="form-control" id="id" name="id_marca" placeholder=""
        value="<?php echo(isset($marcas->id_marca)?$marcas->id_marca:'');?>">

    </form>
  </div>


</div>
<!--/row-->
</div>
</div>
<!--/.container-->

<?php include('barras_navegacion/footer.php');?>
