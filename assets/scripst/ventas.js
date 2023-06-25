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
        var existencia = parseInt($('#existencias').html());

        if ($(this).val() < 1 || isNaN($(this).val()) || ($(this).val() > existencia)) {
            $('#precio_total').html('--');
            $('#btn_agregar').slideUp();
        } else {
            $('#precio_total').html(precio_total);
            $('#btn_agregar').slideDown();
        }
    });

    $('#btn_agregar').click(function(e) {
        e.preventDefault();
        if ($('#cantidad').val() > 0) {
            var idproducto = $('#idproducto').html();
            var cantidad = $('#cantidad').val();
            $.ajax({
                url: 'controler/Ventascontrol.php?op=agregar_detalle_venta',
                type: "POST",
                async: true,
                data: {
                    'producto': idproducto,
                    'cantidad': cantidad
                },
                success: function(response) {
                    var info = JSON.parse(response);
                    $('#detalle_venta').html(info.detalle);
                    $('#detalle_totales').html(info.totales);

                    $('#idproducto').html('--');
                    $('#nombre_p').val('');
                    $('#existencias').html('--');
                    $('#cantidad').val('0');
                    $('#precio').html('0.00');
                    $('#precio_total').html('0.00');

                    $('#cantidad').attr('disabled', 'disabled');

                },
                erro: function(error) {

                }

            });

        }
    });

});
function searchForDetalle(id) {
    var user = id;
    $.ajax({
        url: "controler/Ventascontrol.php?op=extrae_detalle_venta",
        type: "POST",
        async: true,
        data: {
            user: user
        },
        success: function(response) {
            var info = JSON.parse(response);
            $('#detalle_venta').html(info.detalle);
            $('#detalle_totales').html(info.totales);

        },
        error: function(error) {},
    });
}