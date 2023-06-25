<?php
     
    include "conexion.php";
    session_start();
    if(!empty($_POST)){
        $aler='';
        if(empty($_POST['proveedor'])||empty($_POST['nombre'])||empty($_POST['precio'])||empty($_POST['cantidad'])||empty($_POST['categoria'])
        ){
            $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Debe llenar todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }else{
            $proveedor=$_POST['proveedor'];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $categoria=$_POST['categoria'];
            

            $query = mysqli_query($conection, "SELECT * FROM producto WHERE nombre = '$nombre'");
            $result = mysqli_fetch_array($query);
            if($result > 0){
                $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">El Producto ya esta registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }else{
                $query_insert = mysqli_query($conection,"INSERT INTO producto(proveedor,nombre,precio,cantidad,idcategoria)
                VALUES ('$proveedor','$nombre','$precio','$cantidad','$categoria')");
                if($query_insert){
                    $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Producto registrado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }else{
                    $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error al registrar el producto.
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
                            <h1>Registrar Productos</h1>
                        </div>
                        <div class="mb-2">
                            <form action="" method='post'>
                                <div class="mb-2">
                                <label for="nombre">Proveedor</label>
                                    <?php
                                        $query_rol = mysqli_query($conection, 'SELECT proveedor.idproveedor, proveedor.proveedor FROM proveedor');
                                        $result_rol= mysqli_num_rows($query_rol)
                                        
                                        
                                    ?>
                                    <select class="form-select" name="proveedor" id="proveedor">
                                        <?php
                                            if($result_rol > 0){
                                                while($rol = mysqli_fetch_array($query_rol)){ 
                                        ?>
                                        <option value="<?php echo $rol['idproveedor']?>"><?php echo $rol['proveedor']?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-2"> 
                                <label for="contacto">Producto</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Producto">
                                </div>
                                <div class="mb-2"> 
                                <label for="precio">Precio</label>
                                <input type="number" step="0.01" class="form-control" name="precio" id="precio" placeholder="Precio de producto">
                                </div>
                                <div class="mb-2"> 
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad de producto">
                                <div class="mb-2">
                                <label for="nombre">Categoria</label>
                                    <?php
                                        $query_rol = mysqli_query($conection, 'SELECT c.idcategoria, c.nombre FROM categoria c');
                                        $result_rol= mysqli_num_rows($query_rol)
                                        
                                        
                                    ?>
                                    <select class="form-select" name="categoria" id="categoria">
                                        <?php
                                            if($result_rol > 0){
                                                while($rol = mysqli_fetch_array($query_rol)){ 
                                        ?>
                                        <option value="<?php echo $rol['idcategoria']?>"><?php echo $rol['nombre']?></option>
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