<?php

class Brand{

    private $con;

    function setBrand($con){
        $this->con = $con;
    }

    public function getProductName(){
        $sql = 'SELECT nombre FROM product';
        return $this->con->query($sql);
    }

}

?>