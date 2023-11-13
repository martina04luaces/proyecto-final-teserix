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
                    <li><a href='index.php'>Ventas</a></li>
                    <li><a href='turno.php'>Turno</a></li>
                </div>
                <div class="session-info">
                    <li class="usuario"><?php
                    session_start();
                    if(isset($_SESSION['username'])) {
                        echo '<a href="usuario.php"><img class="ima2" src="assets/images/user.png" style="margin-right: 5px; text-align: center;">'.$_SESSION['username'].'</a>';
                    }
                    else{
                        session_destroy();
                        echo '<a href="login.php"><img class="ima2" src="assets/images/user.png"></a>';
                    } ?></li>
                    <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
                </div>
            </ul>
        </nav>
        <form action="#" method="post" enctype="mulitpart/form-data" id="form">
            <div class="cuerpo">
                    <h3>Formulario de Turno</h3>    
                    <div>
                        <div class="data">
                            <p>Nombre completo</p>
                            <input type="text" name="nombre" id="input">
                        </div>
                        <div class="data">
                            <p>Ingrese su consulta</p>
                            <textarea id="input" name="texta" cols="103" rows="4"></textarea>
                        </div>
                        <button type="submit" class="boton">Enviar</button>
                    </div>
                    <a id="reference" href="mailto:teserix.contact@gmail.com">mail</a>
            </div>
        </form>

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
<script src="turno.js"></script>
</body>
</html>