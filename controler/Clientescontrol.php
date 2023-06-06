<?php
    
    require "../model/clientes.php";
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

    }


?>