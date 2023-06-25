<?php
    
    require "../model/clientes.php";
    include "../conexion.php";
    session_start();
    $cli = new Cliente();

    switch($_REQUEST["op"]){

        case 'EditarCliente':
            if (isset($_POST['id'])) {
                if (!empty($_POST['dni']) &&!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && 
                !empty($_POST['direccion'])) {
                    $id = $_POST['id'];
                    $dni = $_POST['dni'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $cli->ActualizarCliente($id,$dni,$nombre,$apellido,$telefono,$direccion);
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        
        break;
        case "eliminar_cliente":
            if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $cli->EliminarCliente($id);
                    echo 1;
                }else{
                    echo 0;
                }
        break;

        case 'BuscarClienteDNI':
            if (!empty($_POST['dni'])) {
                $dni= $_POST['dni'];
                $query = mysqli_query($conection,"SELECT * FROM cliente WHERE DNI LIKE '$dni' and estado_c=1 " );
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