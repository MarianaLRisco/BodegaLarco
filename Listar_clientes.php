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
    <?php require "header.php"; ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require "menu_desplegabel.php"; ?>
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
                                $query = mysqli_query($conection, "SELECT * FROM cliente where estado_c=1 ORDER BY idcliente");
                                $resul = mysqli_num_rows($query);
                                if ($resul > 0) {
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id = $data["idcliente"];

                                ?>
                                        <tr>
                                            <td><?php echo $data["idcliente"] ?></td>
                                            <td><?php echo $data["DNI"] ?></td>
                                            <td><?php echo $data["nombre"] ?></td>
                                            <td><?php echo $data["apellido"] ?></td>
                                            <td><?php echo $data["telefono"] ?></td>
                                            <td><?php echo $data["direccion"] ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-success btn-editar-cliente" data-bs-toggle="modal" data-bs-target="#editar_cliente" data-id="<?php echo $data["idcliente"] ?>">Editar</button>
                                                <button class="btn btn-sm btn-danger btnEliminar" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $data["idcliente"] ?>" data-nombre="<?php echo $data["nombre"] ?>" data-apellido="<?php echo $data["apellido"] ?>" data-dni="<?php echo $data["DNI"] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="Registrar_Usuarios.php" role="button">Registrar Cliente</a>
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
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-2">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="mb-2">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="mb-2">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <div class="mb-2" id="message">
                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-primary" href="#" onclick="ActualizarClientes();">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar_e">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p id="pregunta">¿Estás seguro de que deseas eliminar este registro?</p>
                    <p id="registroNombre"></p>
                    <p id="registroApellido"></p>
                    <p id="registroDNI"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal" id="salir_e">Cancelar</button>
                    <button class="btn btn-danger" id="btnEliminarRegistro">Eliminar</button>
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
    <script>
        // Captura el evento clic del botón "Editar" en la tabla
        $(document).on('click', '.btn-editar-cliente', function() {
            // Obtiene los valores de los campos de la fila correspondiente
            var id = $(this).data('id');
            var columna1 = $(this).closest('tr').find('td:eq(1)').text().trim();
            var columna2 = $(this).closest('tr').find('td:eq(2)').text().trim();
            var columna3 = $(this).closest('tr').find('td:eq(3)').text().trim();
            var columna4 = $(this).closest('tr').find('td:eq(4)').text().trim();
            var columna5 = $(this).closest('tr').find('td:eq(5)').text().trim();

            // Actualiza los valores en el modal
            $('#id').val(id);
            $('#dni').val(columna1);
            $('#nombre').val(columna2);
            $('#apellido').val(columna3);
            $('#telefono').val(columna4);
            $('#direccion').val(columna5);

        });


        $(document).ready(function() {
            $('.btnEliminar').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var apellido = $(this).data('apellido');
                var dni = $(this).data('dni');
                $('#registroNombre').text('Nombre: ' + nombre);
                $('#registroApellido').text('Apellido: ' + apellido);
                $('#registroDNI').text('DNI: ' + dni);
                $('#myModal').modal('show');

                $('#btnEliminarRegistro').click(function() {
                    $.ajax({
                        url: 'controler/Clientescontrol.php?op=eliminar_cliente',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response == 1) {
                                $('#registroNombre').text('');
                                $('#registroApellido').text('');
                                $('#registroDNI').text('');
                                $('#salir_e').html('Salir');
                                $('#pregunta').text('El cliente se ha eliminado corectamente.');
                                boton.hide();
                                $('#salir_e, #cerrar_e').click(function() {
                                    $('button[data-id="' + id + '"]').closest('tr').remove();
                                })
                            } else {
                                $('#registroNombre').text('');
                                $('#registroApellido').text('');
                                $('#registroDNI').text('');
                                $('#salir_e').html('Salir');
                                $('#pregunta').text('El cliente no se ha eliminado.');
                                boton.hide();
                            }
                        }
                    });
                });
            });
        });
    </script>
    </script>

</body>