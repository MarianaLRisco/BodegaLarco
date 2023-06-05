<?php
require "../config/Conexion.php";

class Usuario{
    private $cnx;

    function __construct()
    {
     $this->cnx = new Conexion();   
    }

    function Ejecutar($sentencia,$op){
        $this->cnx -> Conectar();
        if($op == 0){
            $data = $this->cnx -> Consulta($sentencia,$op);
            $this->cnx -> desconectar();
            return $data;
        }else{
            $this->cnx -> Consulta($sentencia,$op);
            $this->cnx -> desconectar();
        }
        
        
    }

    function obtenerusuarioid($id){
        $sentencia = "SELECT * FROM usuario where idusuario='$id'";
        $data = $this->Ejecutar($sentencia,0);
        return $data;

    }

    function listaUsuarios(){
        $sentencia = "SELECT u.idusuario,u.DNI, u.apellido, u.nombre, u.correo, u.usuario,u.clave, r.rol FROM usuario u inner join rol r WHERE r.idrol=u.rol order by u.idusuario;";
        $data = $this->Ejecutar($sentencia,0);
        return $data;
    }   
    //Funciones del crud
    function ActualizarUsuario($id,$dni,$nombre,$apellido,$correo,$usuario,$clave,$rol){
        $sentencia = "UPDATE usuario SET DNI='$dni',nombre='$nombre',Apellido='$apellido',correo='$correo',usuario='$usuario',clave='$clave',rol='$rol' WHERE idusuario='$id';";
        $this->Ejecutar($sentencia,1);
    }

    function EliminarUsuario($id){
        $sentencia = "UPDATE usuario SET estado_u=0 WHERE idusuario='$id';";
        $this->Ejecutar($sentencia,1);
    }

    
}


?>