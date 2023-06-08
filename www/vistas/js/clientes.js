$('.tablaClientes').DataTable({

  'deferRender': true,
  'retrieve': true,
  'processing': true,
  'language': {

    'sProcessing': 'Procesando...',
    'sLengthMenu': 'Mostrar _MENU_ registros',
    'sZeroRecords': 'No se encontraron resultados',
    'sEmptyTable': 'Ningún dato disponible en esta tabla',
    'sInfo': 'Mostrando registros del _START_ al _END_',
    'sInfoEmpty': 'Mostrando registros del 0 al 0',
    'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
    'sInfoPostFix': '',
    'sSearch': 'Buscar:',
    'sUrl': '',
    'sInfoThousands': ',',
    'sLoadingRecords': 'Cargando...',
    'oPaginate': {
      'sFirst': 'Primero',
      'sLast': 'Último',
      'sNext': 'Siguiente',
      'sPrevious': 'Anterior'
    },
    'oAria': {
      'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
      'sSortDescending': ': Activar para ordenar la columna de manera descendente'
    }

  }

})

/*
  Editar clientes
 */
$('.tablaClientes').on('click', '.btnEditarClientes', function () {

  var idCliente = $(this).attr('idCliente')

  var datos = new FormData()

  datos.append('idCliente', idCliente)

  $.ajax({
    url: 'ajax/clientes.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function (respuesta) {
      $('#id_clienteE').val(respuesta['id'])
      $('#nom_clienteE').val(respuesta['nombre'])
      $('#ap1_clienteE').val(respuesta['apellido1'])
      $('#ap2_clienteE').val(respuesta['apellido2'])
      $('#loc_clienteE').val(respuesta['localidad'])
      $('#prov_clienteE').val(respuesta['provincia'])
      $('#cp_clienteE').val(respuesta['cp'])
    }
  })
})

/*
  Eliminar clientes
 */
$(document).on('click', '.eliminarCliente', function () {

  var idClienteE = $(this).attr('idClienteE')

  swal({
    title: '¿Está seguro de eliminar este Cliente?',
    text: '¡Si no lo está puede cancelar la acción!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#dd3333',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar Cliente!',
    allowOutsideClick: false,

  }).then(function (result) {

    if (result.value) {

      var datos = new FormData()
      datos.append('idClienteE', idClienteE)

      $.ajax({
        url: 'ajax/clientes.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

          if (respuesta == 'ok') {
            swal({
              type: 'success',
              title: '¡CORRECTO!',
              text: 'El Cliente ha sido borrado correctamente',
              showConfirmButton: true,
              confirmButtonText: 'Cerrar',
              allowOutsideClick: false,

            }).then(function (result) {
              if (result.value) {
                window.location = 'clientes'
              }
            })
          }
        }
      })
    }
  })
})