<?php
session_start();
include('functions/functionCart.php');
include("db/conexion.php");
if(isset($_SESSION['username'])){

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
    <link rel="stylesheet" href="assets/styles/stylecarrito.css">
    <title>Carrito</title>
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
                if(isset($_SESSION['username'])) {
                    echo '<a href="usuario.php"><img class="ima2" src="assets/images/user.png" style="margin-right: 5px; text-align: center;"><span>'.$_SESSION['username'].'</span></a>';
                }
                else{
                    session_destroy();
                    echo '<a href="login.php"><img class="ima2" src="assets/images/user.png"></a>';
                } ?></li>
                <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
            </div>
        </ul>
    </nav>
    <?php
        if(isset($_SESSION['id_admin'])){
            echo '<div class="titulo" style="text-align:center;"><h1>MODO ADMINISTRADOR</h1></div>';
        }
        else{
            if(isset($_GET['id_borrar'])){
                borrarProdCarrito($_GET['id_borrar']);
            }
            if(isset($_GET['vaciarCarrito'])){
                unset($_SESSION['carrito']);
            }
            if(isset($_GET['ID_prod'])){
                agregarProdCarrito($_GET['ID_prod']);
            }
            if(!isset($_SESSION['carrito'])){
                mostrarCarritoVacio();
            }else{
                mostrarCarrito();
            }
            if(isset($_GET['finCompra'])){
                finalizarCompra();
            }
        }
    ?>
</body>
</html>
<?php
} 
else{
    header("location: login.php?senial");
}
?>