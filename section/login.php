<?php 
    include_once 'database.php';
    

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;
            case 2:
                header('location: colab.php');

                default:
        }
    }
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = new Database();
            $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE username = :username AND password = :password');
            $query->execute(['username' => $username, 'password' => $password]);

            $row =$query->fetch(PDO::FETCH_NUM);
            if($row == true){
                //validar rol
                $rol = $row[3];
                $_SESSION['rol'] = $rol;
            }else{
                // no existe el usuario
                echo "El usuario o contraseña son incorrectos";
            }
        }

    ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action ="#" method="POST">
        Username: <br/><input type="text" name="username"><br/>
        Password: <br/><input type="text" name="password"><br/>
        <input type="submit" value="Iniciar sesión">
        </form>
    
</body>
</html>