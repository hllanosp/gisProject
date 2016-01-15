

jQuery(document).ready(function(){

     var fase = $('#faseGET').val();
     var actividad ="";
    $("#input-fcount-1").fileinput({
        uploadUrl: "../class/uploads.php",
        minFileCount: 1,
        validateInitialCount: true,
        overwriteInitial: false
    });


    obtenerFase();
    function obtenerFase(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 2,
            "fase": fase
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/gestionarSeguimiento.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var contenido = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    actividad = response[index].codigoActividad;
                    contenido +='<tr style="text-align:center; background-color: #D2DAE8;">' +
                                    '<td>' + response[index].codigoActividad + '</td>' +
                                    '<td>' + response[index].nombre + '</td>' +
                                    '<td>' + response[index].programacionInicial+ '</td>'+
                                    '<td>' + response[index].fechaRealizacion+ '</td>' +   
                                '</tr>';
                                
                }
                $("#tablaSeguimiento").html(contenido);
            },
            timeout: 4000
        });
    }

    $("#formInforme").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 6,
            "resultados": $("#resultadosText").val(),
            "introduccion": $("#introduccion").val(),
            "concluciones": $("#concluciones").val(),
            "objetivos": $("#objetivos").val(),
            "fase": fase,
            "actividad": actividad
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/gestionarSeguimiento.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[0].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[0].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-3">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! </strong></div>';
                        
                    $("#notificaciones").html(html);
                    $("#notificaciones").fadeOut(4000);
                }
            },
            timeout: 4000
        });
    });

});