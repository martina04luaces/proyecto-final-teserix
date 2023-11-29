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
    <title>Iniciar Sesion</title>
</head>
<body>
    <header class="ca"> 
        <a href='index.php'><img src="assets/images/images.png"></a>
        <h1>TESERIX</h1>
    </header>
    <div class="formulario">
        <form action="login.php" method="POST" >
            <?php
                if(isset($_GET['senial'])){
                    echo '<div style="margin-bottom: 3%;" class="error-sesion"><svg style="margin-right: 3px;" aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>Ingrese para utilizar el carrito</div>';
                }
                if(isset($_GET['senial_2'])){
                    echo '<div style="margin-bottom: 3%;" class="error-sesion"><svg style="margin-right: 3px;" aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>Su informacion de sesión ha cambiado, por favor inicie sesion nuevamente.</div>';
                }
            ?>
            <h1>Iniciar Sesion</h1>
            <input class="input" type="text" id="username" name="username" placeholder="Usuario" required> <br>
            <input class="input" type="password" id="password" name="password" placeholder="Contraseña" required> <br>
            <input class="enviar" type="submit" value="Enviar" name="Enviar"> <br>
            <a href="registro.php">No tienes un usuario?</a>
        </form> 
    </div>
    <div class="errores">
        <?php
            if(isset($_POST['Enviar'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "SELECT * FROM usuarios WHERE username = '$username'";
                $result = mysqli_query($conexion, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row['password'])) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['ID_user'] = $row['id_usuario'];
                        header("location:index.php");
                    } 
                    else {
                        echo "Contraseña incorrecta.";
                    }
                } 
                else {
                    echo "Usuario no encontrado.";
                }
            }
        ?>
</body>
</html>