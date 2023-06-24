<?php
include "conexion.php";
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Bootstrap CSS -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='css/system.css?6968'>
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Title -->
    <title>Sistema de inventarios</title>
</head>

<body>
    <?php require "header.php"; ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require "menu_desplegabel.php"; ?>
            <!-- sona para poner datos del panel. -->
            <body>
                <div class="container-lg flex">
                    <div class="container-sm container-md-max h-100">
                        <div>
                            <br>
                            <h1>Bienvenido a Larco</h1>
                            <br>
                        </div>
                        <div class="rectangle">
                            <div class="option">
                                <i class="fas fa-users-cog"></i>
                                <a href="Listar_usuarios.php"><span>Usuarios</span></a>
                            </div>
                            <div class="option">
                                <i class="fas fa-users"></i>
                                <a href="Listar_clientes.php"><span>Clientes</span></a>
                            </div>
                            <div class="option">
                                <i class="fas fa-box"></i>
                                <a href="Listar_productos.php"><span>Productos</span></a>
                            </div>
                            <div class="option">
                                <i class="fas fa-truck"></i>
                                <a href="Listar_proveedores.php"><span>Proveedores</span></a>
                            </div>
                            <div class="option">
                                <i class="fas fa-shopping-cart"></i>
                                <a href="Registrar_ventas.php"><span>Ventas</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            </body>

        </div>
    </div>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?7796"></script>
</body>