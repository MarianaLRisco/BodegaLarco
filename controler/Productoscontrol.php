<?php
    
    require "../model/productos.php";
    include "../conexion.php";
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

        case 'BuscarProductoNombre':
            if (!empty($_POST['nombre'])) {
                $nombre= $_POST['nombre'];
                $query = mysqli_query($conection,"SELECT * FROM producto WHERE nombre LIKE '$nombre' and estado_c=1 " );
                mysqli_close($conection);
                $result = mysqli_num_rows($query);
                $data='';
                if ($result>0) {
                    $data = mysqli_fetch_assoc($query);
                }else{
                    $data=0;
                }
                
                echo json_encode($data, JSON_UNESCAPED_UNICODE );
            }else{
                echo 0;
            }
        
        break;

    }


?>