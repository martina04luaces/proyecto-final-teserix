<?php
    include("redimensionarImg.php");
    include("conexion.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
</head>
<body>
    <form action="#" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="email">email</label>
        <input type="email" name="email">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass">
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" accept="image/*">
        <a href="recuperar.php" style="">Olvidé mi contraseña</a>
        <input type="submit" value="registrar" name="registrar">
        
    </form>
    <?php
        //registro 
        if(isset($_POST['registrar'])){
            $nombre= $_POST['nombre'];
            $gmail=$_POST['email'];
            $pass= $_POST['pass'];
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                move_uploaded_file($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name']);
                $imagen=$_FILES['imagen']['name'];
                unlink($_FILES['imagen']['name']);
            }
            else{
                $imagen="image/default-image.jpg";
            }
            $sql= "INSERT INTO usuario (Nbr_u, Img_u,email,Pass_u) VALUES ('$nombre', '$imagen','$gmail', '$pass')";
            $insert= mysqli_query($conexion, $sql)?print('Registro ingresado correctamente'): print('Error al insertar');
        }
    ?>
</body>
</html>