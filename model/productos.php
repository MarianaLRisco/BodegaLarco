<?php
require "../config/Conexion.php";

class Producto{
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

    function ActualizarProducto($id,$nombre,$categoria,$proveedor, $precio, $cantidad){
        $sentencia = "UPDATE producto SET nombre='$nombre',idcategoria='$categoria',proveedor='$proveedor',precio='$precio',
        cantidad='$cantidad' WHERE idproducto='$id';";
        $this->Ejecutar($sentencia,1);
    }

    function EliminarProducto($id){
        $sentencia = "UPDATE producto SET estado_c=0 WHERE idproducto='$id';";
        $this->Ejecutar($sentencia,1);
    }



}







?>