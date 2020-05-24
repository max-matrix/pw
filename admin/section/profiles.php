<?php
require_once('class/user.php');
require_once('class/profile.php');
require_once('class/user_type.php');
?>

<div class="container my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <h1 class="text-left">Perfiles</h1>
        </div>      
    </div>

	<div class="row justify-content-center">

		<?php $perfilMenu = 'Perfiles';
			$perfiles = new Perfil($con);
		
			if(isset($_POST['formulario_perfiles'])){ 
				if($_POST['id'] > 0){
						$perfiles->edit($_POST);                
				}else{			
						$perfiles->save($_POST); 
				}
				header('index.php?section=profiles');
			}	
			
			if(isset($_GET['del'])){
					$resp = $perfiles->del($_GET['del']) 	;
					if($resp == 1){
						header('index.php?section=profiles');	
					}
					echo '<script>alert("'.$resp.'");</script>';
			}
		?>	 

		<div class="col-12">
			<h2 class="sub-header text-left"> 
				<a href="index.php?section=profiles_abm"><button type="button" class="btn btn-success btn-md" title="Agregar">Agregar Perfil</button></a></h2>
			<table class="table table-striped">
				<thead>
					<tr class="font-weight-bold h5 text-center">
						<th>#</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody> 
					<?php  	 
						foreach($perfiles->getList() as $perfil){
					?>
					<tr>
						<td class="font-weight-bold"><?php echo $perfil['id'];?></td>
						<td><?php echo $perfil['nombre'];?></td> 
						<td>
							<a href="index.php?section=profiles_abm&edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info btn-md" title="Modificar">Modificar</button></a>
							<a href="index.php?section=profiles&del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger btn-md" title="Borrar">Eliminar</button></a>
						</td>
					</tr>
					<?php }?>      
				</tbody>
			</table>
		</div>	
	</div>
</div>