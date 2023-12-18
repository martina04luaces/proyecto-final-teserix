<?php
include 'db/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/stylenc.css">

    <title>Nueva Contraseña</title>
</head>

<body>
    <?php

    if (isset($_GET['token'])) {

    ?> 
    <div class="formulario">
        <h2>Cambiar contraseña</h2>
        <form action="" method="post">
            <label for="1">Ingrese su nueva contraseña: </label>
            <input type="text" name="contrasenia" id="1">
            <input type="submit" value="Actualizar" name="Actualizar">
        </form>
    </div>
    <?php
    }

    if (isset($_POST['Actualizar'])) {
        $token = $_GET['token'];
        $nuevaContrasenia = $_POST['contrasenia'];
        $Pass_u = password_hash($nuevaContrasenia, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM usuarios WHERE token= '$token'";
        $consulta = mysqli_query($conexion, $sql);
        if (mysqli_num_rows($consulta) > 0) {
            $sqlUpdate = "UPDATE usuarios SET token = 1, password= '$Pass_u' WHERE token = '$token'";
            $actualizar = mysqli_query($conexion, $sqlUpdate) ? print('Contraseña actualizada correctamente. <a href="../index.php"> Volver al inicio </a>') :print('error al actualizar contrasenia. <a href="../index.php"> Volver al inicio </a>');
          
        } else {
            echo 'El token no existe';
            echo '<a href="../index.php"> Volver al inicio </a>';
        }
    }

    ?>
</body>

</html>