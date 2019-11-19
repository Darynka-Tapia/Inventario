$(document).ready(function(){
  $('#search').focus()

  $('#search2').on('keyup', function(){
    var search2 = $('#search2').val()
    $.ajax({
      type: 'POST',
      url: 'SQL/searchColaborador.php',
      data: {'search2': search2},
      beforeSend: function(){
        $('#detallesEmpleado').html('<p>Cargando...</p>')
      }
    })
    .done(function(resultado){
      $('#detallesEmpleado').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})