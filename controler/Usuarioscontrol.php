<?php
    
    require "../model/usuarios.php";
    session_start();
    $usr = new Usuario();

    switch($_REQUEST["op"]){
        case 'lista_usuarios':
            $data = $usr->listaUsuarios();
            $list = array();
            for($i=0; $i<count($data); $i++){
                $list[]=array(
                    "0"=>$data[$i]["idusuario"],
                    "1"=>$data[$i]["DNI"],
                    "2"=>$data[$i]["nombre"],
                    "3"=>$data[$i]["apellido"],
                    "4"=>$data[$i]["correo"],
                    "5"=>$data[$i]["usuario"],
                    "6"=>$data[$i]["clave"],
                    "7"=>$data[$i]["rol"],
                    "8"=>'<button class="btn btn-sm btn-success" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" data-bs-toggle="modal" data-bs-target="#editar_usuario" onclick="ObtenerUsuarioID('.$data[$i]['idusuario'].');">Editar</button><button class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#">Eliminar</button>'
                    
                );
            }
            $resultados = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($list),
                "iTotalDisplayRecords"=>count($list),
                "aaData"=>$list,
            );
            echo json_encode($resultados);

        
        break;

        case "obtenerusuario":
            if(isset($_POST["usuario_id"])){
                $usuario = $usr->obtenerusuarioid($_POST["usuario_id"]);
                $data[]=array(
                    "ID"=>$usuario[0]["idusuario"],
                    "DNI"=>$usuario[0]["DNI"],
                    "Nombre"=>$usuario[0]["nombre"],
                    "Apellido"=>$usuario[0]["Apellido"],
                    "Usuario"=>$usuario[0]["usuario"],
                    "Correo"=>$usuario[0]["correo"],
                    "Clave"=>$usuario[0]["clave"],
                    "Rol"=>$usuario[0]["rol"],   
                );
                echo json_encode($data);
            }
        
        break;

        case 'EditarUsuario':
            if (isset($_POST['id'])) {
                if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && 
                !empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['rol'])) {
                    $id = $_POST['id'];
                    $dni = $_POST['dni'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $correo = $_POST['correo'];
                    $usuario = $_POST['usuario'];
                    $clave = $_POST['clave'];
                    $rol = $_POST['rol'];
                    $usr->ActualizarUsuario($id,$dni,$nombre,$apellido,$correo,$usuario,$clave,$rol);
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