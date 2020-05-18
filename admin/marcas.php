<?php 
require('barras_navegacion/header.php');
?> 

<div class="container-fluid">
      
	  <?php $marcasMenu = 'Marcas';
	  
	  $marcas = new Marca($con);
	include('barras_navegacion/side_bar.php');


	if(isset($_POST['formulario_marcas'])){ 
	    if($_POST['id'] > 0){
                $marcas->edit($_POST);                
	    }else{			
                $marcas->save($_POST); 
        }
		
		header('Location: marcas.php');
	}	
	 
	if(isset($_GET['del'])){
			$resp = $marcas->del($_GET['del']) 	;
            if($resp == 1){
				header('Location: marcas.php');	
			}
			echo '<script>alert("'.$resp.'");</script>';

	}

        ?>
	          
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Marcas
          </h1>
 
          <h2 class="sub-header">Listado <a href="marcas_abm"><button type="button" class="btn btn-success btn-lg" title="Agregar">Agregar</button></a></h2>
		

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>				
                  <th>Acciones</th>                  
                </tr>
              </thead>
			  <tbody>       
			    <?php  	 
					foreach($marcas->getList() as $marca){?>
              
						<tr>
						  <td><?php echo $marca['id_marca'];?></td>
						  <td><?php echo $marca['nom_marca'];?></td> 						 
						  <td>
						      <a href="marcas_abm.php?edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
							  <a href="marcas.php?del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('barras_navegacion/footer.php');?>