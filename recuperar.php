<?php
include ('conexion.php');
?>
 
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vibes - Recuperar Contraseña</title>
    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
</head>
 
<body>
    <h2>Recuperar contraseña</h2>
    <form action="" method="post">
        <label for="1">Correo</label>
        <input type="email" name="correo" id="1">
        <input type="submit" name="Recuperar" value="Recuperar">
    </form>
 
 
</body>
 
</html>
 
 
<?php
if (isset($_POST['Recuperar'])) {
 
    $email= $_POST['correo'];
 
    $sql = "SELECT * FROM usuarios WHERE gmail = '$email'";
    $consulta = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($consulta) > 0) {
        $token = time();
        $registro = mysqli_fetch_assoc($consulta);
        $sqlUpdate = "UPDATE usuarios SET token = '$token' WHERE gmail = '$email'";
        $actualizarToken = mysqli_query($conexion, $sqlUpdate);
?>
        <script>
            let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'
            let usuario = '<?php $registro['Nbr_u']; ?>';
            let mensaje = 'Recupere su contraseña: https://localhost/proyfinallopez/nuevaContrasenia.php?token=<?php echo $token; ?>';
 
 
            $.ajax({
                method: 'POST',
                url: url_final,
                dataType: 'json',
                accepts: 'application/json',
                data:{
                    name: usuario,
                    message: mensaje,
                },
                success: (data) => document.write('Correo enviado, revise su casilla de correos'), 
                error: (err) => document.write('Error al enviar el correo: ' + err),
            });
        </script>
<?php
    } else {
        echo 'el correo no existe';
    }
}
 
 
?>
 