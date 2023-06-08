<?php
require "../config/Conexion.php";

class Proveedor{

    private $cnx;

    function __construct(){
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

    function ActualizarProveedor($id,$proveedor,$contacto,$dni,$telefono,$direccion){
        $sentencia = "UPDATE proveedor set proveedor='$proveedor',contacto='$contacto',DNI='$dni',telefono='$telefono',direccion='$direccion' where idproveedor='$id'";
        $this->Ejecutar($sentencia,1);
    }
    function EliminarProveedor($id){
        $sentencia = "UPDATE proveedor SET estado_P=0 WHERE idproveedor='$id';";
        $this->Ejecutar($sentencia,1);
    }
        
    


}


?>