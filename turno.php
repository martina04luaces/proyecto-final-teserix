<?php
    include("db/conexion.php");
    include("functions/functionCart.php");
    if(isset($SESS))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles/styleturno.css">
    <link rel="shortcut icon" href="assets/images/images.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Turnos</title>
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
        <?php
        if(isset($_SESSION['id_admin'])){
            echo '<div class="titulo" style="text-align:center; color:white;"><h1>MODO ADMINISTRADOR</h1></div>';
        }
        else{
        ?>
        <form action="" method="POST" id="form">
            <div class="cuerpo">
                    <h3 class="h3">Formulario de Turno</h3>    
                    <div>
                        <div class="data">
                            <h3>Nombre completo</p>
                            <input type="text" name="Nombre" id="input" required>
                        </div>
                        <div class="data" id="content-select">
                            <h3>Tipo de Reparacion</p>
                            <select name="Servicio">
                                <option value="Instalación de Sistema Operativo">Instalación de Sistema Operativo</option>
                                <option value="Revision General">Revision General</option>
                                <option value="Instalación de componentes">Instalación de componentes</option>
                                <option value="Arreglo de componentes">Arreglo de componentes</option>
                            </select>
                            <i></i>
                        </div>
                        <div class="data">
                            <h3>Email</h3>
                            <input type="email" name="Email" id="input" required>
                        </div>
                        <div class="data">
                            <h3>Descripcion</p>
                            <textarea name="Descripción" cols="103" rows="4" required></textarea>
                        </div>
                        <div class="button">
                            <button type="submit" class="boton" value="Enviar" name="Enviar" onclick="myfunction()">Enviar</button>
                        </div>
                    </div>
            </div> 
        </form>
        <?php
            include("db/conexion.php");
            if(isset($_SESSION['ID_user'])){
                if(isset($_POST['Enviar'])){
                    $TipoReparacion= $_POST['Servicio'];
                    $Descripcion=$_POST['Descripción'];
                    $fecha = date("Y/m/d");
                    $ID_user= $_SESSION['ID_user'];
                    $Estado_arreglo= 'En revisión.';
                    $sqlTurn= "INSERT INTO arreglos (Tipo_arreglo, Desc_arreglo, Date_arreglo, Estado_arreglo, ID_user) VALUES ('$TipoReparacion','$Descripcion','$fecha', '$Estado_arreglo', '$ID_user')";
                    $insertTurno= mysqli_query($conexion, $sqlTurn);
                    if($insertTurno){
                        echo'<script>alert("Pedido de arreglo realizado correctamente.")</script>';
                    }
                    else{
                        echo '<script>alert("Malisimo")</script>';
                    }
                }
            }
            else{
                header("location: login.php?senial3");
            }
        ?>
        <footer>
            <div class="pq">
                <h4>Por qué comprar</h4>
                <a href="!#">Formas de pago</a>
                <a href="!#">Gasto de envío</a>
                <a href="!#">Opiniones de clientes</a>
            </div>
            <div class="quien">
                <h4>Quienes somos</h4>
                <a href="!#">Quienes somos</a>
                <a href="!#">Nuestras tiendas</a>
                <a href="!#">Garantías</a>
            </div>
        </footer>
<?php
}
?>
</body>
</html>
