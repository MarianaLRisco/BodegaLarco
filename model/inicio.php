<?php
require ('./bd/conexion.php');
// Users
$sentencia = "SELECT COUNT(idusuario) AS cantidad_usuarios FROM usuario";
$cantidadU=$conection->query($sentencia);

$row = $cantidadU->fetch_assoc();
$cantidadUsuarios = $row['cantidad_usuarios'];

// Customers
$sentencia1 = "SELECT COUNT(idcliente) AS cantidad_cliente FROM cliente";
$cantidadC=$conection->query($sentencia1);

$rowC = $cantidadC->fetch_assoc();
$cantidadCliente = $rowC['cantidad_cliente'];

// Suppliers
$sentencia2 = "SELECT COUNT(idproveedor) AS cantidad_pro FROM proveedor";
$cantidadP=$conection->query($sentencia2);

$rowP = $cantidadP->fetch_assoc();
$cantidadPro = $rowP['cantidad_pro'];


?>