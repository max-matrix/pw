<?php

class Product{

    private $con;

    function setProduct($con){
        $this->con = $con;
    }

    public function getProductName(){
        $sql = 'SELECT nombre FROM product';
        return $this->con->query($sql);
    }

}

?>