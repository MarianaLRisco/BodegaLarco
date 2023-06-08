<?php
    
    require "../model/productos.php";
    session_start();
    $prod = new Producto();

    switch($_REQUEST["op"]){

        case 'EditarProducto':
            if (isset($_POST['id'])) {
                if (!empty($_POST['nombre']) && !empty($_POST['categoria']) && !empty($_POST['proveedor']) && 
                !empty($_POST['precio']) &&  !empty($_POST['cantidad'])) {
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $categoria = $_POST['categoria'];
                    $proveedor = $_POST['proveedor'];
                    $precio = $_POST['precio'];
                    $cantidad = $_POST['cantidad'];
                    $prod->ActualizarProducto($id,$nombre,$categoria,$proveedor, $precio, $cantidad);
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        
        break;
        case "eliminar_producto":
            if (isset($_POST['id'])) {
                    $dni = $_POST['id'];
                    $prod->EliminarProducto($id);
                    echo 1;
                }else{
                    echo 0;
                }
        break;

    }


?>