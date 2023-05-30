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
    <link rel='stylesheet' href='css/system.css?474'>
    <script src="assets/libs/jquery-3.7.0.min.js" charset="utf-8"></script>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" stylesheethref="assets/plugins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Title -->
    <title>Sistema de inventarios</title>
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
                        <li><a class="item dropdown-item " href="#">Settings</a></li>
                        <li><a class="item dropdown-item " href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="item dropdown-item" href="#">Sign out</a></li>
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
                <section>
                    <div class="container-lg ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 clas="d-inline-block align-text-top h3">Lista de Clientes</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-success table-striped" id="lista_clientes">
                            <thead width='90%'>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($conection,"SELECT * FROM cliente where estado=1 ORDER BY idcliente");
                                $resul = mysqli_num_rows($query);
                                if($resul >0){
                                    while($data = mysqli_fetch_array($query)){
                                    $id = $data["idcliente"];
                  
                            ?>
                            
                                <tr>
                                    <td><?php echo $data["idcliente"]?></td>
                                    <td><?php echo $data["DNI"]?></td>
                                    <td><?php echo $data["nombre"]?></td>
                                    <td><?php echo $data["apellido"]?></td>
                                    <td><?php echo $data["telefono"]?></td>
                                    <td><?php echo $data["direccion"]?></td>
                                    <td>
                                    <button class="btn btn-sm btn-success" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" 
                                     data-bs-toggle="modal" data-bs-target="#editar_cliente" onclick="ObtenerClienteID(<?php echo $id; ?>);">Editar</button>
                                    <button class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#eliminar_cliente">Eliminar</button>
                                    </td>
                                    

                                </tr>
                            <?php
                             }
                            }
                            ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="Registrar_Usuarios.php" role="button">Crear Cliente</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Modal para editar -->
    <div class="modal fade" id="editar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="id" name="id">
                        <div class="mb-2">
                            <label for="DNI">DNI</label>
                            <input type="number" class="form-control" name="dni" id="dni">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Telefono</label>
                            <input type="email" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <div class="mb-2" id="message">
                        </div>
                        <div class="mb-2 text-center">
                            <button  class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-primary" href="#" onclick="ActualizarCliente();">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para eliminar -->
    <div class="modal fade" id="eliminar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-2 text-center">
                           

                        </div>
                    
                        <div class="mb-2 text-center">
                            <button  class="btn btn-secondary" href="#" data-bs-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-danger" href="#" >Eliminar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Essential javascripts for application to work-->
    <!-- Essential javascripts for application to work-->
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?7796"></script>
    <script src="assets/libs/jquery-3.7.0.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/scripst/clientes.js"></script>

</body>