/**
 * Created by olmemarin on 7/09/16.
 */

function objetoAjax() {
    var xmlhttp=false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");


    }catch (e){
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch (E){
            xmlhttp = false;
        }

    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined'){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function createAnswer() {

    pregunta =  document.frmrespuesta.pregunta.value;
    respuesta = document.frmrespuesta.respuesta.value;
    typeAnswer = 1;
    rEstado = document.frmrespuesta.rEstado.value;

    ajax = objetoAjax();
    ajax.onreadystatechange = function () {
        if (ajax.readyState==3){
            alert('Los datos fueron guardados con exito');
            window.location.reload(true);
        }

    }
    
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("setIdQuestionFk="+pregunta+"&setTypeAnswer="+1+"&setAnswer"+respuesta+"&setState="+rEstado);





}