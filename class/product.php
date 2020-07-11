<?php

class Product{

    private $con;

    function __construct($con){
        $this->con = $con;
    }

    public function getProduct(){ // para ver SOLO PRODUCTOS ACTIVOS desde seccion PRODUCTOS (tanto de producto como marca)
        $sql = 'SELECT producto.* FROM producto
        inner join categoria on producto.id_categoria = categoria.id_categoria
        inner join marca on producto.id_marca = marca.id_marca 
        WHERE producto.activo = "1" AND marca.activo = "1" ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }

    public function getProductByID($id){
        $sql = $this->con->prepare('SELECT * FROM producto INNER JOIN marca ON producto.id_marca = marca.id_marca WHERE id_producto='. $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
   
    

    public function getProductImportant(){// para ver en NUESTRA SELECCION (DESTACADOS) activos (tanto porducto como marca)
        $sql = 'SELECT producto.* FROM producto 
        inner join categoria on producto.id_categoria = categoria.id_categoria
        inner join marca on producto.id_marca = marca.id_marca        
        WHERE producto.prod_destacado = "1" AND producto.activo = "1" AND marca.activo = "1" ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }
    
    public function getProductByOutstanding(){
        $sql = 'SELECT * FROM producto ORDER BY ranking DESC LIMIT 6';
        return $this->con->query($sql);
    }

    public function getProductByRandom(){// para ver en HOME activos (tanto porducto como marca)
        $sql = 'SELECT producto.* FROM producto 
        inner join categoria on producto.id_categoria = categoria.id_categoria
        inner join marca on producto.id_marca = marca.id_marca        
        WHERE producto.activo = "1" AND marca.activo = "1" ORDER BY RAND() LIMIT 6';
        return $this->con->query($sql);
    }


    public function getProductArrayByOutstanding(){
        $sql = $this->con->prepare('SELECT * FROM producto ORDER BY ranking DESC LIMIT 6');
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getPromedioByID($id){
        $comentarios = $this->con->prepare('SELECT AVG(puntaje_us_com) FROM comentario WHERE activo = 1 AND id_prod_com='. $id );
        
        $comentarios->execute();
        $result = $comentarios->fetch(PDO::FETCH_BOTH);
        return $result[0];
    }


    public function getProductByCategory($category){ //para ver SOLO PRODUCTO ACTIVO DESDE PRODUCTO (CATEGORIAS)       
        $sql = 'SELECT producto.*  from producto 
        inner join categoria on producto.id_categoria = categoria.id_categoria
        inner join marca on producto.id_marca = marca.id_marca 
        where producto.id_categoria = ' . $category. ' AND producto.activo = "1" AND marca.activo = "1"  AND categoria.activo = "1"  or categoria.id_padre = ' . $category. '  ORDER BY nombre ' .$_SESSION['orden'];

        return $this->con->query($sql);

       /*  $sql = 'SELECT * FROM producto WHERE id_categoria = ' . $category . ' AND activo = "1" ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql); */

    }

    public function getProductByBrand($brand){
        $sql = 'SELECT * FROM producto WHERE id_marca = ' . $brand . ' AND activo = "1" ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
    }

    public function getProductByCategoryAndBrand($category, $brand) {
        $sql = 'SELECT * FROM producto WHERE id_marca = ' . $brand . ' AND id_categoria = ' . $category . ' AND activo = "1"  ORDER BY nombre ' .$_SESSION['orden'];
        return $this->con->query($sql);
        
    }
}

?>