<?php
session_start();
include('db/conexion.php');
include('functions/functionCart.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/styletikcets.css">
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
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='turno.php'>Turno</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <?php
                if(isset($_SESSION['username'])) {
                    // Verifica si el usuario es administrador
                    $username = $_SESSION['username'];
                    $sqlAdmin = "SELECT is_admin FROM administrator WHERE id_admin = ? ";
                    $stmt = mysqli_prepare($conexion, $sqlAdmin);
                    mysqli_stmt_bind_param($stmt, 's', $userID);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $isAdmin);
                    mysqli_stmt_fetch($stmt);
                    mysqli_stmt_close($stmt);

                    if ($isAdmin == 'si') {
                        echo '<li><a href="tickets.php">Tickets</a></li>';
                    }
                }
                ?>
            </div>
            <div class="session-info">
                <li class="usuario"><?php
                    if(isset($_SESSION['username'])) {
                        echo '<a href="usuario.php"><img class="ima2" src="assets/images/user.png" style="margin-right: 5px; text-align: center;"><span>'.$_SESSION['username'].'</span></a>';
                    }
                    else{
                        session_destroy();
                        echo '<a href="login.php"><img class="ima2" src="assets/images/user.png"></a>';
                    }
                ?></li>
                <li><a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a></li>
            </div>
        </ul>
    </nav>
    <?php
    if(isset($_SESSION['username'])) {
        // Verifica si el usuario es administrador
        $username = $_SESSION['username'];
        $sqlAdmin = "SELECT is_admin FROM administrator WHERE id_admin = ?";
        $stmt = mysqli_prepare($conexion, $sqlAdmin);
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $isAdmin);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        mostrarTodosLosTickets();
    }
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['responder_ticket'])) {
        $ticketId = $_POST['ticket_id'];
        $respuestaAdmin = $_POST['respuesta_admin'];
        $nuevoEstado = $_POST['nuevo_estado'];
    
        $updateSql = "UPDATE tickets SET respuesta_admin = ?, status = ? WHERE ticket_id = ?";
        $updateStmt = mysqli_prepare($conexion, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'ssi', $respuestaAdmin, $nuevoEstado, $ticketId);
    
        if (mysqli_stmt_execute($updateStmt)) {
            echo 'Respuesta enviada exitosamente.';
        } else {
            echo 'Error al enviar la respuesta.';
        }
    
        mysqli_stmt_close($updateStmt);
    }
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cambiar_estado'])) {
        $ticketId = $_POST['ticket_id'];
        $nuevoEstado = $_POST['nuevo_estado'];
    
        // Actualizar la base de datos con el nuevo estado
        $updateSql = "UPDATE tickets SET status = ? WHERE ticket_id = ?";
        $updateStmt = mysqli_prepare($conexion, $updateSql);
        mysqli_stmt_bind_param($updateStmt, 'si', $nuevoEstado, $ticketId);
    
        if (mysqli_stmt_execute($updateStmt)) {
            echo 'Estado del ticket cambiado exitosamente.';
        } else {
            echo 'Error al cambiar el estado del ticket.';
        }
    
        mysqli_stmt_close($updateStmt);
    }
    ?>
</body>
</html>
