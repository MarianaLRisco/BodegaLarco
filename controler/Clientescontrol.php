<?php
    
    require "../model/clientes.php";
    
    $cli = new Cliente();

    switch($_REQUEST["op"]){

        case "obtenercliente":
            if(isset($_POST["cliente_id"])){
                $usuario = $cli->obtenerclienteid($_POST["cliente_id"]);
                $data[]=array(
                    "ID"=>$usuario[0]["idcliente"],
                    "DNI"=>$usuario[0]["DNI"],
                    "Nombre"=>$usuario[0]["nombre"],
                    "Apellido"=>$usuario[0]["apellido"],
                    "Telefono"=>$usuario[0]["telefono"],
                    "Direccion"=>$usuario[0]["direccion"],  
                );
                echo json_encode($data);
            }
        
        break;
 
        case 'EditarCliente':
            if (isset($_POST['id'])) {
                if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && 
                !empty($_POST['direccion'])) {
                    $id = $_POST['id'];
                    $dni = $_POST['dni'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $correo = $_POST['telefono'];
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
        

    }


?>