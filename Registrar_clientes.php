<?php

include "bd/conexion.php";
session_start();
if (!empty($_POST)) {
    $aler = '';
    if (
        empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['dni'])
    ) {
        $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Debe llenar todos los campos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];


        $query = mysqli_query($conection, "SELECT * FROM cliente WHERE DNI = '$dni'");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">El DNI ya esta registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO cliente(DNI,nombre,apellido,telefono,direccion)
                VALUES ('$dni','$nombre','$apellido','$telefono','$direccion')");
            if ($query_insert) {
                $aler = '<div class="alert alert-success alert-dismissible fade show" role="alert">Cliente registrado exitosamente. 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $aler = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error al registrar el Cliente.
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
    <link rel='stylesheet' href='css/system.css?4848'>
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
            <?php require "menu_desplegable.php"; ?>
            <div class="container-lg col-10 flex-shrink-0">
                <section class="d-flex justify-content-center">
                    <div class="card col-sm-6 p-3">
                        <div>
                            <h1>Registrar Cliente</h1>
                        </div>
                        <div class="mb-2">
                            <form action="" method='post' calss="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" pattern="[0-9]{8}" class="form-control" name="dni" id="dni" placeholder="ej. 71722752" required>
                                    <div class="invalid-feedback">Ingrese un número de 8 dígitos.</div>
                                </div>
                                <div class="mb-2">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="ej. Marco Antonio">
                                </div>
                                <div class="mb-2">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="ej. Silva Castillo">
                                </div>
                                <div class="mb-2">
                                    <label for="telefono">Telefono</label>
                                    <input type="tel" pattern="[0-9]{9}" class="form-control" name="telefono" id="telefono" placeholder="ej. 965754024">
                                    <div class="invalid-feedback">Ingrese un número de teléfono válido de 9 dígitos.</div>
                                </div>
                                <div class="mb-2">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="ej. av. jose galvez 254">
                                </div>
                                <div class="alert">
                                    <?php echo isset($aler) ? $aler : ''; ?>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>