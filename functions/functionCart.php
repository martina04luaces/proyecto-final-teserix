<?php
    function mostrarTresProductos(){
        include("db/conexion.php");
        $sql="SELECT * FROM articles WHERE ID_art >= 7 AND ID_art <=9";
        $consulta= mysqli_query($conexion, $sql);
        while($registro= mysqli_fetch_assoc($consulta)){
            $priceProd= number_format($registro['Price_art'], 2, '.', ',');
            echo '<div class="prod">
                <img class="ima" src="assets/images/'.$registro['Img_art'].'">
                <p class="art">'.$registro['Name_art'].'</p>
                <p class="cost">$'.$priceProd.'</p>
                <p class="stock">Disponibilidad: '.$registro['Stock_art'].' productos</p>
                <a href="carrito.php?ID_prod='.$registro['ID_art'].'"><img class="ima2" src="assets/images/carrito.png"></a>
            </div>';
        };
    };
    function mostrarProductos(){
        include("db/conexion.php");
        $sql="SELECT * FROM articles";
        $consulta= mysqli_query($conexion, $sql);
        while($registro= mysqli_fetch_assoc($consulta)){
            $priceProd= number_format($registro['Price_art'], 2, '.', ',');
            echo '<div class="prod">
                <img class="ima" src="assets/images/'.$registro['Img_art'].'">
                <p class="art">'.$registro['Name_art'].'</p>
                <p class="cost">$'.$priceProd.'</p>
                <p class="stock">Disponibilidad: '.$registro['Stock_art'].' productos</p>
                <a href="carrito.php?ID_prod='.$registro['ID_art'].'"><img class="ima2" src="assets/images/carrito.png"></a>
            </div>';
        };
    };
    function mostrarTicketsUsuario($userID) {
        global $conexion;
    
        $sql = "SELECT * FROM tickets WHERE user_id = '$userID'";
        $result = mysqli_query($conexion, $sql);
    
        if ($result) {
            echo '<div class="tickets-container">';
            echo '<h2 class="subtitulo">Mis Tickets</h2>';
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '<div class="ticket-info">';
                echo '<p>ID del Ticket: ' . $row['ticket_id'] . '</p>';
                echo '<p>Fecha: ' . $row['timestamp'] . '</p>';
                echo '<p>Estado: ' . $row['status'] . '</p>';
                echo '<p>Descripción: ' . $row['info_ticket'] . '</p>';
                echo '<p>Respuesta del Administrador: ' . $row['respuesta_admin'] . '</p>';
                
                // Botón para eliminar el ticket
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="ticket_id" value="' . $row['ticket_id'] . '">';
                echo '<input type="submit" class="eliminar-btn" value="Eliminar" name="eliminar_ticket">';
                echo '</form>';
                echo '</div>';

                
            }
            echo '</div>';
        } else {
            echo 'Error al obtener los tickets.';
        }
    }

    function mostrarTodosLosTickets() {
        global $conexion;
    
        $sql = "SELECT * FROM tickets";
        $result = mysqli_query($conexion, $sql);
    
        if ($result) {
            echo '<div class="tickets-container">';
            echo '<h2 class="subtitulo">Todos los Tickets</h2>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="ticket-info">';
                echo '<p>ID del Ticket: ' . $row['ticket_id'] . '</p>';
                echo '<p>Fecha: ' . $row['timestamp'] . '</p>';
                echo '<p>Estado: ' . $row['status'] . '</p>';
                echo '<p>Descripción: ' . $row['info_ticket'] . '</p>';
    
               
                if (!empty($row['respuesta_admin'])) {
                    echo '<p>Respuesta del Administrador: ' . $row['respuesta_admin'] . '</p>';
                }
                
                
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="ticket_id" value="' . $row['ticket_id'] . '">';
                    echo '<textarea name="respuesta_admin" placeholder="Responder"></textarea>';
                    echo '<input type="submit" class="responder-btn" value="Responder" name="responder_ticket">';
                    echo '</form>';

                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="ticket_id" value="' . $row['ticket_id'] . '">';
                    echo '<select name="nuevo_estado">';
                    echo '<option value="abierto">Pendiente</option>';
                    echo '<option value="cerrado">Cerrado</option>';
                    echo '</select>';
                    echo '<input type="submit" class="cambiar-estado-btn" value="Cambiar Estado" name="cambiar_estado">';
                    echo '</form>';

                
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo 'Error al obtener los tickets.';
        }
    }
    

    function eliminarTicket($ticketID) {
        global $conexion;
    
        $sql = "DELETE FROM tickets WHERE ticket_id = '$ticketID'";
        $result = mysqli_query($conexion, $sql);
    
        if (!$result) {
            echo 'Error al eliminar el ticket.';
        }
    }

    function mostrarCarrito(){
        $carrito = $_SESSION['carrito'];
        $total=0;
        echo '<div class="carrito">';
        foreach ($carrito as $indice => $producto) {
            $precio=number_format($producto['precio_prod'], 2, '.', ',');
            echo '
                <div class="producto">
                    <p class="eliminar"><i class="fa-solid fa-trash"></i></p>
                    <img class="img" src="assets/images/'.$producto['img_prod'].'" alt="">
                    <p>'.$producto['nbr_prod'].'</p>
                    <p>Cantidad:  '.$producto['cantidad'].'</p>
                    <p>Precio: $'.$precio.'</p>
                    <a href="carrito.php?id_borrar"><img class="rech" src="assets/images/borrar.png"></a>    
                </div>';
                $total = $total + $producto['cantidad'] * $producto['precio_prod'];
                $precioTotal= number_format($total, 2, '.', ',');
            }
            echo '</div>';
            echo '
                <p class="total">Total:$'.$precioTotal.'</p>
                <a style="color: lightblue;" href="carrito.php?finCompra" class="comprar" onClick="return confirm(\'Seguro desea proceder a comprar\')">Finalizar Compra</a>
            <div class="link">
                <a href="carrito.php?vaciarCarrito" style="color: lightblue;">Vaciar Carrito</a>
                <a href="index.php" style="color: lightblue;">Seguir Comprando</a>
                </div>
            </div>';
    }
    function mostrarCarritoVacio(){
        echo '
        <div class="carrito">
            <div class="error">Carrito vacio <a href="catalogo.php">Ir a Tienda</a></div>
        </div>';
    }
    function agregarProdCarrito($ID_prod){
        include('db/conexion.php');
        $sqlAg="SELECT * FROM articles WHERE ID_art = '$ID_prod'";
        $consultaAg=mysqli_query($conexion, $sqlAg);
        $registroAg=mysqli_fetch_assoc($consultaAg);
        if(!isset($_SESSION['carrito'])){
            $nuevo_prod[]= array(
                    'id_art' => $registroAg['ID_art'],
                    'img_prod'=> $registroAg['Img_art'],
                    'nbr_prod'=>$registroAg['Name_art'],
                    'precio_prod'=>$registroAg['Price_art'],
                    'cantidad' => 1,
                    'stock_prod' => $registroAg['Stock_art']
                );
            $_SESSION['carrito'] = $nuevo_prod;
        }else{
            $carrito = $_SESSION['carrito'];
            $nuevo_prod= array(
                    'id_art' => $registroAg['ID_art'],
                    'img_prod'=> $registroAg['Img_art'],
                    'nbr_prod'=>$registroAg['Name_art'],
                    'precio_prod'=>$registroAg['Price_art'],
                    'cantidad' => 1,
                    'stock_prod' => $registroAg['Stock_art']
                );
            array_push($carrito, $nuevo_prod);
            $_SESSION['carrito'] = $carrito;
        }
    }
    function mostrarUsuario(){
        include('db/conexion.php');
        if(isset($_SESSION['username'])){
            if(isset($_GET['id_editar'])){
                $id_editar=$_GET['id_editar'];
                $sql_e="SELECT * FROM usuarios WHERE id_usuario= '$id_editar'";
                $consulta_e= mysqli_query($conexion, $sql_e);
                $registro_e= mysqli_fetch_assoc($consulta_e);//formulario de edicion de usuario
                echo' <h1 style="margin-bottom: 10px;">Editar</h1>
                    <form action="" method="post" enctype="multipart/form-data" class="formulario-e">
                        <label for="nombre"><h3>Nombre</h3></label>
                        <input class="input" type="text" name="username" value="'.$registro_e['username'].'">
                        <label for="pass"><h3>Correo Electronico</h3></label>
                        <input class="input" type="text" name="email" value="'.$registro_e['email'].'"><br>  
                        <input class="enviar" type="submit" value="Actualizar" name="actualizar">
                    </form>
                    <br><br><br>

                ';
                if(isset($_POST['actualizar'])){
                    $nombre_e= $_POST['username'];
                    $email_e= $_POST['email'];
                    $sql_up= "UPDATE usuarios  SET username= '$nombre_e', email= '$email_e' WHERE id_usuario= '$id_editar'";
                    $actualizar= mysqli_query($conexion, $sql_up);
                    session_destroy();
                    session_start();
                    header("Location: login.php?senial_2");
                }
            }
        }
        /* mostrar */

        if(isset($_SESSION['username'])){
            $user= $_SESSION['username'];
            $sql2="SELECT * FROM usuarios WHERE username = '$user'"; //uso de consulta sql para pedir el usuario
            $consulta= mysqli_query($conexion, $sql2);
            if(mysqli_num_rows($consulta)==0){
                echo "tabla vacia";
            }
            else{
                while($registro= mysqli_fetch_assoc($consulta)){
                    echo'<div class="usuario">
                            <div class="datos">
                                <h1>Informacion de usuario</h1>
                                <p class="txt-info">Id de Usuario:'.$registro['id_usuario'].'</p>
                                <p class="txt-info">Nombre:'.$registro['username'].'</p>
                                <p class="txt-info">Correo Electronico: '.$registro['email'].'</p> 
                                <div class="iconos" style="margin-top: 10px">
                                    <a href="usuario.php?id_editar='.$registro['id_usuario'].'"><img class="ima2" src="assets/images/edit.png"></a>
                                    <a href="closesession.php"><img class="ima2" src="assets/images/logoff.png"></a>
                                </div>   
                            </div>
                        </div>';
                }
            }
        }   
        else{
            header("include: login.php?senial_2");
        }
    }
    function finalizarCompra(){
        include('db/conexion.php');
        $carrito = $_SESSION['carrito'];
        
        /*Recorremos el carrito para generar el array de id_prod/precio/cant y para actualizar la disponibilidad de los productos */
        foreach($carrito as $indice => $producto){
            /*genero un vector $order con ID_prod/precio/cantidad separado prod a prod por un espacio en blanco*/
            $order[] = ' '.$producto['id_art'].'/'.$producto['precio_prod'].'/'.$producto['cantidad'];
            /*el espacio en blanco adelante hace que $order[0] quede vacio*/
    
            /* Actualizo la disponibilidad de cada producto */
            $id_prod = $producto['id_art'];
            $nuevo_stock = $producto['stock_prod'] - $producto['cantidad'];
            $sql_update = "UPDATE articles SET Stock_art = '$nuevo_stock' WHERE ID_art = '$id_prod'";
            $update_stock = mysqli_query($conexion, $sql_update);
        }
        /*Asigno el valor a las variable que utilizare para grabar el registro */
        $fecha = date("Y/m/d");
        $productos = implode($order); //convierto el array $order en un string para guardarlo en la db
        $id_usuario = $_SESSION['ID_user'];
    
        /*Guardo el registro de orden el la tabal 'orders' */
        $sql = "INSERT INTO orders (Date_order, Articles, ID_user) VALUES ('$fecha','$productos','$id_usuario')";
        $insertar = mysqli_query($conexion, $sql);
    
        /*Si se crea el registro, elimino la variable de session, con lo cual vacio el carrito y muestro mensaje */
        if($insertar){
            unset($_SESSION['carrito']);
            print ('<script>alert("Pedido Generado Exitosamente")</script>');
        }else{
            print ('<script>alert("Error al Generar Pedido")</script>');
        }
    }    
    function borrarProdCarrito($id_borrar){
        $carrito = $_SESSION['carrito'];
        foreach ($carrito as $indice => $producto) {
            if($producto['id_art']== $id_borrar){
                unset($carrito[$indice]);
            }
        }
        if(count($carrito)>0){
            $_SESSION['carrito'] = $carrito;
        }else{
            unset($_SESSION['carrito']);
        }
    }
    function mostrarPedidos($ID_user){
        include('db/conexion.php');
    
        $sql = "SELECT * FROM orders WHERE ID_user = '$ID_user' ORDER BY Date_order DESC";
        $consulta = mysqli_query($conexion, $sql);
    
        if(mysqli_num_rows($consulta)>0){
            while($registro=mysqli_fetch_assoc($consulta)){
                /* muestro Nro de orden y Fecha */
                echo '<details>
                <summary>Nro. de Orden: '.$registro['ID_order']. ' | Fecha: '.$registro['Date_order'].'</summary>';
                
    
                /*convierto el campor Article nuevamente en un vector utilizando la funcion explode() */
                $articulos = explode(' ' , $registro['Articles']);
    
                $total = 0;
                for($x=1; $x<count($articulos); $x++){
                        /*utilizando nuevamente la funcion explote() generos las variables para guardar el id_prod, el precio y la cantidad */
                        list($id, $precio, $cant) = explode('/' , $articulos[$x]);
    
                        /*Con el $id traigo imagen y nombre de producto */
                        $sql2 = "SELECT Name_art, Img_art FROM articles WHERE ID_art='$id'";
                        $consulta2 = mysqli_query($conexion, $sql2);
                        $reg_art = mysqli_fetch_assoc($consulta2);
    
                        /* muestro detalle de pedido */
                        $subtotalPedido= $precio*$cant;
                        $precioTotal=$total = $total + ($precio*$cant);
                        echo '
                        <div class="detalle">
                            <div class="img"><img style="height:200px width:200px" src="assets/images/'.$reg_art['Img_art'].'"></div>
                            <div class="datos">
                                <span>'.$reg_art['Name_art'].'</span><br> 
                                <span> $'.number_format($precio,2,",",".").'</span><br> 
                                <span> Cantidad:'.$cant.'</span><br> 
                                <span> Subtotal: $'.number_format($subtotalPedido,2,",",".").'</span> <br> 
                                <span> TOTAL: $'.number_format($precioTotal,2,",",".").'</span>
                            </div>
                        </div>
                        '; 
                         
                }
                echo '</details>';
               
            }
        }else{
            echo 'No tiene Pedidos';
        }
    }
    function agregarProductosAdmin(){
        include('db/conexion.php');
        include('redimensionarImg.php');
        if(isset($_POST['Enviar'])){
            $Name_art= $_POST['Name_art'];
            $Price_art= $_POST['Price_art'];
            $Stock_art= $_POST['Stock_art'];
            if(is_uploaded_file($_FILES['Img_art']['tmp_name'])){
                move_uploaded_file($_FILES['Img_art']['tmp_name'], $_FILES['Img_art']['Name_art']);
                $foto= redimensionarImg($_FILES['foto']['name'], 200, 200); 
                unlink($_FILES['Img_art']['Name_art']);                                                      
            }
            else{
                echo 'error';
            }
            $sqlcons="INSERT INTO articles (ID_art, Name_art, Img_art, Price_art, Stock_art) VALUES ('$ID_art', '$Name_art', '$Img_art', '$Price_art', '$Stock_art')";
            $insert= mysqli_query($conexion, $sqlcons);
            if(mysqli_nums_rows($insert) == 1){
                echo 'Datos Ingresados correctamente.';
            }
            else{
                echo 'Hubo un error al ingresar los datos.';
            }
        }
        if(isset($_POST['registrar'])){
            $sql= "INSERT INTO usuarios (nombre, contrasenia, foto) VALUES ('$nombre', '$pass', '$foto')";
            $insert= mysqli_query($conexion, $sql);
        }
    };
    function mostrarAdminProductos(){
        include("db/conexion.php");
        include("redimensionarImg.php");
        if(isset($_GET['id_eliminar'])){
            $id_eliminar= $_GET['id_eliminar'];
            $foto_eliminar="SELECT Img_art FROM articles WHERE ID_art = $id_eliminar";
            $buscar_foto= mysqli_query($conexion, $foto_eliminar);
            $registro_f= mysqli_fetch_assoc($buscar_foto);
            $sql_eliminar= "DELETE FROM articles WHERE ID_art = '$id_eliminar'";
            $eliminar= mysqli_query($conexion, $sql_eliminar)?print('El producto se elimino correctamente.'): print('error');
        }
        
        if(isset($_GET['id_editar'])){
            $id_editar=$_GET['id_editar'];
            $sql_e="SELECT * FROM articles WHERE ID_art= '$id_editar'";
            $consulta_e= mysqli_query($conexion, $sql_e);
            $registro_e= mysqli_fetch_assoc($consulta_e);
            echo'<form action="" method="post" enctype="multipart/form-data" style="display: flex; align-items:center; flex-direction: column; width:30%; ">
                    <h2>Editar</h2>
                    <label for="nombre">Nombre</label>
                    <input class="input" type="text" name="nombre" value="'.$registro_e['Name_art'].'">
                    <label for="Price">Precio</label>
                    <input class="input" type="text" name="Price" value="'.$registro_e['Price_art'].'">
                    <label for="Stock">Stock</label>
                    <input class="input" type="text" name="Stock" value="'.$registro_e['Stock_art'].'">
                    <input type="hidden" name="foto" value="'.$registro_e['Img_art'].'">
                    <img style="height: 70px; width: 70px;" src="assets/images/'.$registro_e['Img_art'].'">
                    <input type="file" name="foto" accept="image/*" value="'.$registro_e['Img_art'].'">
                    <input class="enviar" type="submit" value="Actualizar" name="actualizar">
                    <br>
                </form>
            ';
            if(isset($_POST['actualizar'])){
                $Nombre_e= $_POST['nombre'];
                $Precio_e= $_POST['Price'];
                $Stock_e=$_POST['Stock'];
                $foto_e= $_POST['foto'];
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    move_uploaded_file($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
                    $archivo= $_FILES['foto']['name'];
                    $foto= redimensionarImg($archivo, 200, 200);
                    unlink($archivo);
                } else{
                    $foto= $foto_e;
                }
                $sql_up= "UPDATE articles SET Name_art= '$Nombre_e', Price_art= '$Precio_e', Stock_art= '$Stock_e', Img_art= '$foto_e' WHERE ID_art= '$id_editar'";
                $actualizar= mysqli_query($conexion, $sql_up);
            }
        }
        $sql="SELECT * FROM articles";
        $consulta= mysqli_query($conexion, $sql);
        while($registro= mysqli_fetch_assoc($consulta)){
            $priceProd= number_format($registro['Price_art'], 2, '.', ',');
            echo '<div class="prod">
                <img class="ima" src="assets/images/'.$registro['Img_art'].'">
                <p class="art">'.$registro['Name_art'].'</p>
                <p class="cost">$'.$priceProd.'</p>
                <p class="stock">Disponibilidad: '.$registro['Stock_art'].' productos</p>
                <a href="catalogo.php?id_eliminar='.$registro['ID_art'].'"><img class="ima2" src="assets/images/borrar.png"></a>
                <a href="catalogo.php?id_editar='.$registro['ID_art'].'"><img class="ima2" src="assets/images/edit.png"></a>
            </div>';
        };
    };
?>
