<h1>PDO</h1>
<?php require_once 'mysql-login.php';
    // si levanto mi clase Alumnos: require_once 'classAlumnos.php';
?>
<ol>
    <li>Conectar a la base</li> 

    <?php
        try {        
		    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            print "Conexión exitosa!";
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage();
            die();
        }

    ?>

     <li>SQL - Insert</li>
    
    <?php 
        $sql = "INSERT INTO alumnos(nombre,apellido,email) 
                       VALUES ('Jose','Garcia','jgarcia@test.com'),
                              ('Pedro','Lopez','plopez@test.com'),
                              ('Pablo','Gonzalez','pgonzalez@test.com');";
		//echo $sql;
       $count = $con->exec($sql);
	   if($count > 0 )
			print($count." Filas afectadas");
	   else
			print('ERROR');

    ?>
    
    <li>SQL - UPDATE</li>
    
    <?php 
        $sql = "UPDATE alumnos SET nombre = 'Alejandro' WHERE apellido = 'Garcia';";
        $count = $con->exec($sql);
        print($count." Filas afectadas");


    ?>
    
    <li>SQL - DELETE</li>
    
    <?php 
        $sql = "DELETE FROM alumnos WHERE nombre = 'Pablo'; ";
        $count = $con->exec($sql);
        print($count." Filas afectadas");


    ?>

    <!-- Esto va en un archivo distinto!!

        class Alumnos{

            private $con;

            function Alumnos ($con){
                $this->con = $con;
            }

            public function getList(){
                $sql = 'SELECT' * FROM alumnos;
                return $this->con->query($sql);
            }

        }
    
    -->


    <li>SQL - SELECT </li>
    <?php 

        // Como ya hice mi clase alumnos:
        /*
        $alumnos = new Alumnos($con);
        $resultados = $alumnos->getList();
        */

        $query = "SELECT * FROM alumnos;";
        $resultado = $con->query($query);        
         var_dump($resultado);
        		
    ?>   
            <table border="1">
                <?php foreach ( $resultado /* o directamente pongo el $alumnos->getList() */ as $rows) {
					/*echo '<pre>';
					var_dump($rows);
					echo '</pre>'; die();*/
					?>
                    <tr>
                        <td><?php echo $rows["id_alumno"]?></td>
                        <td><?php echo $rows["nombre"]?></td>
                        <td><?php echo $rows["apellido"]?></td>
                        <td><?php echo $rows["email"]?></td>
                    </tr>
                <?php }?>
            </table>
    <?php  
        $resultado =null;

    ?>
   

    <li>Cerrar Conexión</li>

    <?php 
            $con =null; // Recomendable usarlo si tengo mucho tráfico de datos. Puede dar problemas de concurrencia.
    ?>
</ol>  
