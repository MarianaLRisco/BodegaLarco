init();
var tabla;
function init() {
  getData();
}
function getData() {
  tabla = $("#lista_usuarios").DataTable({
    oLanguage: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      searchPlaceholder: "Search records",
      sSearch:
        '<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="svg_1" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="m224,256a128,128 0 1 1 0,-256a128,128 0 1 1 0,256zm-14.9,103.2l-18.6,-31c-6.4,-10.7 1.3,-24.2 13.7,-24.2l19.8,0l19.7,0c12.4,0 20.1,13.6 13.7,24.2l-18.6,31l33.4,123.9l36,-146.9c2,-8.1 9.8,-13.4 17.9,-11.3c70.1,17.6 121.9,81 121.9,156.4c0,17 -13.8,30.7 -30.7,30.7l-131.8,0c-2.1,0 -4,-0.4 -5.8,-1.1l0.3,1.1l-112,0l0.3,-1.1c-1.8,0.7 -3.8,1.1 -5.8,1.1l-131.8,0c-16.9,0 -30.7,-13.8 -30.7,-30.7c0,-75.5 51.9,-138.9 121.9,-156.4c8.1,-2 15.9,3.3 17.9,11.3l36,146.9l33.4,-123.9l-0.1,0z" id="svg_3"/></symbol><symbol id="svg_4" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m416,208c0,45.9 -14.9,88.3 -40,122.7l126.6,126.7c12.5,12.5 12.5,32.8 0,45.3s-32.8,12.5 -45.3,0l-126.6,-126.7c-34.4,25.2 -76.8,40 -122.7,40c-114.9,0 -208,-93.1 -208,-208s93.1,-208 208,-208s208,93.1 208,208zm-208,144a144,144 0 1 0 0,-288a144,144 0 1 0 0,288z"/></symbol></defs><g class="layer"><title>Layer 1</title><use id="svg_2" transform="matrix(1 0 0 1 0 0) matrix(0.962478 0 0 0.968808 -1.1404 0.4024)" x="-1.39" xlink:href="#svg_1" y="0"/><use id="svg_5" transform="matrix(0.386647 0 0 0.381549 -55.546 -33.4906)" x="204.89" xlink:href="#svg_4" y="123.52"/></g></svg>',
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
    },
  });
}

function ObtenerUsuarioID(usuario_id){
  parametros = {
    "usuario_id":usuario_id
  }
  $.ajax({
    data:parametros,
    url:"controler/Usuarioscontrol.php?op=obtenerusuario",
    type:'POST',
    beforeSend:function(){},
    success:function(response){
      console.log(response);
      data = $.parseJSON(response);
      if(data.length > 0){
        $('#id').val(data[0]['ID']);
        $('#dni').val(data[0]['DNI']);
        $('#nombre').val(data[0]['Nombre']);
        $('#apellido').val(data[0]['Apellido']);
        $('#usuario').val(data[0]['Usuario']);
        $('#correo').val(data[0]['Correo']);
        $('#clave').val(data[0]['Clave']);
        $('#rol').val(data[0]['Rol']);
      }

    }
  })
}

function ActualizarUsuario(){
  id=$('#id').val();
  dni=$('#dni').val();
  nombre=$('#nombre').val();
  apellido=$('#apellido').val();
  correo=$('#correo').val();
  usuario=$('#usuario').val();
  clave=$('#clave').val();
  rol=$('#rol').val();
  parametros = {
    "id":id,"dni":dni,"nombre":nombre,"apellido":apellido,
    "correo":correo,"usuario":usuario,"clave":clave,"rol":rol
  }
  $.ajax({
    data:parametros,
    url:"controler/Usuarioscontrol.php?op=EditarUsuario",
    type:'POST',
    beforeSend:function(){},
    success:function(response){
      console.log(response);
      if (response==1) {
        tabla.ajax.reload();
        console.log("actualizado");
        msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">'
               + '<strong>Holy guacamole!</strong> Registro actualizado.'
               + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
              +'</div>';
      } else {
        console.log("campos vacios");
        msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">'
        + '<strong>Holy guacamole!</strong> Registro actualizado.'
        + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
       +'</div>';
      }
      $("#message").html(msg);

    }
  });
}