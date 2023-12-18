<?php
session_start();
include('db/conexion.php');
include('functions/functionCart.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleuser.css">
    <link rel="stylesheet" href="assets/styles/styletickets.css">
    <link rel="shortcut icon" href="assets/images/images.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
        <header class="ca">
            <a href='index.php'><img src="assets/images/images.png"></a>
            <h1>TESERIX</h1>
        </header>
        <nav>
            <ul class="menu">
                <div class="links-to">
                    <li><a href='index.php'>Inicio</a></li>
                    <li><a href='turno.php'>Turno</a></li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                </div>
                <div class="session-info">
                    <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
                </div>
            </ul>
        </nav>
        <?php
            if(!isset($_SESSION['id_admin'])){
        ?>
        <div class="cuerpo">
            <div class="userinfo">
                <?php
                    if(isset($_SESSION['username'])){
                        echo '<div class="info-usuario">
                            '.mostrarUsuario().'
                        </div>'; 
                    }
                    else{
                        header("location: login.php?senial_2");
                    }
                ?>
            </div>
            <div class="pedidos">
            <h2 class="subtitulo"> Mis pedidos</h2>
            <?php
                mostrarPedidos($_SESSION['ID_user']);
             ?>
            </div>
            <div class="tickets">
                <?php
                if (isset($_SESSION['ID_user'])) {
                    if (isset($_POST['eliminar_ticket'])) {
                        $ticketID = $_POST['ticket_id'];
                        eliminarTicket($ticketID); 
                    }
                    mostrarTicketsUsuario($_SESSION['ID_user']);
                }
                ?>
            </div>
        </div>
        <?php
        }
        if($_SESSION['username']=='Administrador'||'Admin2'){
            ?>
        <div class="admin" >
            <h1 style="margin-top: 20px;">Agregar productos</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input class="input2" type="text" name="Name_art" style="color: black;" placeholder="Nombre"><br>
                <input class="input2" type="number" name="Stock_art" style="color: black;" placeholder="Stock"> <br>
                <input class="input2" type="number" name="Price_art" style="color: black;" placeholder="Precio"><br>
                <input type="file" name="Img_art" accept="image/*"><br>
                <input class="enviar" type="submit" value="Enviar" name="Enviar" style="color: black;"><br>
                <a href="closesession.php"><img class="ima2" src="assets/images/logoff.png"></a>
            </form>
            <?php
            include('redimensionarImg.php');
            if(isset($_POST['Enviar'])){
                $Name_art= $_POST['Name_art'];
                $Price_art= $_POST['Price_art'];
                $Stock_art= $_POST['Stock_art'];
                if(is_uploaded_file($_FILES['Img_art']['tmp_name'])){
                    move_uploaded_file($_FILES['Img_art']['tmp_name'], $_FILES['Img_art']['name']);
                    $foto= redimensionarImg($_FILES['Img_art']['name'], 200, 200); 
                    unlink($_FILES['Img_art']['name']);                                                      
                }
                else{
                    echo 'error';
                }
                $sqlcons="INSERT INTO articles (Name_art, Img_art, Price_art, Stock_art) VALUES ('$Name_art', '$foto', '$Price_art', '$Stock_art')";
                $insert= mysqli_query($conexion, $sqlcons);
                if($insert == true){
                    echo 'Datos ingresados correctamente.';
                }
            }
            ?>
            </div>
            <?php
        }
        ?>
        
</body>
</html>