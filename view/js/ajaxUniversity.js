/**
 * Created by olmemarin on 9/09/16.
 */
$(function () {
    $('tr #agregarRespuesta').click(function (e) {
        e.preventDefault();
        var idPregunta = $(this).parent().parent().find('#idPregutna').text();
        alert(idPregunta);
    
    });

});


