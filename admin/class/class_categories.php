<?php 
Class Categoria{

    /*conexion a la base*/
	private $con;	
	public function __construct($con){
		$this->con = $con;
	}

	/* Obtengo todos las categorias */
	public function getList2(){
		$query = "SELECT id_categoria, nombre, id_padre, activo 
		           FROM categoria";
        return $this->con->query($query); 
	}

	public function getList(){
		$query =  "SELECT categoria.*, cat.nombre as padre 
				   FROM `categoria` 
				   left join categoria cat on (cat.id_categoria = categoria.id_padre)";
        return $this->con->query($query); 
	}


	/* busco en la bd que no se repita el nombre */
	public function get_por_nombreCategoria($nombre, $id_categoria){ 
		$query = 'SELECT count(1) as cantidad FROM categoria WHERE nombre = "'.$nombre.'" AND id_categoria != "'.$id_categoria.'"';
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		return $consulta->cantidad ;
	}


	/* obtengo una categoria */
	public function get($id_categoria){
	    $query = "SELECT id_categoria,nombre,id_padre,activo
		           FROM categoria WHERE id_categoria = ".$id_categoria;
        $query = $this->con->query($query); 
			
		$categoria = $query->fetch(PDO::FETCH_OBJ);
			
			// $sql = 'SELECT id_categoria, nombre
			// 		  FROM categoria  
			// 		  WHERE id_categoria = '.$categoria->id_categoria;
					  
			// foreach($this->con->query($sql) as $permiso){
			// 	$perfil->permisos[] = $permiso['permiso_id'];
			// }
			// echo '<pre>';
			// var_dump($perfil);echo '</pre>'; 
        return $categoria;
	}

	/* borrado de categoria */	
	public function del($id_categoria){
		$query = 'SELECT count(1) as cantidad FROM usuarios_perfiles WHERE perfil_id = '.$id_categoria;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = "DELETE FROM categoria WHERE id_categoria = ".$id_categoria."; 
					  DELETE FROM categoria WHERE id_categoria = ".$id_categoria.";";

			return $this->con->exec($query); 
		}
		return 'Categoria asignada a un producto';
	}
	
	/* Guardo los datos en la base de datos	*/   	
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
			
        $sql = "INSERT INTO categoria(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
		// echo "<pre>";var_dump($sql);echo "</pre>";
		
        $this->con->exec($sql);
		$id_categoria = $this->con->lastInsertId();
		//echo "<pre>";var_dump($id_categoria);echo "</pre>";
			
		// $sql = '';
		// foreach($data['categorias'] as $categorias){
		// 	$sql .= 'INSERT INTO categoria(id_categoria,nombre) 
		// 				VALUES ('.$id_categoria.','.$nombre.');';
		// }
		//echo $sql;die();

 		// $this->con->exec($sql);
	} 
	
	/* Actualizo los datos en la base de datos */
	public function edit($data){
		$id_categoria = $data['id_categoria'];
		//echo "<pre>";  var_dump($data); "</pre>"; die();
		unset($data['id_categoria']);
            
        foreach($data as $key => $value){
			if(!is_array($value)){
				if($value != null){	
					$columns[]=$key." = '".$value."'"; 
				}
			}
		}
        //echo "<pre>";  var_dump($data); "</pre>"; 
        $sql = "UPDATE categoria SET ".implode(',',$columns)." WHERE id_categoria = ".$id_categoria;
        //echo $sql; die();
        $this->con->exec($sql);
		 
		// $sql = 'DELETE FROM categoria WHERE id_categoria= '.$id_categoria;
		// $this->con->exec($sql);
			
		// $sql = '';
		// foreach($data['categorias'] as $categorias){
		// 	$sql .= 'INSERT INTO categoria(id_categoria,nombre) 
		// 				VALUES ('.$id_categoria.','.$nombre.');';
		// }
		// $this->con->exec($sql);			 
	} 
}
?>
