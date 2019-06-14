/**
 * Creates an array of events to display in the first load of the calendar
 * Wrap into this function a request to a source to get via ajax the stored events
 * @return Array The array with the events
 */
 function createDemoEvents() {
    // Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    return [{
        title: 'Vacaciones 2017',
        start: new Date(y, m, 2),
        end:  new Date(y, m, 12),
        backgroundColor: '#00a65a', //green
        borderColor: '#00a65a' //green
    },
    {
        title: 'Suspendido: por faltas',
        start: new Date(y, m-1, 29),
        end:  new Date(y, m, 1),
        backgroundColor: '#f56954', //red
        borderColor: '#f56954' //red
    }];
} // End Demo events

})(window, document, window.jQuery);









function createDemoEvents() {
  var accion="listar";
  $.ajax({
      url: "https://reqres.in/api/users",
      success: function(respuesta) {

        var listaUsuarios = $("#lista-usuarios");
          $.each(respuesta.data, function(index, elemento) {
            listaUsuarios.append(
                '<div>'
              +     '<p>' + elemento.first_name + ' ' + elemento.last_name + '</p>'
              +     '<img src=' + elemento.avatar + '></img>'
              + '</div>'
            );
          });

      },
      error: function() {
        console.log("No se ha podido obtener la información");
      }



    });  // ok
  }

})(window, document, window.jQuery);
