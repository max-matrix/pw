<?php 
Class Producto{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT id_producto, nombre, precio, descripcion, disponibilidad, ranking
		           FROM producto";
        return $this->con->query($query); 
	}
	
	public function get($id){
	    $query = "SELECT id_producto,nombre,precio,descripcion,disponibilidad, ranking
		           FROM producto WHERE id_producto = ".$id;
        $query = $this->con->query($query); 
			
		$producto = $query->fetch(PDO::FETCH_OBJ);
			/*
			$sql = 'SELECT perfil_id, permiso_id
					  FROM perfil_permisos  
					  WHERE perfil_id = '.$perfil->id;
					  
			foreach($this->con->query($sql) as $permiso){
				$perfil->permisos[] = $permiso['permiso_id'];
			}
			/*echo '<pre>';
			var_dump($perfil);echo '</pre>'; */
            return $producto;
	}

	public function del($id){
		$query = 'SELECT count(1) as cantidad FROM usuarios_perfiles WHERE perfil_id = '.$id;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = "DELETE FROM perfil WHERE id = ".$id."; 
					  DELETE FROM perfil_permisos WHERE perfil_id = ".$id.";";

			return $this->con->exec($query); 
		}
		return 'Perfil asignado a un usuario';
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
			//var_dump($datos);die();
            $sql = "INSERT INTO producto(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
            $this->con->exec($sql);
			$id = $this->con->lastInsertId();
			   			
			$sql = '';
			foreach($data['permisos'] as $permisos){
				$sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
							VALUES ('.$id.','.$permisos.');';
			}
			//echo $sql;die();

 			$this->con->exec($sql);
	} 
	
	

	
	public function edit($data){
			$id = $data['id'];
			unset($data['id']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE producto SET ".implode(',',$columns)." WHERE id = ".$id;
            //echo $sql; die();
            $this->con->exec($sql);
			
			 
			 
			$sql = 'DELETE FROM perfil_permisos WHERE perfil_id= '.$id;
			$this->con->exec($sql);
			
			$sql = '';
			foreach($data['permisos'] as $permisos){
				$sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
							VALUES ('.$id.','.$permisos.');';
			}
			$this->con->exec($sql);
			 
	} 
}
?>
