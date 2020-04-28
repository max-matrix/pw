<?php

class Product{

    private $con;

    function __construct($con){
        $this->con = $con;
    }

    public function getProduct(){
        $sql = 'SELECT * FROM producto ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }

    public function getProductImportant(){
        $sql = 'SELECT * FROM producto WHERE prod_destacado = "1" ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }
    
    public function getProductByOutstanding(){
        $sql = 'SELECT * FROM producto ORDER BY ranking DESC LIMIT 6';
        return $this->con->query($sql);
    }


    public function getProductByCategory($category){
        $sql = 'SELECT * FROM producto WHERE id_categoria = ' . $category. ' ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }

    public function getProductByBrand($brand){
        $sql = 'SELECT * FROM producto WHERE id_marca = ' . $brand . ' ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }

    public function getProductByCategoryAndBrand($category, $brand) {
        $sql = 'SELECT * FROM producto WHERE id_marca = ' . $brand . ' AND id_categoria = ' . $category . ' ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
        
    }
}

?>