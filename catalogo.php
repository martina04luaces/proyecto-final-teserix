<?php
include("db/conexion.php");
include("functions/functionCart.php");
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
    <link rel="stylesheet" href="assets/styles/stylecatalogo.css">
    <title>Catalogo</title>
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
                    <li class="usuario"><?php
                    session_start();
                    if(isset($_SESSION['username'])) {
                        echo '<a href="usuario.php"><div class="user-user-info"><img class="ima2" src="assets/images/user.png" style="margin-right: 5px; text-align: center; "><p class="username-text">'.$_SESSION['username'].'</p></div></a>';
                    }
                    else{
                        session_destroy();
                        echo '<a href="login.php"><img class="ima2" src="assets/images/user.png"></a>';
                    } ?></li>
                    <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
                </div>
            </ul>
        </nav>
        <div class="cuerpo">
            <?php
                mostrarProductos();
            ?>
        </div>
</body>
</html>