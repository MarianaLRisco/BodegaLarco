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

    function listarProveedores(){
        $sentencia = "SELECT p.idproveedor,p.proveedor,p.contacto, p.telefono,p.direccion FROM proveedor p";
        $data = $this->Ejecutar($sentencia,0);
        return $data;
    }
        
    


}


?>