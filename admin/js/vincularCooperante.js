jQuery(document).ready(function(){

	jQuery(".select2").select2({
    	width: '100%'
  	});

  	$(document).on("click",".crearCooperante",function (e) {
		e.preventDefault();
		$("#modalCrearCooperante").modal('show');
	});

	$("#formCooperante").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 3,
            "nombre": $("#nombreCooperante").val(),
            "nombreContacto": $("#nombreContacto").val(),
            "email": $("#email").val(),
            "telefono": $("#telefono").val()
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/cooperantes.php",
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
                        
                    $("#notificaciones1").html(html);
                    $("#notificaciones1").fadeOut(4000);
                }
            },
            timeout: 4000
        });
    });

	$(document).on("click","#vincularCooperante",function (e) {
		e.preventDefault();
		var datos = {
            "opcion": 2
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/cooperantes.php",
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

	llenarCooperantes();
	llenarCooperantesOroganizacion();

	function llenarCooperantes(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 0
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/cooperantes.php",
            data: datos,
            dataType: "html",
            success: function(data){

            	var combo ="";
                var response = JSON.parse(data);

                for(var index = 0; index < response.length; index++){

                	combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                }

                $("#cooperantesCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarCooperantesOrganizacion(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 1
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/cooperantes.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
            	var tabla ="";
                var response = JSON.parse(data);

                for(var index = 0; index < response.length; index++){

                	tabla += '<tr style="text-align:center; background-color: #D2DAE8;" >' +
                                    '<td>' + response[index].codigo + '</td>' +
                                    '<td>' + response[index].nombre + '</td>' +
                                    '<td>' + response[index].tipo + '</td>'+
                                    '<td>' + response[index].estado + '</td>'+          
                              '</tr>';
                }

                $("#tablaCooperantes").html(tabla);
            },
            timeout: 4000
        });
    }
});