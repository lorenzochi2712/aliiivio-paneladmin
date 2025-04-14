$(document).ready(function () {
  
});

// Función para eliminar un usuario
function eliminaUsuario(token) {
  if (confirm('¿Está seguro de eliminar el usuario?')) {
    // Llamada AJAX
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: window.location.origin + '/admin/usuario/delete',
      data: {
        token: token,
      },
      type: "POST",
      dataType: "JSON",
      success: function (data) {
        // console.log(data);
        let resultado = parseInt(data.result, 10);
        if (resultado === 1) {
          alert('El usuario ha sido eliminado');
        } else if (resultado === 0) {
          alert('El usuario no se pudo eliminar, inténtelo nuevamente');
        }

        location.reload(); // Recarga la página
      },
      error: function (xhr, status) {
        console.log("Sorry, there was a problem! " + status);
        console.log(xhr);
      }
    });
  }

  return false;
}
