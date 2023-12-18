<?php
include("db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/images.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/stylesession.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Registrarse</title>  
</head>
<body>
    <header class="ca">
        <a href='index.php'><img src="assets/images/images.png"></a>
        <h1>TESERIX</h1>
    </header>
    <div class="formulario">
        <form action="registro.php" method="POST">
            <h1>Registrarse</h1>
            <input class="input" type="text" name="username" placeholder="Nombre de Usuario" required><br>
            <input class="input" type="number" name="document" placeholder="Documento" required><br>
            <input class="input" type="password" name="password" placeholder="Contraseña" required><br>
            <input class="input" type="password" name="confirm_password" placeholder="Confirmar contraseña" required><br>
            <input class="input" type="text" name="email" placeholder="Correo Electronico" required><br>  
            <input class="enviar"type="submit" value="Registrar" name="registrar"><br>
            <a href="login.php">Ya tienes un usuario?</a>
        </form>
    </div>
    <div class="errores">
        <?php
        if (isset($_POST['registrar'])) {
            $email = $_POST['email'];
            $emailQuery = "SELECT email FROM usuarios WHERE email = '$email '";
            $emailInUse = mysqli_num_rows(mysqli_query($conexion, $emailQuery));
            
            if ($emailInUse >= 1) {
                echo "Email ya en uso.";
            } else {
                $usuario = $_POST['username'];
                $contrasenia = $_POST['password'];
                $document= $_POST['document'];
                $token = time();
                
                $password = password_hash($contrasenia, PASSWORD_BCRYPT);
                
                
                $sql = "INSERT INTO usuarios (username, password, document, email, token) VALUES ('$usuario', '$password', '$document', '$email', '$token')";
                $insertar = mysqli_query($conexion, $sql);
                if ($insertar) {
                ?>
<script>
                    let url_final = 'http://formsubmit.co/ajax/<?php echo $email; ?>'
                    let usuario = '<?php $registro['Nbr_u']; ?>';
                    let mensaje = 'valide su correo: http://localhost/proyecto-final-teserix/registro.php?token=<?php echo $token; ?>';
         
         
                    $.ajax({
                        method: 'POST',
                        url: url_final,
                        dataType: 'json',
                        accepts: 'application/json',
                        data:{
                            name: usuario,
                            message: mensaje,
                        },
                        success: (data) => window.location = 'registro.php?send=1',
                        error: (err) => window.location='registro.php?send=0',
                    });
                    
            
        
                    </script>
                <?php
                } else {
                    echo 'Error al registrar usuario.';
                }
            }
        }
                
?>
 
    
                <?php
                

        if (isset($_GET['send'])) {
            if ($_GET['send'] == 1) {
                echo 'Correo enviado, por favor valide';
            } else {
                echo 'Error al enviar el correo de validación';
            }
        }

        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $sql = "SELECT * FROM usuarios WHERE token = '$token'";
            $consulta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($consulta) > 0) {
                $registro = mysqli_fetch_assoc($consulta);
                $_SESSION['username'] = $registro['username'];
                $sql = "UPDATE usuarios SET token = 1 WHERE token = '$token'";
                $actualizar = mysqli_query($conexion, $sql);
                echo 'Usuario validado, ya puede iniciar sesión';
                echo '<a href="login.php">iniciar sesion</a>';
                // header("location: login.php");
            } else {
                echo 'El token no existe';
                session_destroy();
                header("location: registro.php");
            }
        }
        ?>
    </div>
</body>
</html>