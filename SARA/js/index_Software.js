$(document).ready(function(){
  $('#busqueda').focus()

  $('#busqueda').on('keyup', function(){
    var busqueda = $('#busqueda').val()
    var codigo = $('#cod').val()
    $.ajax({
      type: 'POST',
      url: 'SQL/search_software.php',
      data: {'busqueda': busqueda, 'codigo': codigo},
      beforeSend: function(){
        $('#result').html('<p>Cargando...</p>')
      }
    })
    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})