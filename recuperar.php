<?php
include 'db/conexion.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/styles/stylecon.css">
   
</head>

<body>
    <div class="formulario">

    <section class="recuperar">
    
        <h2>Recuperar contraseña</h2>
     <div class="form">
            <form action="" method="post">
                <div class="email">
                    <input type="email" name="email" id="1" placeholder="email">
                </div>
                <div class="enviar">
                    <input type="submit" name="Recuperar" value="Recuperar">
                </div>

                </form>
</div>

    
   </section>
</div>

</body>

</html>
 



<?php
if (isset($_POST['Recuperar'])) {

    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $consulta = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc ($consulta);
    if (mysqli_num_rows($consulta) > 0) {
        $token = time();
        $sqlUpdate = "UPDATE usuarios SET token = '$token' WHERE email = '$email'";
        $actualizarToken = mysqli_query($conexion, $sqlUpdate);
?>
        <!-- <script>
            let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'
            let usuario = '<?php echo $registro['Nbr_u']; ?>';
            let mensaje = 'Recupere su contraseña:http://localhost/proyecto-final-teserix/nuevaContrasenia.php?token=<?php echo $token; ?>';

            $.ajax({
                method: 'POST',
                url: url_final,
                dataType: 'json',
                accepts: 'application/json',
                data: {
                    name: usuario,
                    message: mensaje,
                },
                success: (data) => window.location = 'recuperar.php?send=1',
                error: (err) => window.location = 'recuperar.php?send=0',
            });
        </script> -->

<?php
    } else {
        echo '<p class="texto">El correo no es valido</p>';
    }
}

if (isset($_GET['send'])) {
    if ($_GET['send'] == 1) {
        echo '<div class="texto"> Correo enviado, revise su casilla de correos</div>';
    } else {
        echo '<div class="texto"> Error al enviar el correo </div>';
    }
}
?>