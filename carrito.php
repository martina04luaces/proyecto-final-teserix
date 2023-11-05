<?php
session_start();
include('db/functionCart.php');
include("db/conexion.php");
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['ID_prod'])){
            agregarProdCarrito($_GET['ID_prod']);
        }
        if(!isset($_SESSION['carrito'])){
            mostrarCarritoVacio();
        }else{
            mostrarCarrito();
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