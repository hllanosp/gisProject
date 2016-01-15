jQuery(document).ready(function(){

	var actividades = [];        
	llenarEncabezadosActividades();

	function llenarEncabezadosActividades(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 25,
            "proyectoid": $('#proyectoGET').val(),
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var contenido = '';
               	var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                	actividades[index] = response[index].codigo;

                    contenido += '<br>'+
                            '<div class="panel panel-default">'+
                                '<div style="color:white; text-align:center;background-color:#A2B9DC;" class="panel-heading">'+
                                    + response[index].codigo+' - '+response[index].nombre+
                                '</div>'+
                                '<div id="bodyFases" class="panel-body">'+
                                     '<table style="margin-bottom:0px" align="center" class="table table-bordered " width="600px">'+
                                        '<thead >'+
                                            '<tr >'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Codigo</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="30%">Cooperante</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Valor</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody id="'+response[index].codigo+'">'+
                                        '</tbody>'+
                                    '</table>'+
                                    '<table border="0" width="890px">'+
                                        '<tr>'+
                                            '<td style="padding-right:15px; background-color: rgb(186, 200, 226);" width="75%" align="right">'+
                                                'Monto total :'+
                                            '</td>'+
                                            '<td width="45%">'+
                                               '<input type="text" name="montoTotal" id="montoTotal'+response[index].codigo+'" desabled readonly/> '+
                                            '</td>'+
                                            '<td></td>'+
                                            '<td></td>'+
                                        '</tr>'+
                                    '</table>'+
                                '</div>'+
                             '</div>';
                                
                }
                $("#contenidoPresupuesto").html(contenido);
                llenarPresupuesto();
            },
            timeout: 4000
        });
	}

	function llenarPresupuesto(){
		for(var contador = 0; contador < actividades.length; contador++){
			/*Parametros:
            	id del proyecto
	        */
	        var datos = {
	            "opcion": 9,
	            "proyectoid": $('#proyectoGET').val(),
	            "actividad": actividades[contador]
	        };
	        
	        $.ajax({
	            async: false,
	            type: "POST",
	            url: "../class/verProyectos.php",
	            data: datos,
	            dataType: "html",
	            success: function(data){
	            	var contenido ="";
                    var monto =0;
	                var response = JSON.parse(data);
	                for(var index = 0; index < response.length; index++){
	                    contenido += '<tr style="text-align:center; background-color: #D2DAE8;">' +
	                                '<td>' + response[index].codigo + '</td>' +
	                                '<td>' + response[index].cooperante + '</td>' +
	                                '<td>' + response[index].monto + '</td>' +          
	                            '</tr>';
                        monto = parseFloat(monto) + parseFloat(response[index].monto);
	                }
                    $('#montoTotal'+actividades[contador]).val(parseFloat(monto));
	            	$("#"+actividades[contador]).html(contenido);
	            },
	            timeout: 8000
	        });
	    }
    }
});