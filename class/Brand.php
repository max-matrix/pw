<?php
class Brand{

    private $con;

    function __construct($con){
        $this->con = $con;
    }

    public function getBrands(){
        $sql = 'SELECT * FROM marca WHERE activo = "1"';
        return $this->con->query($sql);
    }

}

?>