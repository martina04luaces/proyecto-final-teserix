<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/stylesession.css">
    <title>Iniciar Sesion</title>
</head>
<body>
<<<<<<< HEAD
    <div class="formulario">
        <form action="login.php" method="POST" >
            <h1>Iniciar Sesion</h1>
            <input class="input" type="text" id="username" name="username" placeholder="Nombre de Usuario" required> <br>
            <input class="input" type="password" id="password" name="password" placeholder="Contraseña" required> <br>
            <input type="submit" value="Enviar" name="Enviar" class="enviar"> <br>
=======
    <header class="ca"> 
        <a href='/'><img src="images/images.png"></a>
        <h1>TESERIX</h1>
    </header>
    <div class="formulario">
        <form action="login.php" method="POST" >
            <h1>Iniciar Sesion</h1>
            <input class="input" type="text" id="username" name="username" placeholder="Usuario" required> <br>
            <input class="input" type="password" id="password" name="password" placeholder="Contraseña" required> <br>
            <input type="submit" value="Enviar" name="Enviar"> <br>
>>>>>>> 878b001006a9fbe165a0fdcbd88e700321e3001f
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