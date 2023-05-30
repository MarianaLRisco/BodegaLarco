<?php
class Conexion{
    var $conex;

    function __construct()
    {
        
    }

    function Conectar(){
        require_once "Global.php";
        $this->conex = mysqli_connect(servidor,username,password,database);
        if (!$this->conex) {
            echo "Error en la conexion a la base de datos";
        }
    }

    function Consulta($query,$op){
        $rpta = mysqli_query($this->conex,$query);
        if ($op == 0) {
            while($row = mysqli_fetch_array($rpta)){
                $datos[] = $row;
            }
        }else {
            $datos[]="";
        }
        $registros = isset($datos) ? $datos:null;
        if($registros){
            return $registros;
        }

    }

    function desconectar(){
        mysqli_close($this->conex);
    }


}


?>