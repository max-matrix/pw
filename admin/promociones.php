<?php 
require('barras_navegacion/header.php');
?> 

<div class="container-fluid">
      
      <?php $promoMenu = 'Promociones';
	include('barras_navegacion/side_bar.php');
	 

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            <?php echo $promoMenu?>
          </h1>
 

          <h2 class="sub-header">Listado <a href="#"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Activa</th> 
				  <th>Acciones</th>
                </tr>
              </thead>
			  <tbody> 
              
						<tr>
						  <td>1</td>
						  <td>2x1 SSD</td>
						  <td>26/04/2018</td>
						  <td>Sí</td> 
						  <td>
						      <a href="#"><button type="button" class="btn btn-info" title="Modificar">Modificar</button></a>
							  <a href="#"><button type="button" class="btn btn-danger" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>
						<tr>
						  <td>1</td>
						  <td>2x1 SSD</td>
						  <td>26/04/2018</td>
						  <td>Sí</td> 
						  <td>
						      <a href="#"><button type="button" class="btn btn-info" title="Modificar">Modificar</button></a>
							  <a href="#"><button type="button" class="btn btn-danger" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>
						<tr>
						  <td>1</td>
						  <td>2x1 SSD</td>
						  <td>26/04/2018</td>
						  <td>Sí</td> 
						  <td>
						      <a href="#"><button type="button" class="btn btn-info" title="Modificar">Modificar</button></a>
							  <a href="#"><button type="button" class="btn btn-danger" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>         
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('barras_navegacion/footer.php');?>