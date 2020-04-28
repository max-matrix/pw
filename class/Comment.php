<?php

class Comment{

    private $con;

    function setComment($con){
        $this->con = $con;
    }

    public function getProductName(){
        $sql = 'SELECT nombre FROM product';
        return $this->con->query($sql);
    }

}

?>