<?php
    
    require "../model/proveedores.php";
    session_start();
    $prov = new Proveedor();

    switch($_REQUEST["op"]){

        case 'listaProveedores':
            $data = $prov->listarProveedores();
            $list = array();
            for($i=0;$i<count($list);$i++){
                $list[]= array(
                    "0"=>$data[$i]["idproveedor"],
                    "1"=>$data[$i]["proveedor"],
                    "2"=>$data[$i]["contacto"],
                    "3"=>$data[$i]["telefono"],
                    "4"=>$data[$i]["direccion"],
                    "5"=>'<button class="btn btn-sm btn-success" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" data-bs-toggle="modal" data-bs-target="#editar_usuario" onclick="ObtenerUsuarioID('.$data[$i]['idusuario'].');">Editar</button><button class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#">Eliminar</button>'
                    
                );
            }
            $resultados=array(
                "sEcho"=>1,
                "iTotalRecords"=>count($list),
                "iTotalDisplayRecords"=>count($list),
                "aaData"=>$list,
            );
            echo json_encode($resultados);

        break;
    }

?>