<?php
require ('./bd/conexion.php');
session_start();

// INFO MENU

$name = $_SESSION['nombre'];
$sentencia = "SELECT r.rol AS  rol FROM usuario AS u INNER JOIN rol AS r ON u.rol = r.idrol WHERE u.nombre = '$name';";
$rol=$conection->query($sentencia);

$rowR = $rol->fetch_assoc();
$rol = $rowR['rol'];
?>