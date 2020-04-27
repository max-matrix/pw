<div class="row">
    <div class="col-3">
        <h2 class="text-center">Filtros</h2>
        <div class="panel-group category-products" id="accordian">
            <div class="panel panel-default">
                <div class="panel-heading panel pl-0">
                    <h4 class="panel-title text-left">

                    <?php
                        function printCategoria($con, $id_padre = 0){
                            $sql = 'SELECT * FROM categoria WHERE id_padre = '.$id_padre;
                            $resultado = $con->query($sql);
                            if(!empty($resultado)){
                                $salida = '<div class="panel-body text-left"><ul class="pl-3">';
                                foreach($resultado as $row){
                                    $salida.='
                                                <li>
                                                    <a href="index.php?section=products&cat='.$row['id_categoria'].'">'.$row['nombre'].'</a>'.
                                                        printCategoria($con,$row['id_categoria']).'
                                                </li>
                                            ';
                                    }
                                    $salida.='</ul></div>';
                                }
                                return $salida;
                        }
                        echo printCategoria($con); 
                    ?>

                </div>
            </div>
        </div>


        <hr>

        <div class="panel-group category-products" id="accordian">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="#">Marcas</a>
                    </h4>
                </div>
                <div id="sportswear"  >
                <div class="panel-body">
                        <ul> 
                        


                    <?php
        
                        function printMarca($con){
                            $sql2 = 'SELECT * FROM marca WHERE id_marca';
                            $resultadoMarca = $con->query($sql2);
                            
                            foreach($resultadoMarca as $row) {
                                echo '<li><a href="index.php?section=products&marca='.$row['id_marca'].'">'.$row['nombre'].'</a></li>';
                            }
                        }
                        echo printMarca($con); 
                    ?>

                        </ul>
                    </div>

                    
                </div>
            </div>
        </div>

    </div>
    <div class="col-9">
        <h2 class="text-center">Productos</h2>
            <div class="row">

                <?php

                
                        // sin signo "!" ambas vacias
                    if(!empty($_GET['marca'])){
                        function printProduct($con){
                            $sqlProductMarca = 'SELECT * FROM producto WHERE id_marca = '.$_GET['marca'];
                            $resultadoProduct = $con->query($sqlProductMarca);
                            if(!empty($resultadoProduct)){
                            $salidaProduct = '';
                                foreach($resultadoProduct as $row){   
    
                                $salidaProduct.='
    
                                    <div class="col-4">
                                        <div class="card">
                                            <img src="img/'.$row['nombre_imagen'].'.jpg" class="card-img-top" alt="...">
                                            <div class="card-body text-center">                                     
                                                <h5 class="card-title">'.$row['nombre'].'</h5>
                                                <p class="card-text">'.$row['descripcion'].'</p>
                                            </div>
                                            <div class="card-body text-center text-center">
                                                <a href="index.php?section=detail&id='.$row['id_producto'].'" class="card-link ">Detalle</a>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                }
                                $salidaProduct.='';
                            }
                            return $salidaProduct;
                        }
                        echo printProduct($con);
                    }elseif(!empty($_GET['cat']) ) {
                        function printProduct($con){
                            $sqlProductCat = 'SELECT * FROM producto WHERE id_categoria = '.$_GET['cat'];
                            $resultadoProduct = $con->query($sqlProductCat);
                            if(!empty($resultadoProduct)){
                            $salidaProduct = '';
                                foreach($resultadoProduct as $row){   
    
                                $salidaProduct.='
    
                                    <div class="col-4">
                                        <div class="card">
                                            <img src="img/'.$row['nombre_imagen'].'.jpg" class="card-img-top" alt="...">
                                            <div class="card-body text-center">                                     
                                                <h5 class="card-title">'.$row['nombre'].'</h5>
                                                <p class="card-text">'.$row['descripcion'].'</p>
                                            </div>
                                            <div class="card-body text-center text-center">
                                                <a href="index.php?section=detail&id='.$row['id_producto'].'" class="card-link ">Detalle</a>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                }
                                $salidaProduct.='';
                            }
                            return $salidaProduct;
                        }
                        echo printProduct($con);
                    }else {
                        function printProduct($con){
                            $sqlProduct = 'SELECT * FROM producto';
                            $resultadoProduct = $con->query($sqlProduct);
                            if(!empty($resultadoProduct)){
                            $salidaProduct = '';
                                foreach($resultadoProduct as $row){   
    
                                $salidaProduct.='
    
                                    <div class="col-4">
                                        <div class="card">
                                            <img src="img/'.$row['nombre_imagen'].'.jpg" class="card-img-top" alt="...">
                                            <div class="card-body text-center">                                     
                                                <h5 class="card-title">'.$row['nombre'].'</h5>
                                                <p class="card-text">'.$row['descripcion'].'</p>
                                            </div>
                                            <div class="card-body text-center text-center">
                                                <a href="index.php?section=detail&id='.$row['id_producto'].'" class="card-link ">Detalle</a>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                }
                                $salidaProduct.='';
                            }
                            return $salidaProduct;
                        }
                        echo printProduct($con);
                    }

                   
                    
                ?>
            </div>    
    </div>     
</div>