jQuery(document).ready(function(){
	var fase = $('#faseGET').val();
    var fases = [];

    function fase(codigo,nombre,nombreActividad,codigoActividad,inicio,fin){
        this.codigo = codigo;
        this.nombre = nombre;
        this.inicio = inicio;
        this.fin = fin;
        this.codigoActividad = codigoActividad;
        this.nombreActividad = nombreActividad;
    }
    obtenerFase();

    $(document).on("click","#evaluar",function () {
        $("#modalEvaluar").modal('show');
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
                var contenido = '';
               	var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    contenido += '<br>'+
                            '<div class="panel panel-default">'+
                                '<div style="color:white; text-align:center;background-color:#A2B9DC;" class="panel-heading">'+
                                    + response[index].codigoActividad+' - '+response[index].nombreActividad+
                                '</div>'+
                                '<div style="padding:0px;"  id="bodyFase" class="panel-body">'+
                                     '<table style="margin-bottom:0px" align="center" class="table table-bordered " width="600px">'+
                                        '<thead >'+
                                            '<tr >'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="25%">Fase</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="25%">Programacion Inicial</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="25%">Fecha de Realización</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="25%">Productos Logrados</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                                '<td>' + response[index].codigo + '</td>' +
                                                '<td>' + response[index].programacionInicial+ '</td>'+
                                                '<td>' + response[index].fechaRealizacion+ '</td>' +  
                                                '<td><a id="evaluar" href="#">Evaluar</a></td>' +     
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>'+
                             '</div>';
                                
                }
                $("#contenidoFasesSeguimiento").html(contenido);
            },
            timeout: 4000
        });
    }

});