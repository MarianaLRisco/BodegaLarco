<?php
include('model/menu.php');
include('model/inicio.php');
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- Bootstrap CSS -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='css/system.css?584'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="assets/libs/parallax.js"></script>
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="imagenes/LARCO.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Mukta:wght@500&family=Yantramanav:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Title -->
    <title>Sistema de inventarios</title>
</head>

<body>
    <?php require "header.php"; ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require "menu_desplegable.php"; ?>
            <!-- sona para poner datos del panel. -->

            <div class="container-lg col-10 flex-shrink-0">
                <div class="container-sm container-md-max h-100">
                    <div class="titulo d-flex">
                        <h1>Bienvenido a Larco</h1>
                        <img src="imagenes/LARCO.png" class="img d-inline-block">
                    </div>
<!--                     
                    <div class="rectangle">
                        <div class="option">
                            <a href="Listar_usuarios.php">
                                <i class="fas fa-users-cog"></i><br>
                                <span>Usuarios</span>
                            </a>
                        </div>
                        <div class="option">
                            <a href="Listar_clientes.php">
                                <i class="fas fa-users"></i><br>
                                <span>Clientes</span>
                            </a>
                        </div>
                        <div class="option">
                            <a href="Listar_productos.php">
                                <i class="fas fa-box"></i><br>
                                <span>Productos</span>
                            </a>
                        </div>
                        <div class="option" >
                            <a href="Listar_proveedores.php">
                                <i class="fas fa-truck"></i><br><span>Proveedores</span>
                            </a>
                        </div>
                        <div class="option">
                            <a href="Registrar_ventas.php">
                                <i class="fas fa-shopping-cart"></i><br>
                                <span>Ventas</span>
                            </a>
                        </div>
                    </div>
                    -->
                    <div class="row mb-3">
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-small primary coloured-icon"><i class="icon fas fa-users-cog fa-3x"></i>
                                <div class="info">
                                    <h4>Usuarios</h4>
                                    <p><b><?php echo $cantidadUsuarios; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-small info coloured-icon"><i class="icon fas fa-users fa-3x"></i>
                                <div class="info">
                                    <h4>Clientes</h4>
                                    <p><b><?php echo $cantidadCliente; ?></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-small warning coloured-icon"><i class="icon fas fa-truck fa-3x"></i>
                                <div class="info">
                                    <h4>Proveedores</h4>
                                    <p><b><?php echo $cantidadPro; ?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parallax-container" data-speed="0.5" alt=""></div>
                    <div class="item-info mb-3">
                        <div class="info mb-3 border-bottom ">Acerca de la Empresa</div>
                        <div class="texto">
                            Somos Bodega Larco, una pequeña y dedicada empresa comprometida en brindar un servicio excepcional a nuestros valiosos clientes. Dirigida con pasión por la emprendedora Carmen Pretel Terrones, nuestra bodega se destaca por su atención personalizada y el deseo de crear una experiencia memorable para cada cliente.
                            <br>En Bodega Larco, nos dedicamos a ofrecer una amplia variedad de productos de alta calidad, incluyendo abarrotes, licores, cervezas y mucho más. Nuestro objetivo es proporcionar a nuestros clientes una selección cuidadosamente curada, que destaque por su excelencia y variedad, para satisfacer los gustos y preferencias más exigentes.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div id="map" style="width: 100%; height: 352px;"></div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="item-info mb-3">
                                <div class="info mb-3 border-bottom ">Ubicación Bodega Larco</div>
                                <div class="texto mb-2">
                                    La bodega se encuentra estratégicamente ubicada en la región de La Libertad, más específicamente en la provincia de Gran Chimú, en el distrito de Cascas.
                                    <br>Nuestra dirección exacta es: Avenida Cajamarca N°114.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-lg-8">
                            <div class="item-info">
                                <div class="info mb-3 border-bottom ">Contáctanos</div>
                                <div class="texto">
                                    Trabajador, en caso desees comunicarte con un personal, aquí hay algunos números de contacto:
                                    <ul class="mt-3">
                                        <li class="subitem"><label class="bold">Propietaria:</label> +51 919697124 o <a class="enlace" href="https://wa.me/51919697124" target="_blank">enviar mensaje</a></li>
                                        <li class="subitem"><label class="bold">Administrador:</label> +51 968329331 o <a class="enlace" href="https://wa.me/51968329331" target="_blank">enviar mensaje</a>  </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <img src="imagenes/parallax.jfif" style="height: 295px; width:100%; border-radius:2px;"></img>
                        </div>
                        <!-- <div class="col-md-6 col-lg-3">
                            <img src="imagenes/parallax1.jfif" style="height: 300px; width:100%;"></img>
                        </div> -->
                    </div>
                    <div class="item-info mb-3">
                        <div class="info mb-3 border-bottom ">Necesitas Ayuda</div>
                        <div class="texto">
                            Puedes acceder a la documentación del sistema mediante <a class="enlace" href="#">este enlace.</a> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Essential javascripts for application to work-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/getdate.js?869"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/charts.js?488"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?575"></script>
    <script src="js/map.js?4855"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>

</body>