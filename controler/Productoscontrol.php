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
                    $id = $_POST['id'];
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

        case 'BuscarProductoID':
            if (!empty($_POST['id'])) {
                $id= $_POST['id'];
                $query = mysqli_query($conection,"SELECT * FROM producto WHERE idproducto LIKE '$id' and estado_c=1 " );
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

        case 'agregar_producto':
            if (!empty($_POST['id']) || !empty($_POST['n_cantidad']) || !empty($_POST['n_precio'])){
                $id = $_POST['id'];
                $cantidad = $_POST['n_cantidad'];
                $precio = $_POST['n_precio'];
                $query_insert = mysqli_query($conection, "INSERT INTO entradas(codproducto, cantidad, precio)
                VALUES ($id, $cantidad,$precio)");
                if($query_insert){
                    $query_upd = mysqli_query($conection,"CALL ACTUALIZAR_PRECIO_PRODUCTO( $cantidad,$precio,$id)" );
                    $result_pro = mysqli_num_rows($query_upd);
                    if($result_pro>0){
                        $data=mysqli_fetch_array($query_upd);
                        echo json_encode($data, JSON_UNESCAPED_UNICODE );
                        exit;
                    }
                }else{
                    echo 0;
                }
                mysqli_close($conection);
            }else{
                echo 0;
            }
        break;

    }


?>