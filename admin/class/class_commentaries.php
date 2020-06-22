<?php
class Comentario
{

    /*conexion a la base*/
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }

    /* Obtengo todos los comentarios */
    public function getList()
    {
        $query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com,email, activo
		           FROM comentario";
        return $this->con->query($query);
    }
    
    public function get($id_comentario)
    {
        $query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com,email, activo
		           FROM comentario WHERE id_comentario = ".$id_comentario;
        $query = $this->con->query($query);
            
        $comentario = $query->fetch(PDO::FETCH_OBJ);

        return $comentario;
    }


    /* obtengo un comentario */
    public function getComByProduct($id)
    {
        $query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com,email, activo
		           FROM comentario WHERE id_prod_com = ".$id;
        return $this->con->query($query);
    }

    public function getActivos()
    {
        $query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com,email, activo
		           FROM comentario WHERE activo = 0";
        return $this->con->query($query);
    }

    public function getInactivos()
    {
        $query = "SELECT id_comentario, comentario, id_prod_com, id_us_com, ip_us_com, fecha_us_com, puntaje_us_com,email, activo
		           FROM comentario WHERE activo = 1";
        return $this->con->query($query);
    }

        
    /* Guardo los datos en la base de datos	*/
    public function save($data)
    {
        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                if ($value != null) {
                    $columns[]=$key;
                    $datos[]=$value;
                }
            }
        }
        //var_dump($datos);die();
        $sql = "INSERT INTO comentario(".implode(',', $columns).") VALUES('".implode("','", $datos)."')";
        //echo $sql;die();
            
        $this->con->exec($sql);
        $id_comentario = $this->con->lastInsertId();
    }
    
    /* Actualizo los datos en la base de datos */
    public function edit($data)
    {
        $id_comentario = $data['id_comentario'];
        unset($data['id_comentario']);
            
        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                if ($value != null) {
                    $columns[]=$key." = '".$value."'";
                }
            }
        }
        $sql = "UPDATE comentario SET ".implode(',', $columns)." WHERE id_comentario = ".$id_comentario;
        //echo $sql; die();
        $this->con->exec($sql);
    }
}
