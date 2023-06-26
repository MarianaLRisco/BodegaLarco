<?php
include('model/menu.php');
include('model/inicio.php');
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
    <link rel='stylesheet' href='css/system.css?t868'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="assets/libs/parallax.js"></script>
    <script src="libs/jquery-3.6.1.min.js" charset="utf-8"></script>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Mukta:wght@500&family=Yantramanav:wght@100;300;400;700;900&display=swap" rel="stylesheet">
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
                    <div class="item-info mb-3">
                    <div class="info mb-3 border-bottom ">Ubicación Bodega Larco</div>
                    </div>
                   
                   

                    <div class="random-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor, nunc nec malesuada faucibus, sapien est hendrerit enim, at congue nisl sapien vel nisi. Nullam ullamcorper, purus id viverra condimentum, mi sem tristique lacus, at gravida risus nulla non diam. Donec aliquet rutrum nibh, a efficitur erat vehicula eu. Vestibulum non ullamcorper nisi, ac ullamcorper sem. Sed iaculis mi eu eleifend fringilla. Etiam facilisis tortor ac elit malesuada pulvinar. Nunc nec magna vestibulum, fringilla ligula ut, efficitur lorem. Vestibulum faucibus facilisis orci, in faucibus massa consectetur eget. Sed ac quam interdum, mollis erat in, euismod orci. Vestibulum laoreet, urna vitae tempus scelerisque, quam tortor placerat elit, eget ultricies nunc mauris a risus. Integer vulputate urna sit amet diam venenatis scelerisque. Suspendisse vitae risus facilisis, volutpat magna et, ultrices tellus.
                    </div>
                    <div class="random-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor, nunc nec malesuada faucibus, sapien est hendrerit enim, at congue nisl sapien vel nisi. Nullam ullamcorper, purus id viverra condimentum, mi sem tristique lacus, at gravida risus nulla non diam. Donec aliquet rutrum nibh, a efficitur erat vehicula eu. Vestibulum non ullamcorper nisi, ac ullamcorper sem. Sed iaculis mi eu eleifend fringilla. Etiam facilisis tortor ac elit malesuada pulvinar. Nunc nec magna vestibulum, fringilla ligula ut, efficitur lorem. Vestibulum faucibus facilisis orci, in faucibus massa consectetur eget. Sed ac quam interdum, mollis erat in, euismod orci. Vestibulum laoreet, urna vitae tempus scelerisque, quam tortor placerat elit, eget ultricies nunc mauris a risus. Integer vulputate urna sit amet diam venenatis scelerisque. Suspendisse vitae risus facilisis, volutpat magna et, ultrices tellus.
                    </div>
                    <div class="random-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor, nunc nec malesuada faucibus, sapien est hendrerit enim, at congue nisl sapien vel nisi. Nullam ullamcorper, purus id viverra condimentum, mi sem tristique lacus, at gravida risus nulla non diam. Donec aliquet rutrum nibh, a efficitur erat vehicula eu. Vestibulum non ullamcorper nisi, ac ullamcorper sem. Sed iaculis mi eu eleifend fringilla. Etiam facilisis tortor ac elit malesuada pulvinar. Nunc nec magna vestibulum, fringilla ligula ut, efficitur lorem. Vestibulum faucibus facilisis orci, in faucibus massa consectetur eget. Sed ac quam interdum, mollis erat in, euismod orci. Vestibulum laoreet, urna vitae tempus scelerisque, quam tortor placerat elit, eget ultricies nunc mauris a risus. Integer vulputate urna sit amet diam venenatis scelerisque. Suspendisse vitae risus facilisis, volutpat magna et, ultrices tellus.
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
</body>