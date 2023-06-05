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

    function ActualizarProveedore($id,$proveedor,$contacto,$dni,$telefono,$direccion){
        $sentencia = "UPDATE proveedro set proveedor='$proveedor',contato='$contacto',DNI='$dni',telefono='$telefono',direccion='$direccion'";
        $data = $this->Ejecutar($sentencia,1);
        return $data;
    }
        
    


}


?>