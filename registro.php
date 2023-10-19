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
    <title>Registrarse</title> 
</head> 
<body> 
    <div class="formulario"> 
        <form action="registro.php" method="POST"> 
            <h1>Registrarse</h1> 
            <input class="input" type="text" id="username" name="username" placeholder="Usuario" required><br> 
            <input class="input" type="number" name="document" id="document" placeholder="Documento" required><br>
            <input class="input" type="password" id="password" name="password" placeholder="Contraseña" required><br>
            <input class="input" type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar contraseña" required><br>  
            <input type="submit" value="Enviar" name="Enviar"><br> 
            <a href="login.php">Ya tienes un usuario?</a> 
        </form> 
    </div> 
    <div class="errores"> 
        <?php 
        if(isset($_POST['Enviar'])){ 
            $username = $_POST['username']; 
            $password = $_POST['password']; 
            $document = $_POST['document']; 
            $confirm_password = $_POST['confirm_password']; 

            echo '</div>'; 
            if ($password !== $confirm_password) { 
                echo "Las contraseñas no coinciden."; 
            } else { 
                $query = "SELECT * FROM usuarios WHERE username = '$username'"; 
                $result = mysqli_query($conexion, $query); 
  
                if (mysqli_num_rows($result) > 0) { 
                    echo "El nombre de usuario ya está en uso."; 
                } else {
                     $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
                     $insert_query = "INSERT INTO usuarios (username, password, document) VALUES ('$username', '$hashed_password', '$document')";
                     mysqli_query($conexion, $insert_query); 

                    echo "Registro exitoso. Ahora puedes iniciar sesión."; 
                } 
            }  
        }  
      
      ?> 
</body>
</html>
