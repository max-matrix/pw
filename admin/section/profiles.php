<?php
require_once('../class/user.php');
require_once('../class/profile.php');
require_once('../class/user_type.php');
?>
<div class="container-fluid">
      
    <?php $perfilMenu = 'Perfiles';
		$perfiles = new Perfil($con);
	 
		if(isset($_POST['formulario_perfiles'])){ 
			if($_POST['id'] > 0){
					$perfiles->edit($_POST);                
			}else{			
					$perfiles->save($_POST); 
			}
			header('Location: section/profiles.php');
		}	
		
		if(isset($_GET['del'])){
				$resp = $perfiles->del($_GET['del']) 	;
				if($resp == 1){
					header('Location: section/profiles.php');	
				}
				echo '<script>alert("'.$resp.'");</script>';
		}
    ?>	  
        
        <div class="col-sm-12 col-md-12 main">
                    
		  <h1 class="page-header">
            Perfiles
          </h1> 

		  <h2 class="sub-header">Listado <a href="index.php?section=profiles_ae"><button type="button" class="btn btn-success btn-lg" title="Agregar">Agregar</button></a></h2>
		  
		  
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
						      <a href="index.php?section=profiles?edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info btn-lg" title="Modificar">Modificar</button></a>
							  <a href="index.php?section=profiles.php?del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger btn-lg" title="Borrar">Eliminar</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>  
      	</div>
	</div>
</div>