<?php 
Class Marca{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT id_marca, nom_marca, activo
		           FROM marca";
        return $this->con->query($query); 
	}
		
	public function get_por_nom_marca($nom_marca){
		$query = 'SELECT count(1) as cantidad FROM marca WHERE nom_marca = "'.$nom_marca.'"';//ojo, creo que la comilla simple no va
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		return $consulta->cantidad ;
	}
	
	public function get($id_marca){
	    $query = "SELECT id_marca,nom_marca,activo
		           FROM marca WHERE id_marca = ".$id_marca;
        $query = $this->con->query($query); 
			
		$marca = $query->fetch(PDO::FETCH_OBJ);
			
			// $sql = 'SELECT id_marca, nom_marca
			// 		  FROM marca  
			// 		  WHERE id_marca = '.$marca->id_marca;
					  
			// foreach($this->con->query($sql) as $permiso){
			// 	$perfil->permisos[] = $permiso['permiso_id'];
			// }
			// echo '<pre>';
			// var_dump($perfil);echo '</pre>'; 

        return $marca;
	}

	public function del($id_marca){
		$query = 'SELECT count(1) as cantidad FROM usuarios_perfiles WHERE perfil_id = '.$id_marca;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = "DELETE FROM marca WHERE id_marca = ".$id_marca."; 
					  DELETE FROM marca WHERE id_marca = ".$id_marca.";";

			return $this->con->exec($query); 
		}
		return 'Marca asignada a un producto';
	}
	
	/**
	* Guardo los datos en la base de datos
	*/    
	
	public function save($data){
		
            foreach($data as $key => $value){

				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
            // echo "<pre>"; var_dump($data);echo "</pre>";
			// echo "<pre>";var_dump($columns);echo "</pre>";
			// echo "<pre>";var_dump($datos);echo "</pre>";
			
            $sql = "INSERT INTO marca(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			// echo "<pre>";var_dump($sql);echo "</pre>";
			

            $this->con->exec($sql);
			$id_marca = $this->con->lastInsertId();
			//echo "<pre>";var_dump($id_marca);echo "</pre>";
			
			// $sql = '';
			// foreach($data['marcas'] as $marcas){
			// 	$sql .= 'INSERT INTO marca(id_marca,nom_marca) 
			// 				VALUES ('.$id_marca.','.$nom_marca.');';
			// }
			//echo $sql;die();

			// $this->con->exec($sql);
			 
	} 
	
	

	
	public function edit($data){
			$id_marca = $data['id_marca'];
			//echo "<pre>";  var_dump($data); "</pre>"; die();
			unset($data['id_marca']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
			}
            //echo "<pre>";  var_dump($data); "</pre>"; 
            $sql = "UPDATE marca SET ".implode(',',$columns)." WHERE id_marca = ".$id_marca;
            //echo $sql; die();
            $this->con->exec($sql);
		 
			// $sql = 'DELETE FROM marca WHERE id_marca= '.$id_marca;
			// $this->con->exec($sql);
			
			// $sql = '';
			// foreach($data['marcas'] as $marcas){
			// 	$sql .= 'INSERT INTO marca(id_marca,nom_marca) 
			// 				VALUES ('.$id_marca.','.$nom_marca.');';
			// }
			// $this->con->exec($sql);
			 
	} 
}
?>
