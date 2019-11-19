$(document).ready(function(){
  $('#search').focus()

  $('#search').on('keyup', function(){
    var search = $('#search').val()
    $.ajax({
      type: 'POST',
      url: 'SQL/search.php',
      data: {'search': search},
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