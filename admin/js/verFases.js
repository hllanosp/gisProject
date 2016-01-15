jQuery(document).ready(function(){

	var responsable = "";
	var fase ="";
	//Levanta el modal de agregar Fases
	$(document).on("click",".editar",function (e) {
		e.preventDefault();

		fase = $(this).data('id');
		if($(this).data('responsable') != "undifined"){
			responsable = $(this).data('responsable');
		}
		else{
			responsable = 0;
		}
		$('#descripcionEditarFase').val($(this).data('descripcion'));
		$('#nombreEditarFase').val($(this).data('nombre'));
		llenarEquipo();
		$('#modalEditarFasesActividad').modal('show');
	});
	
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
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fases</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="30%">Descripción</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha Inicio</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Fecha Fin</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="15%">Responsable</th>'+
                                                '<th style="text-align:center;background-color: rgb(186, 200, 226);" width="10%">Opciones</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody id="'+response[index].codigo+'">'+
                                        '</tbody>'+
                                    '</table>'+
                                    '</div>'+
                             '</div>';
                                
                }
                $("#contenidoFases").html(contenido);
                llenarFases();
            },
            timeout: 4000
        });
	}

	function llenarFases(){
		for(var contador = 0; contador < actividades.length; contador++){
			/*Parametros:
            	id del proyecto
	        */
	        var datos = {
	            "opcion": 28,
	            "proyectoid": $('#proyectoGET').val(),
	            "actividad": actividades[contador]
	        };
	        
	        $.ajax({
	            async: false,
	            type: "POST",
	            url: "../class/registrarProyecto.php",
	            data: datos,
	            dataType: "html",
	            success: function(data){
	            	var contenido ="";
	                var response = JSON.parse(data);
	                for(var index = 0; index < response.length; index++){
	                    contenido += '<tr style="text-align:center; background-color: #D2DAE8;">' +
	                                '<td>' + response[index].codigo + '</td>' +
	                                '<td>' + response[index].descripcion + '</td>' +
	                                '<td>' + response[index].fechaInicio + '</td>' +
	                                '<td>' + response[index].fechaFin + '</td>' +
	                                '<td>' + response[index].responsable + '</td>' +  
	                                '<td><center>'+
                                        '<a class="editar" data-nombre="'+response[index].nombre+'" data-id="'+response[index].codigo+'" data-responsable="'+response[index].responsableId+'" data-descripcion="'+ response[index].descripcion +'" href=""><i class="edit fa fa-edit"></i></a>'+
                                    '</td></center>' +           
	                            '</tr>';
	                }

	            	$("#"+actividades[contador]).html(contenido);
	            },
	            timeout: 8000
	        });
	    }
    }

    $("#formEditarFases").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 10,
            "descripcion": $("#descripcionEditarFase").val(),
            "nombre": $("#nombreEditarFase").val(),
            "responsable": $('#responsableFaseCombo').val(),
            "fase": fase
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/verProyectos.php",
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
                    llenarEncabezadosActividades();
                    $("#modalEditarFasesActividad").modal('hide');
                }
            },
            timeout: 4000
        });
    });

    function llenarEquipo(){
        
        var datos = {
            "opcion": 24,
            "proyectoid": $('#proyectoGET').val()
        };
        jQuery.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                	if(response[index].codigo == responsable){
                		combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                	}
                	else{
                		combo += "<option value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                	}
                    
                }

                $("#responsableFaseCombo").html(combo);
            },
            timeout: 4000
        });
    }
});