<?php
    
    require "../model/usuarios.php";
    session_start();
    $usr = new Usuario();

    switch($_REQUEST["op"]){
        

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

        case "eliminar_usuario":
            if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $usr->EliminarUsuario($id);
                    echo 1;
                }else{
                    echo 0;
                }
        break;
        

    }


?>