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
    <?php require "header.php";?>
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
                                    <h1 clas="d-inline-block align-text-top h3">Lista de Proveedores</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-success table-striped" id="proveedores">
                            <thead width='90%'>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Contacto</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($conection,"SELECT * FROM proveedor where estado_p=1 ORDER BY idproveedor");
                                $resul = mysqli_num_rows($query);
                                if($resul >0){
                                    while($data = mysqli_fetch_array($query)){
                                    $id = $data["idproveedor"];
                  
                            ?>
                            
                                <tr>
                                    <td><?php echo $data["idproveedor"]?></td>
                                    <td><?php echo $data["proveedor"]?></td>
                                    <td><?php echo $data["contacto"]?></td>
                                    <td><?php echo $data["DNI"]?></td>
                                    <td><?php echo $data["telefono"]?></td>
                                    <td><?php echo $data["direccion"]?></td>
                                    <td>
                                    <button class="btn btn-sm btn-success btn-editar-proveedor"  data-bs-toggle="modal" data-bs-target="#editar_proveedor"
                                    data-id='<?php echo $data["idproveedor"]?>' >Editar</button>
                                    <button class="btn btn-sm btn-danger btnEliminar" href="#" data-bs-toggle="modal" data-bs-target="#eliminar_proveedor" 
                                    data-id='<?php echo $data["idproveedor"]?>' data-proveedor='<?php echo $data["proveedor"]?>' data-nombre='<?php echo $data["contacto"]?>'
                                    data-dni='<?php echo $data["DNI"]?>'>Eliminar</button>
                                    </td>
                                    

                                </tr>
                            <?php
                             }
                            }
                            ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="#" role="button">Registrar Proveedor</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Modal para editar-->
    <div class="modal fade" id="editar_proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input  type='hidden' id="id" name="id">
                        <div class="mb-2">
                            <label for="proveedor">Proveedor</label>
                            <input type="text" class="form-control" name="proveedor" id="proveedor">
                        </div>
                        <div class="mb-2">
                            <label for="contacto">Contacto</label>
                            <input type="text" class="form-control" name="contacto" id="contacto">
                        </div>
                        <div class="mb-2">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni">
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
                            <button  class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" href="#" onclick="ActualizarProveedor()">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar -->
    <div class="modal fade" id="eliminar_proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-2 text-center">
                        <p>¿Estás seguro de que deseas eliminar este registro?</p>
                        <p id="registroProveedor"></p>
                        <p id="registroNombre"></p>
                        <p id="registroDNI"></p>
                        </div>
                    
                        <div class="mb-2 text-center">
                            <button  class="btn btn-secondary" href="#" data-bs-dismiss="modal">cancelar</button>
                            <button type="submit" class="btn btn-danger" href="#" >Eliminar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!--Essential javascripts for application to work-->
    <!-- Essential javascripts for application to work-->
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?7796"></script>
    <script src="assets/libs/jquery-3.7.0.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/scripst/proveedores.js"></script>
    <script>
        // Captura el evento clic del botón "Editar" en la tabla
        $(document).on('click', '.btn-editar-proveedor', function() {
            // Obtiene los valores de los campos de la fila correspondiente
            var id = $(this).data('id');
            var columna1 = $(this).closest('tr').find('td:eq(1)').text().trim();
            var columna2 = $(this).closest('tr').find('td:eq(2)').text().trim();
            var columna3 = $(this).closest('tr').find('td:eq(3)').text().trim();
            var columna4 = $(this).closest('tr').find('td:eq(4)').text().trim();
            var columna5 = $(this).closest('tr').find('td:eq(5)').text().trim();

            // Actualiza los valores en el modal
            $('#id').val(id);
            $('#proveedor').val(columna1);
            $('#contacto').val(columna2);
            $('#dni').val(columna3);
            $('#telefono').val(columna4);
            $('#direccion').val(columna5);
        });

        $(document).ready(function() {
            $('.btnEliminar').click(function() {
                var id = $(this).data('id');
                var proveedor = $(this).data('proveedor');
                var nombre = $(this).data('nombre');
                var dni = $(this).data('dni');
                $('#registroProveedor').text('Proveedor: ' + proveedor);
                $('#registroNombre').text('Nombre: ' + nombre);
                $('#registroDNI').text('DNI: ' + dni);
                $('#eliminar_proveedor').modal('show');

                $('#eliminar_proveedor').click(function() {
                    $.ajax({
                        url: 'controler/Clientescontrol.php?op=eliminar_proveedor',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            // Realiza acciones adicionales después de eliminar el registro, si es necesario
                            location.reload(); // Recarga la página después de eliminar el registro
                        }
                    });
                });
            });
        });

        </script>
</body>