<?php
include('db/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="shortcut icon" href="assets/images/images.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Teserix</title>
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
                        echo 'Bienvenido, '. $_SESSION['username']. '. ';
                        echo '<a href="closesession.php">Cerrar sesión</a>';
                    }
                    else{
                        session_destroy();
                        echo '<a href="login.php">Iniciar Sesion</a><a href="registro.php">Registrarse</a>';
                    } ?></li>
                </div>
            </ul>
        </nav>
        <div class="cuerpo">
            <div class="title">
                <h2>PRODUCTOS EN VENTA</h2>    
            </div>
            <div class="adan" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/net1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/net2.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/net3.png" class="d-block w-100">
                </div>
                </div>
            </div>

            <div class="subtitle">
                <h3>Novedades</h3>
            </div>
            <div class="fot">
                <div class="prod">
                    <img src="assets/images/hdd.png" class="ima">
                    <div>
                        <h3>Disco Duro Seagate</h3>
                        <p>Disco Rido de 1tb, con velocidades de escritura de hasta 500mb/s.</p>
                        <b>$19.300</b> <br>
                        <a href="!#"><img src="assets/images/carrito.png" class="ima2"></a>                
                    </div>
                </div>
                
                <div class="prod">
                    <img src="assets/images/pro.png" class="ima">
                    <div>
                        <h3>AMD Ryzen 3 3200g</h3>
                        <p>Microprocesador AMD Ryzen con graficos integrados Radeon Vega 8.</p>
                        <b>$109.000</b> <br>
                        <a href="!#"><img src="assets/images/carrito.png" class="ima2"></a>
                    </div> 
                </div>

                <div class="prod">
                    <img src="assets/images/ram.png" class="ima">
                    <div>
                        <h3>Memoria RAM 8gb</h3>
                        <p>Memoria RAM marca Hyperx con una tasa de 2666mhz con tecnología DDR4.</p>
                        <b>$26.000</b> <br>
                        <a href="!#"><img src="assets/images/carrito.png" class="ima2"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="arreglos">
            <h3>Arreglos</h3>
            <div class="info">
                <img src="assets/images/rep.png">
                <div class="txt">
                    <h2>PROFESIONALES EN SOPORTE DE COMPUTADORAS</h2>
                    <p>Un servicio de excelencia. Brindamos reparación de PC de forma inmediata para las eventualidades que puedan llegar a surgir en tu computadora. En caso de que así lo requieras contamos con la posibilidad de brindarte servicio de técnico a domicilio en Capital Federal y GBA (Consulte zonas de alcance), además de atención en nuestro taller y soporte remoto.</p>
                    <a href="turno.php">Sacar turno</a>
                </div>
            </div>
        </div>
        <div class="redes">
            <h3>Contáctanos</h3>
            <h4>teserix.contact@gmail.com</h4>
            <div class="redess">
                <a href="https://es-la.facebook.com/"><img  class="social" src="assets/images/face.png"></a>
                <a href="https://web.whatsapp.com/"><img class="social" src="assets/images/warap.png"></a>
                <a href="https://www.instagram.com/?hl=es-la"><img class="social" src="assets/images/insta.jpg"></a>
                <a href="https://twitter.com/"><img src="assets/images/tt.png"></a>
            </div>
        </div>
        <footer>
            <div class="pq">
                <h4>Por qué comprar</h4>
                <a href="!#">Formas de pago</a>
                <a href="!#">Gasto de envío</a>
                <a href="!#">Opiniones de clientes</a>
            </div>
            <div class="cont">
                <h4>Contactar</h4>
                <a href="!#">Aviso legal</a>
                <a href="!#">Política de cookies</a>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    </body>
</html>