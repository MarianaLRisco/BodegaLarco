<?php
    include "conexion.php"; 

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
    <link rel='stylesheet' href='css/system.css?474'>
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>
    
    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Title -->
    <title>Sistema de inventarios</title>
    <style>
    .rectangle {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background-color: #f2f2f2;
      border: 1px solid #ccc;
      border-radius: 5px;
      border: 4px solid black;
    }


    .option {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #333;
    }

    .option i {
      font-size: 45px;
      margin-bottom: 5px;
    }

    .option span {
      font-size: 16px;
    }

    h1 {
     text-align: center;
    }

  </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="container-icon" data-toggle="sidebar" aria-label="Hide Sidebar">
                <ion-icon name="menu"></ion-icon>
            </div>
            <div class="fluid d-flex align-items-center">
                <img src="imagenes/LARCO.png" class="logo d-inline-block">
                <h1 class="text d-inline-block">Bodega Larco</h1>
            </div>
            <div class="user-info">
                <div class="text-date d-inline-block" id="header-right"></div>
                <div class="container-icon dropdown">
                    <a href="#" class="d-flex dropdown-toggle align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user menu"></i> <span class="ms-1 d-none d-sm-inline"></span> 
                    </a>
                    <ul class="dropdown-menu  text-small shadow">
                        <li><a class="item dropdown-item " href="#">Configuración</a></li>
                        <li><a class="item dropdown-item " href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="item dropdown-item" href="#">Cerrar Sesion</a></li>
                    </ul>
                </div>
                
                <!-- <button class="btn btn-primary d-inline-block" type="submit"> <ion-icon name="log-out-outline"></ion-icon> Cerrar Sesion</button> -->
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark flex-column min-vh-100" data-bs-toggle="sidebar" id="sidebar">
                <div href="/" class="d-flex align-items-center link-dark text-decoration-none border-bottom">
                    <img src="imagenes/sinfoto.png" alt="" width="52" height="52" class="rounded-circle me-2">
    
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <?php require "menu_desplegabel.php";?>
                </ul>
                
            </div>
            <div class="col-10 flex-shrink-0 ">
                <!-- sona para poner datos del panel. -->
                <body>
                <div class="container-lg flex">
                <div class="container-sm container-md-max h-100">
                    <div>
                        <br>
                        <h1>Bienvenido al Sistema Web</h1>
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
    </div>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?7796"></script>
</body>