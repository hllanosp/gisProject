jQuery(document).ready(function(){


	$("#input-fcount-1").fileinput({
        uploadUrl: "../class/uploads.php",
        maxFileCount: 1,
        validateInitialCount: true,
        overwriteInitial: false
    });

	//llenarParametros();

	jQuery('#fechaConstitucion').datepicker({
		dateFormat: "yy-mm-dd"
	});

	$("#formCooperante").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 5,
            "nombre": $("#nombreCooperante").val(),
            "fechaConstitucion": $("#fechaConstitucion").val(),
            "RTN": $("#RTN").val(),
            "tipo": $("#tipoCombo").val(),
            "mision": $("#mision").val(),
            "vision": $("#vision").val(),
            "areas": $("#areas").val()
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

                }
                $("#notificaciones1").html(html);
                $("#notificaciones1").fadeOut(4000);
				$('#divLogo').show(1000);	

            },
            timeout: 4000
        });
    });

	$("#formTipo").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 6,
            "nombre": $("#nombreTipo").val()
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
                    $("#modalTipoCooperante").modal('hide');
                }
            },
            timeout: 4000
        });
    });

    $("#formContacto").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 7,
            "nombre": $("#nombreAsistenteModal").val(),
            "apellido": $("#apellidoAsistenteModal").val(),
            "cargo": $("#CargoAsistenteModal").val(),
            "email": $("#EmailAsistenteModal").val()
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
                        
                    $("#notificaciones2").html(html);
                    $("#notificaciones2").fadeOut(4000);
                    $("#modalAgregarMasContacto").modal('hide');
                }
            },
            timeout: 4000
        });
    });

	function llenarParametros(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 4
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/cooperantes.php",
            data: datos,
            dataType: "html",
            success: function(data){

            	var tabla ="";
            	var combo = "";
                var response = JSON.parse(data);

                for(var index = 0; index < response.length; index++){
            		tabla += '<tr>' +
                                '<td style="text-align:center; background-color: #D2DAE8;">' + response[index].nombre + '</td>' +         
                          '</tr>';
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                }

                $("#tablaParametros").html(tabla);
                $("#tipoCombo").html(combo);
            },
            timeout: 4000
        });
    }

    $(document).on("click","#masParametros",function (e) {
        e.preventDefault();
        $("#modalTipoCooperante").modal('show');
    });
    $(document).on("click","#agregarMasPersonal",function (e) {
		e.preventDefault();
		$("#modalAgregarMasContacto").modal('show');
	});

});