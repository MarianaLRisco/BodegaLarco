<?php
     
    include "conexion.php";
    session_start();
    if(!empty($_POST)){
        $aler='';
        if(empty($_POST['proveedor'])||empty($_POST['contacto'])||empty($_POST['telefono'])||empty($_POST['direccion'])||empty($_POST['dni'])
        ){
            $aler = '<div class="alert alert-danger" role="alert">Debe llenar todos los campos</div>';
        }else{
            $dni=$_POST['dni'];
            $contacto=$_POST['contacto'];
            $proveedor=$_POST['proveedor'];
            $telefono=$_POST['telefono'];
            $direccion=$_POST['direccion'];
            

            $query = mysqli_query($conection, "SELECT * FROM proveedor WHERE DNI = '$dni'");
            $result = mysqli_fetch_array($query);
            if($result > 0){
                $aler = '<div class="alert alert-danger" role="alert">El DNI ya esta registrado</div>';
            }else{
                $query_insert = mysqli_query($conection,"INSERT INTO proveedor(proveedor,contacto,DNI,telefono,direccion)
                VALUES ('$proveedor','$contacto','$dni','$telefono','$direccion')");
                if($query_insert){
                    $aler = '<div class="alert alert-success" role="alert">Proveedor registrado exitosamente.</div>';
                }else{
                    $aler = '<div class="alert alert-danger" role="alert">Error al registrar el Proveedor.</div>';
                }
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <!-- Bootstrap CSS -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel='stylesheet' href='css/system.css?474'>
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
    <?php require "header.php";?>
    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark flex-column min-vh-100" data-bs-toggle="sidebar" id="sidebar">
                <div href="/" class="d-flex align-items-center link-dark text-decoration-none border-bottom">
                    <img src="imagenes/sinfoto.png" alt="" width="52" height="52" class="rounded-circle me-2">
                    <p class='text-light text-center order-2'><?php echo $_SESSION['nombre'] ?><br><?php echo $_SESSION['apellido'] ?></p>
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <?php require "menu_desplegabel.php";?>
                </ul>
                
            </div>
            <div class="col-10 flex-shrink-0 ">
                
                <section class="d-flex justify-content-center">
                    <div class="card col-sm-6 p-3">
                        <div>
                            <h1>Registrar Proveedores</h1>
                        </div>
                        <div class="mb-2">
                            <form action="" method='post'>
                                <label for="nombre">Proveedor</label>
                                <input type="text" class="form-control" name="proveedor" id="proveedor" placeholder="ej. Coca-Cola">
                                </div>
                                <div class="mb-2"> 
                                <label for="contacto">Contacto</label>
                                <input type="text" class="form-control" name="contacto" id="contacto" placeholder="ej. Silva Castillo">
                                </div>
                                <div class="mb-2"> 
                                <label for="dni">DNI</label>
                                <input type="text" pattern="[0-9]{8}" class="form-control" name="dni" id="dni" placeholder="ej. 71722752">
                                </div>
                                <div class="mb-2"> 
                                <label for="telefono">Telefono</label>
                                <input type="tel" pattern="[0-9]{9}" class="form-control" name="telefono" id="telefono" placeholder="ej. 965754024">
                                </div>
                                <div class="mb-2"> 
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="ej. av. jose galvez 254">
                                </div>
                                <div class='alert'>
                                    <?php echo isset($aler) ? $aler :''; ?>
                                </div>
                                <div class="mb-2 text-center"> 
                                    <button class="btn btn-primary" type="submit" value="crear usuario">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
        

        
</body>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/getdate.js?869"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/menu.js?7796"></script>