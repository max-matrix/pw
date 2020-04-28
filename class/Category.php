<?php

class Category{

    private $con;

    function setCategory($con){
        $this->con = $con;
    }

    public function getProductName(){
        $sql = 'SELECT nombre FROM product';
        return $this->con->query($sql);
    }

}

?>