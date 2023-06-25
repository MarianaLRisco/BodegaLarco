<?php
     
    include "conexion.php";
    session_start();
    if(!empty($_POST)){
        $aler='';
        if(empty($_POST['nombre'])||empty($_POST['apellido'])||empty($_POST['usuario'])||empty($_POST['correo'])||
        empty($_POST['clave'])||empty($_POST['rol']||empty($_POST['dni']))
        ){
            $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert" >Debe llenar todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }else{
            $dni=$_POST['dni'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $usuario=$_POST['usuario'];
            $correo=$_POST['correo'];
            $clave=$_POST['clave'];
            $rol=$_POST['rol'];

            $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$usuario' OR correo = '$correo' ");
            $result = mysqli_fetch_array($query);
            if($result > 0){
                $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">El correo o usuario ya existe
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }else{
                $query_insert = mysqli_query($conection,"INSERT INTO usuario(DNI,nombre,apellido,correo,usuario,clave,rol)
                VALUES ('$dni','$nombre','$apellido','$correo','$usuario','$clave','$rol')");
                if($query_insert){
                    $aler = '<div class="alert alert-success  alert-dismissible fade show" role="alert">Usuario registrado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }else{
                    $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error al registrar el usuario.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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
                            <h1>Registrar Usuario</h1>
                        </div>
                        <div class="mb-2">
                            <form action="" method='post'>
                                <div class="mb-2"> 
                                <label for="nombre">DNI</label>
                                <input type="text" pattern="[0-9]{8}" class="form-control" name="dni" id="dni" placeholder="ej. 71722752">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="ej. Marco Antonio">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="ej. Silva Castillo">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo" placeholder="ej. hla234@gmail.com">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="ej. marcoS2">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Contraseña</label>
                                <input type="text" class="form-control" name="clave" id="clave" placeholder="ej. 12345">
                                </div>
                                <div class="mb-2"> 
                                <label for="nombre">Rol</label>
                                <?php
                                    $query_rol = mysqli_query($conection, 'SELECT rol.idrol, rol.rol FROM rol');
                                    $result_rol= mysqli_num_rows($query_rol)
                                    
                                    
                                ?>
                                <select class="form-select" name="rol" id="rol">
                                    <?php
                                        if($result_rol > 0){
                                            while($rol = mysqli_fetch_array($query_rol)){ 
                                    ?>
                                    <option value="<?php echo $rol['idrol']?>"><?php echo $rol['rol']?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
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