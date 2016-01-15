jQuery(document).ready(function(){

	var fase = $('#faseGET').val();

    
    obtenerFase();

    jQuery('.faseEditable').datepicker({
        dateFormat: "yy-mm-dd"
    });

    $(".faseEditable").change(function(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 3,
            "fase": fase,
            "tipoCambiado": $(this).data('tipo'),
            "fecha": $(this).val()
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
                alert(data);
                var contenido = '';
               	var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    if(response[index].estado == "P"){
                        contenido += '<br>'+
                            '<div class="panel panel-default">'+
                                '<div style="color:white; text-align:center;background-color:#A2B9DC;" class="panel-heading">'+
                                    + response[index].codigoActividad+' - '+response[index].nombreActividad+
                                '</div>'+
                                '<div id="bodyFase" style="padding:0px;" class="panel-body">'+
                                     '<table style="margin-bottom:0px" align="center" class="table table-bordered " width="600px">'+
                                        '<thead >'+
                                            '<tr >'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="10%">Fase</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="30%">descripcion</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="20%">Programacion Inicial</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Programacion Real</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha de Realización</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                                '<td>' + response[index].codigo + '</td>' +
                                                '<td>' + response[index].descripcion + '</td>'+
                                                '<td>' + response[index].programacionInicial+ '</td>'+
                                                '<td ><input data-tipo="1" class="faseEditable" value="'+ response[index].programacionReal+ '"/> </td>' +
                                                '<td>' + response[index].fechaRealizacion+ '</td>' +        
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>'+
                             '</div>';
                    }else{
                        contenido += '<br>'+
                            '<div class="panel panel-default">'+
                                '<div style="color:white; text-align:center;background-color:#A2B9DC;" class="panel-heading">'+
                                    + response[index].codigoActividad+' - '+response[index].nombreActividad+
                                '</div>'+
                                '<div id="bodyFase" class="panel-body">'+
                                     '<table style="margin-bottom:0px" align="center" class="table table-bordered " width="600px">'+
                                        '<thead >'+
                                            '<tr >'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fase</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="30%">descripcion</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha de programacion Inicial</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha de programacion Real</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha de Realización</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                                '<td>' + response[index].codigo + '</td>' +
                                                '<td>' + response[index].descripcion + '</td>'+
                                                '<td>' + response[index].programacionInicial+ '</td>'+
                                                '<td>' + response[index].programacionReal+ '</td>' +
                                                '<td ><input data-tipo="2" class="faseEditable" value="'+ response[index].fechaRealizacion+ '"/> </td>' +       
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>'+
                             '</div>';
                    } 
                                
                }
                $("#contenidoDarSeguimiento").html(contenido);
            },
            timeout: 4000
        });
    }

});