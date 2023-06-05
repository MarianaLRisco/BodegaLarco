<?php
require "../config/Conexion.php";

class Cliente{
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

    function obtenerclienteid($id){
        $sentencia = "SELECT * FROM cliente where idcliente='$id'";
        $data = $this->Ejecutar($sentencia,0);
        return $data;

    }

    function listaCliente(){
        $sentencia = "SELECT * FROM `cliente`";
        $data = $this->Ejecutar($sentencia,0);
        return $data;
    }   
    //Funciones del crud
    function ActualizarCliente($id,$dni,$nombre,$apellido,$telefono,$direccion){
        $sentencia = "UPDATE cliente SET DNI='$dni',nombre='$nombre',apellido='$apellido',telefono='$telefono',direccion='$direccion' WHERE idcliente='$id';";
        $this->Ejecutar($sentencia,1);
    }
    function EliminarCliente($id){
        $sentencia = "UPDATE cliente SET estado_c=0 WHERE idcliente='$id';";
        $this->Ejecutar($sentencia,1);
    }
    
}


?>