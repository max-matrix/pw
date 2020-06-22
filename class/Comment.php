<?php

class Comment{

    /*conexion a la base*/
	private $con;	
	public function __construct($con){
		$this->con = $con;
	}

    /* Obtengo todos los comentarios */
	public function getCommentariesByProductID($IdProduct) {	
		$query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com, activo
                   FROM comentario WHERE id_prod_com = $IdProduct ";
                   
        

        return $this->con->query($query);
	}

}
 
    

?>