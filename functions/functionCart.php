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
                <a href="carrito.php"><img class="ima2" src="assets/images/carrito.png"></a>
            </div>';
        };
    };
    function mostrarCarrito(){
        $carrito = $_SESSION['carrito'];
        $total=0;
        foreach ($carrito as $indice => $producto) {
        echo '
        <div class="carrito">
            <div class="producto">
                <p class="eliminar"><i class="fa-solid fa-trash"></i></p>
                <img src="images/'.$producto['img_prod'].'" alt="">
                <p>'.$producto['nbr_prod'].'</p>
                <p>Cantidad: - | '.$producto['cantidad'].' | + </p>
                <p>Precio Unit: $'.$producto['precio_prod'].'</p>
                <p class="SubTotal">Subtotal: $'.$producto['cantidad'] * $producto['precio_prod'].'</p>
                <hr>  
            </div>';
            $total = $total + $producto['cantidad'] * $producto['precio_prod'];
        }
        echo '
            <p class="total">Total:$'.$total.'</p>
            <a href="" class="comprar">Finalizar Compra</a>
        <div class="link">
            <a href="">Vaciar Carrito</a>
            <a href="index.php">Seguir Comprando</a>
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
        $sql="SELECT * FROM articles WHERE ID_art = '$ID_prod'";
        $consulta=mysqli_query($conexion, $sql);
        $registro=mysqli_fetch_assoc($consulta);
        
        if(!isset($_SESSION['carrito'])){
            $nuevo_prod[]= array('img_prod'=> $registro['Img_art'],
                        'nbr_prod'=>$registro['Name_art'],
                        'precio_prod'=>$registro['Price_art'],
                        'cantidad' => 1);
            $_SESSION['carrito'] = $nuevo_prod;
        }else{
            $carrito = $_SESSION['carrito'];
            $nuevo_prod= array('img_prod'=> $registro['Img_art'],
                        'nbr_prod'=>$registro['Name_art'],
                        'precio_prod'=>$registro['Price_art'],
                        'cantidad' => 1);
            array_push($carrito, $nuevo_prod);
            $_SESSION['carrito'] = $carrito;
        }
    }
    function mostrarUsuario(){
        include('db/conexion.php');
        /* mostrar */
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
                            <p>Id de Usuario:'.$registro['id_usuario'].'</p>
                            <p>Nombre:'.$registro['username'].'</p>
                            <p>Contraseña:'.$registro['password'].'</p> 
                            <p>Correo Electronico: '.$registro['email'].'</p> 
                            <div class="iconos">
                                <a href="usuario.php?id_editar='.$registro['id_usuario'].'">Editar Usuario</a>
                            </div>   
                        </div>
                    </div>';
            }
        }   
        if(isset($_GET['id_editar'])){
            $id_editar=$_GET['id_editar'];
            $sql_e="SELECT * FROM usuarios WHERE id_usuario= '$id_editar'";
            $consulta_e= mysqli_query($conexion, $sql_e);
            $registro_e= mysqli_fetch_assoc($consulta_e);//formulario de edicion de usuario
            echo' <h2>Editar</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="username" value="'.$registro_e['username'].'">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="password" value="'.$registro_e['password'].'">
                    <input class="input" type="text" name="email" value="'.$registro_e['email'].'"><br>  
                    <input type="submit" value="actualizar" name="actualizar">
                </form>

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
?>