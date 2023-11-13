<?php
    function mostrarProductos(){
        include("db/conexion.php");
        $sql="SELECT * FROM articles";
        $consulta= mysqli_query($conexion, $sql);
        while($registro= mysqli_fetch_assoc($consulta)){
            echo '<div class="prod">
                <img class="ima" src="assets/images/'.$registro['Img_art'].'">
                <p class="art">'.$registro['Name_art'].'</p>
                <p class="cost">$'.$registro['Price_art'].'</p>
                <p class="stock">Disponibilidad: '.$registro['Stock_art'].' productos</p>
                <a href="carrito.php?ID_prod='.$registro['ID_art'].'"><img class="ima2" src="assets/images/carrito.png"></a>
            </div>';
        };
    };
    function mostrarCarrito(){
        $carrito = $_SESSION['carrito'];
        $total=0;
        foreach ($carrito as $indice => $producto) {
            $precio=number_format($producto['precio_prod'], 2, '.', ',');
            echo '
            <div class="carrito">
                <div class="producto">
                    <p class="eliminar"><i class="fa-solid fa-trash"></i></p>
                    <img src="images/'.$producto['img_prod'].'" alt="">
                    <p>'.$producto['nbr_prod'].'</p>
                    <p>Cantidad: - | '.$producto['cantidad'].' | + </p>
                    <p>Precio: $'.$precio.'</p>
                    <p class="SubTotal">Subtotal: $'.$producto['cantidad'] * $precio.'</p>
                    <hr>  
                </div>';
                $total = $total + $producto['cantidad'] * $precio;
            }
            echo '
                <p class="total">Total:$'.$total.'</p>
                <a href="" class="comprar" style="color: lightblue;" >Finalizar Compra</a>
            <div class="link">
                <a href="carrito.php" style="color: lightblue;">Vaciar Carrito</a>
                <a href="index.php" style="color: lightblue;">Seguir Comprando</a>
                </div>
            </div>';
    }
    function mostrarCarritoVacio(){
        echo '
        <div class="carrito">
        <div class="error">Carrito vacio <a href="index.php">Ir a Tienda</a></div>
        </div>';
    }
    function agregarProdCarrito($ID_prod){
        include('db/conexion.php');
        $sqlAg="SELECT * FROM articles WHERE ID_art = '$ID_prod'";
        $consultaAg=mysqli_query($conexion, $sqlAg);
        $registroAg=mysqli_fetch_assoc($consultaAg);
        if(!isset($_SESSION['carrito'])){
            $nuevo_prod[]= array(
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
                echo' <h1>Editar</h1>
                    <form action="" method="post" enctype="multipart/form-data" class="formulario-e">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="username" value="'.$registro_e['username'].'">
                        <label for="pass">Correo Electronico</label>
                        <input class="input" type="text" name="email" value="'.$registro_e['email'].'"><br>  
                        <input class="enviar" type="submit" value="actualizar" name="actualizar">
                    </form>
                    <br><br><br>

                ';
                if(isset($_POST['actualizar'])){
                    $nombre_e= $_POST['username'];
                    $contrasenia_e= $_POST['password'];
                    $email_e= $_POST['email'];
                    $sql_up= "UPDATE usuarios  SET username= '$nombre_e', password= '$contrasenia_e', email= '$email_e' WHERE id_usuario= '$id_editar'";
                    $actualizar= mysqli_query($conexion, $sql_up);
                    session_destroy();
                    session_start();
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
?>