<?php
        try {        
		    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            /* print "Conexión exitosa!"; */
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage();
            die();
        }

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$area = $_POST['area'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO dato(nombre,apellido,email,telefono,area,comentario) 
               VALUES ('$nombre','$apellido','$email','$telefono','$area','$comentario');";
               /* echo $sql; */
       $count = $con->exec($sql);
	  /*  if($count > 0 )
			print($count." Filas afectadas");
	   else
            print('ERROR'); */
            
?>

<div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-6">
                 <h1 class="text-center">Contacto</h1>

                <div class="card">
                    <div class="card-body">
                        <p>Muchas gracias por contactarte con nosotros, sus datos han sido enviado correctamente y en breve recibirá novedades de su interés.<br>Atte: staff de Technology.</p>
                        <button type="submit" class="btn btn-light btn-block">   
                <a href="index.php">Volver al index</a>
            </button>             
                    </div>
                </div>

            </div>
        </div>
    </div>



