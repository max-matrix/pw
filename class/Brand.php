<?php
class Brand{

    private $con;

    function __construct($con){
        $this->con = $con;
    }

    public function getBrands(){
        $sql = 'SELECT * FROM marca WHERE id_marca';
        return $this->con->query($sql);
    }

}

?>