<?php

include "bd/conexion.php";
session_start();
if (!empty($_POST)) {
    $aler = '';
    if (
        empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['usuario']) || empty($_POST['correo']) ||
        empty($_POST['clave']) || empty($_POST['rol'] || empty($_POST['dni']))
    ) {
        $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert" >Debe llenar todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];

        $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$usuario' OR correo = '$correo' ");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">El correo o usuario ya existe
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO usuario(DNI,nombre,apellido,correo,usuario,clave,rol)
                VALUES ('$dni','$nombre','$apellido','$correo','$usuario','$clave','$rol')");
            if ($query_insert) {
                $aler = '<div class="alert alert-success  alert-dismissible fade show" role="alert">Usuario registrado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
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
    <script src="assets/libs/jquery-3.7.0.min.js" charset="utf-8"></script>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/b9a5eec5a5.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Title -->
    <title>Sistema de inventarios</title>
    <style>
        .transparent-hr {
            border: none;
            height: 1px;
            background-color: transparent;
        }

        .size {
            width: 70px;
        }

        #btn_agregar {
            display: none;
        }
    </style>

</head>

<body>
    <?php require "header.php"; ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require "menu_desplegable.php"; ?>
            <div class="col-10 flex-shrink-0 ">
                <section class="d-flex justify-content-center ">
                    <div class="card col-sm-6 p-3 w-75">
                        <div>
                            <h1>Registrar Venta</h1>
                        </div>
                        <hr>
                        <div class="mb-2 container  ">
                            <form action="" method='post'>
                                <h4>Datos Cliente</h4>
                                <div class="row border rounded">
                                    <hr class="transparent-hr">
                                    </hr>
                                    <input type="hidden" name='idcliente' id="idcliente">
                                    <div class="col">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control" name="dni" id="dni">
                                    </div>
                                    <div class="col">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control bg-light" name="nombre" id="nombre" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control  bg-light" name="apellido" id="apellido" readonly>
                                    </div>
                                    <div>
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control bg-light" name="direccion" id="direccion" readonly>
                                        <hr class="transparent-hr">
                                        </hr>
                                    </div>
                                    <div class="text-center" id="registro_cliente">
                                        <a class="btn btn-primary btn_cliente" href="Registrar_Usuarios.php" role="button">Registrar Cliente</a>
                                    </div>
                                    <hr class="transparent-hr">
                                    </hr>
                            </form>
                        </div>
                        <hr class="transparent-hr">
                        </hr>
                        <div class="mb-2 row border rounded">
                            <table class="table">
                                <thead>
                                    <tr class="table-primary table-bordered">
                                        <th>Codigo</th>
                                        <th style="width: 150px;">Nombre</th>
                                        <th>Existencia</th>
                                        <th>cantidad</th>
                                        <th>Precio</th>
                                        <th>Precio total</th>
                                        <th>Accion</th>
                                    </tr>
                                    <tr>
                                        <td id="idproducto">--</td>
                                        <td>
                                            <input type="text" name="nombre_p" id="nombre_p">
                                        </td>
                                        <td id="existencias">--</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input class="form-control form-control-sm text-end" type="text" name="cantidad" id="cantidad" value="0" min="1" disabled>
                                            </div>
                                        </td>
                                        <td id="precio" class="text-end">0.00</td>
                                        <td id="precio_total" class="text-end">0.00</td>
                                        <td><a class="btn btn-primary" href="#" role="button" id='btn_agregar'>Agregar</a></td>
                                    </tr>
                                    <tr>
                                        <th>Codigo</th>
                                        <th colspan="2">Nombre</th>
                                        <th>cantidad</th>
                                        <th>Precio</th>
                                        <th>Precio total</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td colspan="2">gaseosa cocacola</td>
                                        <td>1</td>
                                        <td class="text-end">6.50</td>
                                        <td class="text-end">6.50</td>
                                        <td><a class="btn btn-danger" href="#" role="button" onclick="event.preventDefault(); ">Eliminar</a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end">total</td>
                                        <td class="text-end">6.50</td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <hr class="transparent-hr">
                        </hr>
                        <div class="mb-2 text-center">
                            <a href="#" class="btn btn-danger btn-lg active d-inline-block mx-2" role="button" aria-pressed="true">limpiar</a>
                            <a href="#" class="btn btn-primary btn-lg active d-inline-block mx-2" role="button" aria-pressed="true">Registrar</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



</body>
<!-- Essential javascripts for application to work-->
<script src="assets/libs/jquery-3.7.0.min.js"></script>
<script src="js/getdate.js?869"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/menu.js?7796"></script>
<script>
    $(document).ready(function() {
        //buscar cliente
        $("#dni").keyup(function(e) {
            e.preventDefault();
            var cl = $(this).val();
            parametros = {
                dni: cl,
            };
            $.ajax({
                data: parametros,
                url: "controler/Clientescontrol.php?op=BuscarClienteDNI",
                type: "POST",
                async: true,
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        $('#idcliente').val('');
                        $('#nombre').val('');
                        $('#apellido').val('');
                        $('#direccion').val('');
                        $('#registro_cliente').slideDown();
                    } else {
                        var data = $.parseJSON(response);
                        $('#idcliente').val(data.idcliente);
                        $('#nombre').val(data.nombre);
                        $('#apellido').val(data.apellido);
                        $('#direccion').val(data.direccion);
                        $('#registro_cliente').slideUp();
                    }
                },
                error: function() {},
            });
        });
        //buscar nombre
        $("#nombre_p").keyup(function(e) {
            e.preventDefault();
            var pd = $(this).val();
            parametros = {
                'nombre': pd,
            };
            $.ajax({
                data: parametros,
                url: "controler/Productoscontrol.php?op=BuscarProductoNombre",
                type: "POST",
                async: true,
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        $('#idproducto').html('--');
                        $('#existencias').html('--');
                        $('#precio').html('');

                    } else {
                        var data = $.parseJSON(response);

                        $('#idproducto').html(data.idproducto);
                        $('#existencias').html(data.cantidad);
                        $('#cantidad').val('1');
                        $('#precio').html(data.precio);
                        $('#precio_total').html(data.precio);

                        $('#cantidad').removeAttr('disabled');
                        $('#btn_agregar').slideDown();

                    }

                },
                error: function() {},
            });
        });

        $('#cantidad').keyup(function(e) {
            e.preventDefault();
            var precio_total = $(this).val() * $('#precio').html();


            if ($(this).val() < 1 || isNaN($(this).val()) || $(this).val() > $('#existencias').html()) {
                $('#precio_total').html('--');
                $('#btn_agregar').slideUp();
            } else {
                $('#precio_total').html(precio_total);
                $('#btn_agregar').slideDown();
            }
        });
    });
</script>