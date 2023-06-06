<?php
    
    require "../model/proveedores.php";
    session_start();
    $prov = new Proveedor();

    switch($_REQUEST["op"]){

        case "actualizarproveedor":
            if (isset($_POST['id'])) {
                if (!empty($_POST['proveedor']) &&!empty($_POST['contacto']) && !empty($_POST['dni'])&& !empty($_POST['telefono']) && !empty($_POST['direccion'])) {
                    $id = $_POST['id'];
                    $proveedor = $_POST['proveedor'];
                    $contacto = $_POST['contacto'];
                    $dni = $_POST['dni'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $prov->actualizarproveedor($id,$proveedor,$contacto,$dni,$telefono,$direccion);
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