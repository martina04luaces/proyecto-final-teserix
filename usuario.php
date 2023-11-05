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
                    <li><a href='index.php'>Ventas</a></li>
                    <li><a href='turno.php'>Turno</a></li>
                </div>
                <div class="session-info">
                    <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
                </div>
            </ul>
        </nav>
        <div class="cuerpo">
            <div class="userinfo">
                <?php
                    if(isset($_SESSION['username'])){
                        echo '<div class="info-usuario">
                            '.mostrarUsuario().'
                            <a href="carrito.php">Ir al carrito</a>
                            <a href="closesession.php">Cerrar Sesion</a>
                        </div>'; 
                    }
                    else{
                        header("location: login.php?senial_2");
                    }
                ?>
            </div>
        </div>
        <a href="usuario.php"></a>
    
</body>
</html>