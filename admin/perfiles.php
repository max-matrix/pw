<?php 
require('barras_navegacion/header.php'); 
?> 

<div class="container-fluid">
      
      <?php $perfilMenu = 'Perfiles';
	  
	 $perfiles = new Perfil($con);
	include('barras_navegacion/side_bar.php');
	 
	 
	if(isset($_POST['formulario_perfiles'])){ 
	    if($_POST['id'] > 0){
                $perfiles->edit($_POST);                
	    }else{			
                $perfiles->save($_POST); 
        }
		
		header('Location: perfiles.php');
	}	
	 
	if(isset($_GET['del'])){
			$resp = $perfiles->del($_GET['del']) 	;
            if($resp == 1){
				header('Location: perfiles.php');	
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
            Perfiles
          </h1> 

		  <h2 class="sub-header">Listado <a href="perfiles_abm.php"><button type="button" class="btn btn-success btn-lg" title="Agregar">Agregar</button></a></h2>
		  
		  
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
					foreach($perfiles->getList() as $perfil){?>
              
						<tr>
						  <td><?php echo $perfil['id'];?></td>
						  <td><?php echo $perfil['nombre'];?></td> 
						  <td>
						      <a href="perfiles_abm.php?edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
							  <a href="perfiles.php?del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">Eliminar</button></a>
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