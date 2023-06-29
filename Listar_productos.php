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
                                    <h1 clas="d-inline-block align-text-top h3">Lista de Productos</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-success table-striped" id="productos">
                            <thead width='90%'>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">proveedor</th>
                                    <th scope="col">categoria</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conection, "SELECT p.idproducto, p.nombre, p.precio,p.cantidad,pv.proveedor, c.nombre as 'categoria' FROM producto p inner join proveedor pv 
                                on p.proveedor=pv.idproveedor inner join categoria c on p.idcategoria=c.idcategoria where estado_c=1 ORDER BY p.idproducto");
                                $resul = mysqli_num_rows($query);
                                if ($resul > 0) {
                                    while ($data = mysqli_fetch_array($query)) {

                                ?>

                                        <tr>
                                            <td><?php echo $data["idproducto"] ?></td>
                                            <td><?php echo $data["nombre"] ?></td>
                                            <td><?php echo $data["precio"] ?></td>
                                            <td><?php echo $data["cantidad"] ?></td>
                                            <td><?php echo $data["proveedor"] ?></td>
                                            <td><?php echo $data["categoria"] ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning btnAgregar" data-bs-toggle="modal" data-bs-target="#agregar_producto" data-id='<?php echo $data["idproducto"] ?>' data-nombre='<?php echo $data["nombre"] ?>' data-proveedor='<?php echo $data["proveedor"] ?>' data-precio='<?php echo $data["precio"] ?>'>Agregar</button>

                                                <button class="btn btn-sm btn-success btn-editar-productos" data-bs-toggle="modal" data-bs-target="#editar_producto" data-id='<?php echo $data["idproducto"] ?>'>Editar</button>
                                                <button class="btn btn-sm btn-danger btnEliminar" href="#" data-bs-toggle="modal" data-bs-target="#myModal" data-id='<?php echo $data["idproducto"] ?>' data-nombre='<?php echo $data["nombre"] ?>' data-cantidad='<?php echo $data["cantidad"] ?>' data-proveedor='<?php echo $data["proveedor"] ?>' data-categoria='<?php echo $data["categoria"] ?>'>Eliminar</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="#" role="button">Crear usuario</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--Modal para editar-->
    <div class="modal fade" id="editar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="id" name="id">
                        <div class="mb-2">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-2">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio">
                        </div>
                        <div class="mb-2">
                            <label for="cantidad">existencias</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad">
                        </div>
                        <div class="mb-2">
                            <label for="proveedor">Proveedor</label>
                            <?php
                            $query_rol = mysqli_query($conection, 'SELECT idproveedor, proveedor FROM proveedor');
                            $result_rol = mysqli_num_rows($query_rol)


                            ?>
                            <select class="form-select" name="proveedor" id="proveedor">
                                <?php
                                if ($result_rol > 0) {
                                    while ($rol = mysqli_fetch_array($query_rol)) {
                                ?>
                                        <option value="<?php echo $rol['idproveedor'] ?>"><?php echo $rol['proveedor'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="categoria">Categoria</label>
                            <?php
                            $query_rol = mysqli_query($conection, 'SELECT idcategoria, nombre FROM categoria');
                            $result_rol = mysqli_num_rows($query_rol)


                            ?>
                            <select class="form-select" name="categoria" id="categoria">
                                <?php
                                if ($result_rol > 0) {
                                    while ($rol = mysqli_fetch_array($query_rol)) {
                                ?>
                                        <option value="<?php echo $rol['idcategoria'] ?>"><?php echo $rol['nombre'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-2" id="message">
                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                            <button class="btn btn-primary" href="#" onclick="ActualizarProducto();">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar_e"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 text-center">

                        <p id='pregunta'>¿Estás seguro de que deseas eliminar este registro?</p>
                        <p id="registroNombre"></p>
                        <p id="registroExistencia"></p>
                        <p id="registroProveedor"></p>
                        <p id="registroCategoria"></p>

                    </div>
                    <div class="mb-2 text-center">
                        <button class="btn btn-primary" data-bs-dismiss="modal" id='salir_e'>cancelar</button>
                        <button class="btn btn-danger" id="btnEliminarRegistro">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar productos -->
    <div class="modal fade" id="agregar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 text-center">

                    </div>
                    <form>
                        <p id="Nombre_agregar" class="text-center fw-bold fs-5"></p>
                        <input type="hidden" id="id_1" name="id_1">

                        <div class="mb-2">
                            <label for="precio_agregar" id="label_precio">Precio</label>
                            <input type="text" class="form-control" name="precio_agregar" id="precio_agregar">
                        </div>
                        <div class="mb-2">
                            <label for="cantidad_agregar" id="label_cantidad">existencias</label>
                            <input type="text" class="form-control" name="cantidad_agregar" id="cantidad_agregar">
                        </div>
                        <div class="mb-2" id="message">
                        </div>
                        <div class="mb-2 text-center">
                            <button class="btn btn-danger" data-dismiss="modal" id="salir_g">cancelar</button>
                            <button class="btn btn-primary" href="#" id="btn_agregar_producto">agregar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Essential javascripts for application to work-->
    <!-- Essential javascripts for application to work-->
    <script src="js/getdate.js?869"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menu.js?69"></script>
    <script src="assets/libs/jquery-3.7.0.min.js"></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/scripst/productos.js"></script>
    <script>
        // Captura el evento clic del botón "Editar" en la tabla
        $(document).on('click', '.btn-editar-productos', function() {
            // Obtiene los valores de los campos de la fila correspondiente
            var id = $(this).data('id');

            var columna1 = $(this).closest('tr').find('td:eq(1)').text().trim();
            var columna2 = $(this).closest('tr').find('td:eq(2)').text().trim();
            var columna3 = $(this).closest('tr').find('td:eq(3)').text().trim();
            var columna4 = $(this).closest('tr').find('td:eq(4)').text().trim();
            var columna5 = $(this).closest('tr').find('td:eq(5)').text().trim();


            // Actualiza los valores en el modal
            $('#id').val(id);
            $('#nombre').val(columna1);
            $('#precio').val(columna2);
            $('#cantidad').val(columna3);
            $('#proveedor option').filter(function() {
                return $(this).text() === columna4;
            }).prop('selected', true);
            $('#categoria option').filter(function() {
                return $(this).text() === columna5;
            }).prop('selected', true);
        });




        $(document).ready(function() {
            $('.btnAgregar').click(function() {

                var id = $(this).data('id');
                var columna1 = $(this).closest('tr').find('td:eq(1)').text().trim();
                var columna4 = $(this).closest('tr').find('td:eq(4)').text().trim();
                
                $('#Nombre_agregar').text('Producto: ' + columna1 +' '+ columna4);
                
                $('#id_1').val(id);

                $('#btn_agregar_producto').click(function(e) {
                    e.preventDefault();
                    var boton = $(this);
                    id=$('#id_1').val();
                    cantidad=$('#cantidad_agregar').val();
                    precio=$('#precio_agregar').val();
                    parametros = { "id":id,"n_cantidad":cantidad,"n_precio":precio}
                    $.ajax({
                        url: 'controler/Productoscontrol.php?op=agregar_producto',
                        type: 'POST',
                        data: parametros,
                        success: function(response) {
                            if (response != 0) {
                                $('#salir_g').html('Salir');
                                boton.hide();
                                $("#label_cantidad").addClass("text-center");
                                $('#label_cantidad').text('El Producto se ha agregado corectamente.');
                                $('#cantidad_agregar').addClass('d-none');
                                $('#precio_agregar').addClass('d-none');
                                $('#label_precio').addClass('d-none');
                            } else {
                                $('#salir_g').html('Salir');
                                boton.hide();
                                $("#label_cantidad").addClass("text-center");
                                $('#label_cantidad').text('El Producto no se ha agregar.');
                                $('#cantidad_agregar').addClass('d-none');
                                $('#precio_agregar').addClass('d-none');
                                $('#label_precio').addClass('d-none');
                            }
                            
                        }
                    });
                });
            });

            $('.btnEliminar').click(function() {
                var id = $(this).data('id');
                var proveedor = $(this).data('proveedor');
                var nombre = $(this).data('nombre');
                var existencia = $(this).data('cantidad');
                var categoria = $(this).data('categoria');

                $('#registroNombre').text('Nombre: ' + nombre);
                $('#registroExistencia').text('Cantidad: ' + existencia);
                $('#registroProveedor').text('Proveedor: ' + proveedor);
                $('#registroCategoria').text('Categoria: ' + categoria);
                $('#eliminar_producto').modal('show');

                $('#btnEliminarRegistro').click(function(e) {
                    e.preventDefault();
                    var boton = $(this);
                    $.ajax({
                        url: 'controler/Productoscontrol.php?op=eliminar_producto',
                        type: 'POST',
                        data: {
                            'id': id
                        },
                        success: function(response) {

                            if (response == 1) {
                                // $('#pregunta').setAttribute('disabled');
                                $('#registroNombre').text('');
                                $('#registroExistencia').text('');
                                $('#registroProveedor').text('');
                                $('#registroCategoria').text('');
                                $('#salir_e').html('Salir');
                                $('#pregunta').text('El Producto se ha eliminado corectamente.');
                                boton.hide();
                                $('#salir_e, #cerrar_e').click(function() {
                                    $('button[data-id="' + id + '"]').closest('tr').remove();
                                })
                            } else {
                                $('#registroNombre').text('');
                                $('#registroExistencia').text('');
                                $('#registroProveedor').text('');
                                $('#registroCategoria').text('');
                                $('#pregunta').text('El Producto no se ha podido eliminado.');
                                boton.hide();
                            }
                            // Realiza acciones adicionales después de eliminar el registro, si es necesario
                            // Recarga la página después de eliminar el registro
                        }
                    });
                });
            });
        });
    </script>
</body>