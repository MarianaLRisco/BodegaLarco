<?php
include('model/menu.php');
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
    <link rel='stylesheet' href='css/system.css?586'>
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
            <?php require "menu_desplegable.php"; ?>
            <div class="col-10 flex-shrink-0 ">
                <section>

                    <div class="container-lg ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 clas="d-inline-block align-text-top h3">Lista de Usuarios</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-success table-striped" id="lista_usuarios">
                            <thead width='90%'>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conection, "SELECT u.idusuario,u.DNI, u.apellido, u.nombre, u.correo, u.usuario,u.clave, r.rol FROM usuario u inner join rol r WHERE r.idrol=u.rol and u.estado_u = 1 order by u.idusuario;");
                                $result = mysqli_num_rows($query);
                                if ($result > 0) {
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id = $data["idusuario"];
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $data["idusuario"] ?>
                                            </td>
                                            <td>
                                                <?php echo $data["DNI"] ?>
                                            </td>
                                            <td class="col_nombre">
                                                <?php echo $data["nombre"] ?>
                                            </td>
                                            <td class="col_apellido">
                                                <?php echo $data["apellido"] ?>
                                            </td>
                                            <td>
                                                <?php echo $data["correo"] ?>
                                            </td>
                                            <td>
                                                <?php echo $data["usuario"] ?>
                                            </td>
                                            <td>
                                                <?php echo $data["rol"] ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success btn-editar-usuario" data-bs-toggle="modal" data-bs-target="#editar_usuario" data-id="<?php echo $data["idusuario"] ?>">Editar</button>
                                                <button class="btn btn-sm btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $data["idusuario"] ?>" data-dni="<?php echo $data["DNI"] ?>" data-nombre="<?php echo $data["nombre"] ?>" data-apellido="<?php echo $data["apellido"] ?>">Eliminar</button>
                                            </td>
                                        </tr>
                                <?php

                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="Registrar_Usuarios.php" role="button">Crear usuario</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Modal para editar -->
    <div class="modal fade" id="editar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
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
                            <label for="nombre">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="mb-2">
                            <label for="nombre">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario">
                        </div>

                        <div class="mb-2">
                            <label for="nombre">Rol</label>
                            <?php
                            $query_rol = mysqli_query($conection, 'SELECT rol.idrol, rol.rol FROM rol');
                            $result_rol = mysqli_num_rows($query_rol)


                            ?>
                            <select class="form-select" name="rol" id="rol">
                                <?php
                                if ($result_rol > 0) {
                                    while ($rol = mysqli_fetch_array($query_rol)) {
                                ?>
                                        <option value="<?php echo $rol['idrol'] ?>"><?php echo $rol['rol'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-2" id="mensaje-actualizacion">

                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-primary" href="#" onclick="ActualizarUsuario();">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para eliminar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar_e">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="mb-2 text-center">
                    <p id='pregunta'>¿Estás seguro de que deseas eliminar este registro?</p>
                    <p id="deleteData_1"></p>
                    <p id="deleteData_2"></p>
                    <p id="deleteData_3"></p>
                </div>
                <div class="mb-2 text-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="salir_e">cancelar</button>
                    <button class="btn btn-danger" id="btnConfirmDelete">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Essential javascripts for application to work-->
    <!-- Essential javascripts for application to work-->
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?69"></script>
    <script src="assets/libs/jquery-3.7.0.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/scripst/usuarios.js"></script>
    <script>
        // Captura el evento clic del botón "Editar" en la tabla
        $(document).on('click', '.btn-editar-usuario', function() {
            // Obtiene los valores de los campos de la fila correspondiente
            var id = $(this).data('id');
            var columna1 = parseFloat($(this).closest('tr').find('td:eq(1)').text());
            var columna2 = $(this).closest('tr').find('td:eq(2)').text().trim();
            var columna3 = $(this).closest('tr').find('td:eq(3)').text().trim();
            var columna4 = $(this).closest('tr').find('td:eq(4)').text().trim();
            var columna5 = $(this).closest('tr').find('td:eq(5)').text().trim();
            var columna6 = $(this).closest('tr').find('td:eq(6)').text().trim();


            // Actualiza los valores en el modal
            $('#id').val(id);
            $('#dni').val(columna1);
            $('#nombre').val(columna2);
            $('#apellido').val(columna3);
            $('#correo').val(columna4);
            $('#usuario').val(columna5);
            $('#rol option').filter(function() {
                return $(this).text() === columna6;
            }).prop('selected', true);
        });

        $(document).ready(function() {
            // Capturar evento de clic del botón de eliminar
            $('.btn-delete').click(function() {
                var id = $(this).data('id'); // Obtener el ID del registro a eliminar
                $('#btnConfirmDelete').data('id', id); // Almacenar el ID en el botón de confirmación
                // Obtener el ID del registro
                var dni = $(this).data('dni');
                var nombre = $(this).data('nombre');
                var apellido = $(this).data('apellido');
                // Mostrar el modal de confirmación de eliminación
                $('#deleteData_1').text('DNI: ' + dni);
                $('#deleteData_2').text('Nombre: ' + nombre);
                $('#deleteData_3').text('Apellido: ' + apellido);
                $('#deleteModal').modal('show');

            });

            // Capturar evento de clic del botón de confirmación de eliminación
            $('#btnConfirmDelete').click(function() {
                var id = $(this).data('id'); // Obtener el ID del registro a eliminar
                var boton = $(this);
                // Enviar solicitud AJAX al servidor para eliminar el registro
                $.ajax({
                    url: 'controler/Usuarioscontrol.php?op=eliminar_usuario', // Ruta a tu script PHP para eliminar el registro
                    type: 'POST',
                    data: {
                        id: id
                    }, // Enviar el ID del registro al servidor
                    success: function(response) {

                        if (response == 1) {
                            $('#deleteData_1').text('');
                            $('#deleteData_2').text('');
                            $('#deleteData_3').text('');
                            $('#pregunta').text('Usuario eliminado exitozamente.')
                            $('#salir_e').html('Cerrar');
                            boton.hide();
                            $('#salir_e, #cerrar_e').click(function() {
                                $('button[data-id="' + id + '"]').closest('tr').remove();
                            });
                        } else {
                            $('#deleteData_1').text('');
                            $('#deleteData_2').text('');
                            $('#deleteData_3').text('');
                            boton.hide();
                            $('#pregunta').text('El Usuario no se puedo eliminar.')
                        }

                    }
                });
            });
        });
    </script>

</body>