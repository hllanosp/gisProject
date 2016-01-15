


jQuery(document).ready(function(){

	var proyectoid;
	var creoProyecto = false;
	var empleados = false;
	var presupuesto = false;
	var fase= 0;
	llenarZona();
	llenarSectorEconomico();
	llenarSectorInstitucional();
	llenarEjeEstrategico();
	llenarAreasFocalizacion();

	$('#montoTotal').priceFormat({
	    prefix: '$ ',
	    centsSeparator: '.',
	    thousandsSeparator: ','
	});

	// Validacion del formulario de informacion
	  var $validator = jQuery("#formInformacon").validate({
	    highlight: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-error');
	    }
	  });

	// Validacion del formulario de equipo.
	  var $validator = jQuery("#formEquipo").validate({
	    highlight: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-error');
	    }
	  });

	  // Validacion del formulario de Presupuesto.
	  var $validator = jQuery("#formPresupuesto").validate({
	    highlight: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-error');
	    }
	  });

	  //step para las fases
  	  jQuery('#basicWizard').bootstrapWizard();
	  
	  //step de toda la pagina
	  jQuery('#validationWizard').bootstrapWizard({
	    tabClass: 'nav nav-pills nav-justified nav-disabled-click',
	    onTabClick: function(tab, navigation, index) {
	      return false;
	    },
	    onNext: function(tab, navigation, index) {
	    	if(index == 1){
	    		var $valid = jQuery('#formInformacion').valid();
			     if(!$valid) {
			        $validator.focusInvalid();
			        return false;
	    		}else{
	    			if(creoProyecto){
	    				editarProyectoInformacion();

	    			}else{
	    				guardarProyectoInformacion();
	    				creoProyecto = true;
	    				llenarEmpleados();
						llenarCargos();
	    			}
	    		}
	      	}else{
	      		if(index == 2){
	      			var $valid = jQuery('#formEquipo').valid();
			     	if(!$valid) {
				        $validator.focusInvalid();
				        return false;
	      			}else{
	      				if(empleados){
	      					editarEmpleados();
	      				}else{
	      					guardarEmpleados();
	      					llenarMonedas();
	      					llenarCooperantes();
	      					llenarCooperantesNacional();
	      					empleados=true;	
	      				}
	      			}
	      		}else{
	      			if(index == 3){
	      				var pre = $("#montoTotal").val();
		      			var $valid = jQuery('#formPresupuesto').valid();
				     	if(!$valid) {
					        $validator.focusInvalid();
					        return false;
		      			}else{
		      				if(!presupuesto){
		      					if(pre<0){
		      						html = '<div class="alert alert-danger alert-error col-md-10">'+
               					           '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          				   '<strong> No ha asignado presupuesto </strong></div>';
    									   $("#notificaciones1").html(html);
    									   $("#notificaciones1").fadeOut(3000);
		      						return false;
		      					}
		      					guardarPresupuesto();
		      					presupuesto = false;
		      				}else{
		      					editarPresupuesto();
		      				}
		      				
		      			}
	      			}
	      		}
	    	}
	    }
	  });

	jQuery(".select2").select2({
    	width: '100%'
  	});

	/*Funcion para agregar timepicker a los imputs*/
	
	jQuery('#fechaInicio').datepicker({
		dateFormat: "yy-mm-dd"
	});
	jQuery('#fechaFin').datepicker({
		dateFormat: "yy-mm-dd"
	});
	jQuery('#fechaInicioFase').datepicker({
		dateFormat: "yy-mm-dd",
		beforeShow: function() {
	        setTimeout(function(){
	            $('.ui-datepicker').css('z-index', 99999999999999);
	        }, 0);
	    }
	});
	jQuery('#fechaFinFase').datepicker({
		dateFormat: "yy-mm-dd",
		beforeShow: function() {
	        setTimeout(function(){
	            $('.ui-datepicker').css('z-index', 99999999999999);
	        }, 0);
	    }
	});
	
	//Levanta el modal de agregar mas equipo
	$(document).on("click",".agregarMasEquipo",function () {
		$("#modalAgregarEmpleado").modal('show');
	});
	//Levanta el modal de agregar mas cooperantes
	$(document).on("click",".agregarMascooperantes",function () {
		$("#modalAgregarCooperante").modal('show');
	});
	//Levanta el modal de agregar mas componentes
	$(document).on("click",".agregarMasComponente",function () {
		$("#modalAgregarComponentes").modal('show');
	});
	//Levanta el modal de agregar mas productos
	$(document).on("click",".agregarMasProductos",function () {
		$("#modalAgregarProductos").modal('show');
	});
	//Levanta el modal de agregar mas productos
	$(document).on("click",".agregarMasActividades",function () {
		$("#modalAgregarActividades").modal('show');
	});

	//Levanta el modal de agregar Fases
	$(document).on("click",".agregarMasFases",function () {
		$("#modalAgregarFasesActividad").modal('show');
	});

	$(document).on("click",".reprogramar",function (e) {
		e.preventDefault();
		$("#modalprogramarFasesActividad").modal('show');
		fase = $(this).data('id');
	})

	/*

		ACCIONES PARA EL PASO 7

    */
    
    	$("#actividadesProgramacionFasesProyectosCombo").change(function(){ // Llena las fases
	        llenarFasesProgramacionActividad();
	    });

    	$("#formProgramacionFase").submit(function (e){
	        e.preventDefault();
	        var datos = {
	            "opcion": 30,
	            "inicio": $("#fechaInicioFase").val(),
	            "fin": $("#fechaFinFase").val(),
	            "fase": fase
	        };
	        $.ajax({
	            async: true,
	            type: "POST",
	            url: "../class/registrarProyecto.php",
	            data: datos,
	            dataType: "html",
	            success: function(data){
	            	alert(data);

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
	                        
	                    $("#notificaciones6").html(html);
	                    $("#notificaciones6").fadeOut(4000);
	                    llenarFasesProgramacionActividad();
	                    $("#modalAgregarFasesActividad").modal('hide');

	                }
	            },
	            timeout: 4000
	        });
	    });

	    function llenarFasesProgramacionActividad(){
	        /*Parametros:
	            id del proyecto
	        */
	        var datos = {
	            "opcion": 28,
	            "proyectoid": proyectoid,
	            "actividad": $("#actividadesProgramacionFasesProyectosCombo").val()
	        };

	        $.ajax({
	            async: true,
	            type: "POST",
	            url: "../class/registrarProyecto.php",
	            data: datos,
	            dataType: "html",
	            success: function(data){

	                var tabla = '';
	                var response = JSON.parse(data);
	                for(var index = 0; index < response.length; index++){
	                    tabla += '<tr data-id="'+response[index].codigo+'" style="text-align:center; background-color: #D2DAE8;">' +
                                    '<td>' + response[index].descripcion + '</td>' +
                                    '<td>' + response[index].fechaInicio + '</td>' +
                                    '<td>' + response[index].fechaFin + '</td>' +     
                                    '<td><center>'+
                                        '<a href="#" class="reprogramar"><i class="fa fa-calendar-o"></i></a>'+
                                    '</td></center>' +          
                                '</tr>';
	                }
	                $("#cTablaProgramacionFasesActividad").html(tabla);
	            },
	            timeout: 4000
	        });
	    }
	    $("#actividadesCrearFasesProyectosCombo").change(function(){ // Llena las fases
	        llenarFasesActividad();
	    });

		function llenarFasesActividad(){
	        /*Parametros:
	            id del proyecto
	        */
	        var datos = {
	            "opcion": 28,
	            "proyectoid": proyectoid,
	            "actividad": $("#actividadesCrearFasesProyectosCombo").val()
	        };

	        $.ajax({
	            async: true,
	            type: "POST",
	            url: "../class/registrarProyecto.php",
	            data: datos,
	            dataType: "html",
	            success: function(data){

	                var tabla = '';
	                var response = JSON.parse(data);
	                for(var index = 0; index < response.length; index++){
	                    tabla += '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                    '<td>' + response[index].codigo + '</td>' +
                                    '<td>' + response[index].descripcion + '</td>' +         
                                '</tr>';
	                }
	                $("#cTablaFasesActividad").html(tabla);
	            },
	            timeout: 4000
	        });
	    }

		$("#formFases").submit(function (e){
	        e.preventDefault();
	        var datos = {
	            "opcion": 29,
	            "nombre": $("#nombreFase").val(),
	            "descripcion": $("#descripcionFase").val(),
	            "proyectoid": proyectoid,
	            "actividad": $("#actividadesCrearFasesProyectosCombo").val()
	        };
	        $.ajax({
	            async: true,
	            type: "POST",
	            url: "../class/registrarProyecto.php",
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
	                        
	                    $("#notificaciones5").html(html);
	                    $("#notificaciones5").fadeOut(4000);
	                    llenarFasesActividad();
	                    $("#modalAgregarFasesActividad").modal('hide');

	                }
	            },
	            timeout: 4000
	        });
	    });
	/*

		ACCIONES PARA EL PASO 6

    */

    $("#componentesProyectoActividadesCombo").change(function(){ // Llena los productos
    	
        llenarProductosComponente();
    });

   	function llenarProductosComponente(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 27,
            "proyectoid": proyectoid,
            "componente": $("#componentesProyectoActividadesCombo").val()
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                }
                $("#productosProyectoActividadCombo").html(combo);
            },
            timeout: 4000
        });
    }

	function llenarActividades(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 25,
            "proyectoid": proyectoid
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var tabla = '';
                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    tabla += '<tr style="text-align:center; background-color: #D2DAE8;">' +

                                    '<td>' + response[index].codigo + '</td>' +
                                    '<td>' + response[index].descripcion + '</td>' +
                                    '<td>' + response[index].componente+ '</td>' +
                                    '<td>' + response[index].producto+ '</td>' +            
                                '</tr>';
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";
                }
                $("#cTablaActividades").html(tabla);
                $("#actividadesCrearFasesProyectosCombo").html(combo);
                $("#actividadesProgramacionFasesProyectosCombo").html(combo);
                $("#actividadesFasesResponsablesProyectosCombo").html(combo);
                $("#actividadesPresupuestoProyectosCombo").html(combo);

            },
            timeout: 4000
        });
    }

    $("#formActividades").submit(function (e){
        e.preventDefault();

        var datos = {
            "opcion": 26,
            "codigo": $("#codigoActividadModal").val(),
            "nombre": $("#nombreActividadModal").val(),
            "descripcion": $("#actividadDescripcion").val(),
            "producto": $("#productosProyectoActividadCombo").val(),
            "proyectoid": proyectoid
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
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
                        
                    $("#notificaciones4").html(html);
                    $("#notificaciones4").fadeOut(4000);
                    llenarActividades();
                    $("#modalAgregarActividades").modal('hide');

                }
            },
            timeout: 4000
        });
    });
	
	/*

		ACCIONES PARA EL PASO 5

    */

    $("#formProductos").submit(function (e){
        e.preventDefault();

        var datos = {
            "opcion": 22,
            "descripcion": $("#productoDescripcion").val(),
            "componente": $("#componentesProyectoCombo").val(),
            "proyectoid": proyectoid
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
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
                        
                    $("#notificaciones3").html(html);
                    $("#notificaciones3").fadeOut(4000);
                    llenarProductos();
                    $("#modalAgregarProductos").modal('hide');

                }
            },
            timeout: 4000
        });
    });

	function llenarProductos(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 23,
            "proyectoid": proyectoid
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var tabla = '';
                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    tabla += '<tr style="text-align:center; background-color: #D2DAE8;">' +

                                    '<td>' + response[index].codigo + '</td>' +
                                    '<td>' + response[index].descripcion + '</td>' +
                                    '<td>' + response[index].componente+ '</td>' +          
                                '</tr>';
                }
                $("#cTablaProducto").html(tabla);
            },
            timeout: 4000
        });
    }


	/*

		ACCIONES PARA EL PASO 4

    */

    $("#formComponentes").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 17,
            "descripcion": $("#componenteDescripcion").val(),
            "proyectoid": proyectoid
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
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
                    llenarComponentes();
                    $("#modalAgregarComponentes").modal('hide');

                }
            },
            timeout: 4000
        });
    });

	function llenarComponentes(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 18,
            "proyectoid": proyectoid
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var tablaComponente = '';
                var combo ='';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    tablaComponente += '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                    '<td>' + response[index].codigo+ '</td>' +
                                    '<td>' + response[index].descripcion+ '</td>' +          
                                '</tr>';
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";
                }
                $("#cTablaComponente").html(tablaComponente);
                $("#componentesProyectoCombo").html(combo);
                $("#componentesProyectoActividadesCombo").html(combo);

            },
            timeout: 4000
        });
    }
    
    /*

		ACCIONES PARA EL PASO 3

    */

    function llenarCooperantes(){
        var datos = {
            "opcion": 21,
            "tipo": 1
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combo= '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    combo  += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                }
                $("#nuevoCooperanteCombo").html(combo);
            },
            timeout: 4000
        });
    }
    function llenarCooperantesNacional(){
        var datos = {
            "opcion": 21,
            "tipo": 0
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                }
                $("#nuevoCooperanteNacionalCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarMonedas(){
        var datos = {"opcion": 19};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";

                $("#monedaCooperanteCombo").html(combo);
                $("#monedaNacionalCombo").html(combo);
                $("#monedaCombo").html(combo);
            },
            timeout: 4000
        });
    }


    $("#tipoFondo").change(function(){ // Llena las ciudades
        var opcion = parseInt($('#tipoFondo').val());
        switch(opcion){
        	case 1:
        		$("#div1").show();
        		$('#div2').hide();
        		$('#div3').hide();
        		break
        	case 2:
        		$("#div1").hide();
                $('#div2').show();
                $('#div3').hide();
        		break
        	case 3:
                $("#div1").hide();
                $('#div2').hide();
                $('#div3').show();
        		break
        	default:
        		break
        }
    });

    function guardarPresupuesto(){
        var datos = {
            "opcion": 11,
            "lineaPresupuesto": $("#lineaPresupuesto").val(),
            "proyectoid": $('#proyectoid').val()
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                // var response = JSON.parse(data);
                // var html = '';

                // if(response[0].bandera == true){
                //    html = '<div class="alert alert-danger alert-error">'+
                //           '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                //           '<strong> Error! </strong>' +response[0].mensajeError+ '</div>';
                    
                // }else{

                //     html = '<div class="alert alert-success alert-succes">'+
                //           '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                //           '<strong> Exito! </strong></div>';
                        
                //     $("#notificaciones").html(html);
                // }
            },
            timeout: 4000
        });
    }
	
	function llenarPresupuesto(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 12,
            "proyectoid": proyectoid
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var tablaPresupuesto = '';
                var presupuestoGlobal = 0.0;
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                	presupuestoGlobal = parseFloat(presupuestoGlobal) + parseFloat(response[index].monto);
                    tablaPresupuesto += '<tr style="text-align:center; background-color: #D2DAE8;">' +
                                    '<td>' + response[index].fondoid + '</td>' +
                                    '<td>' + response[index].destino + '</td>' +
                                    '<td>' + response[index].moneda+ '</td>' +  
                                    '<td>' + response[index].monto+ '</td>' +          
                                '</tr>';
                }

                $("#ctablaPresupuesto").html(tablaPresupuesto);
                $("#montoTotal").val(parseFloat(presupuestoGlobal));
                $('#montoTotal').priceFormat({
				    prefix: '$ ',
				    centsSeparator: '.',
				    thousandsSeparator: ','
				});

            },
            timeout: 4000
        });
    }

    $("#formCooperantesModal").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 16,
            "tipoFondo": $("#tipoFondo").val(),
            "cooperante": $("#nuevoCooperanteCombo").val(),
            "cooperanteNacional": $("#nuevoCooperanteNacionalCombo").val(),
            "moneda": $("#monedaCombo").val(),
            "monedaNacional": $("#monedaNacionalCombo").val(),
            "monedaCooperante": $("#monedaCooperanteCombo").val(),
            "monto": $("#montoModal").val(),
            "montoNacional": $("#montoNacionalModal").val(),
            "montoCooperante": $("#montoCooperanteModal").val(),
            "proyectoid": proyectoid
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
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
                    llenarPresupuesto();
                    $("#modalAgregarCooperante").modal('hide');

                }
            },
            timeout: 4000
        });
    });
    /* 
		
		ACCIONES PARA EL PASO 2

    */
    function llenarCargos(){
        var datos = {"opcion": 5};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                	if(response[index].codigo > 2 ){
                		combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                	}	
                }
                $("#cargosCombo").html(combo);
            },
            timeout: 4000
        });
    }
    function llenarEmpleados(){
        var datos = {"opcion": 9};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                  
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                  
                $("#directorProyectoCombo").html(combo);
                $("#empleadosEquipoCombo").html(combo);
                $("#administradorProyectoCombo").html(combo);
            },
            timeout: 4000
        });
    }

    $("#formEquipoModal").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 10,
            "cargo": $("#cargosCombo").val(),
            "empleadoid": $("#empleadosEquipoCombo").val(),
            "proyectoid": proyectoid
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
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
                    llenarEquipo();
                    $("#modalAgregarEmpleado").modal('hide');

                }
            },
            timeout: 4000
        });
    });
	function llenarEquipo(){
        
        var datos = {
            "opcion": 24,
            "proyectoid": proyectoid
        };
        jQuery.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	
                var tablaEmpleados = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    tablaEmpleados += '<tr style="text-align:center; background-color: #D2DAE8;" >' +
                                    '<td>' + response[index].codigo + '</td>' +
                                    '<td>' + response[index].rol + '</td>' +
                                    '<td>' + response[index].nombre + '</td>'+
                                    '<td><center>'+
                                        '<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>'+
                                    '</td></center>' +            
                              '</tr>';
                }

                $("#empleadosExtras").html(tablaEmpleados);
            },
            timeout: 4000
        });
    }

	function guardarEmpleados(){

        var datos = {
            "opcion": 8,
            "directorProyecto": $("#directorProyectoCombo").val(),
            "administradorProyecto": $("#administradorProyectoCombo").val(),
            "proyectoid": proyectoid
            };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	llenarEquipo();
            },
            timeout: 4000
        });
    }

    function editarEmpleados(){

        var datos = {
            "opcion": 14,
            "directorProyecto": $("#directorProyectoCombo").val(),
            "administradorProyecto": $("#administradorProyectoCombo").val(),
            "proyectoid": proyectoid
            };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
            	llenarEquipo();
            },
            timeout: 4000
        });
    }

    /*

		ACCIONES PARA EL PASO 1

    */

    	/*Mostrar y ocultar divs*/
	$("#objetivo").click(function(){
		$('#divBeneficiarios').show(1000);	
	});

	$("#beneficiarios").click(function(){
		$('#divSectorInstitucional').show(1000);	
	});

	$("#sectorInstitucionalCombo").click(function(){
		$('#divSectorEconomico').show(1000);	
	});

	$("#sectorEconomicoCombo").click(function(){
		$('#divEjeEstrategico').show(1000);	
	});

	$("#ejeEstrategicoCombo").click(function(){
		$('#divAreasFocalizacion').show(1000);	
	});

    function llenarZona(){
        var datos = {"opcion": 0};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                  
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                  
                $("#zonasCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarSectorEconomico(){
        var datos = {"opcion": 2};

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combollenarSector = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combollenarSector += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#sectorEconomicoCombo").html(combollenarSector);
            },
            timeout: 4000
        });
    }

    function llenarSectorInstitucional(){
        var datos = {"opcion": 3};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combollenarSector = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combollenarSector += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#sectorInstitucionalCombo").html(combollenarSector);
            },
            timeout: 4000
        });
    }

    function llenarEjeEstrategico(){
        var datos = {"opcion": 1};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var combollenarSector = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combollenarSector += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#ejeEstrategicoCombo").html(combollenarSector);
            },
            timeout: 4000
        });
    }

    function llenarAreasFocalizacion(){
        var datos = {"opcion": 7};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
 				
                var combollenarSector = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combollenarSector += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#areasFocalizacionCombo").html(combollenarSector);
            },
            timeout: 4000
        });
    }
    function guardarProyectoInformacion(){
        var datos = {
            "opcion": 6,
            "numeroProyecto": $("#numeroProyecto").val(),
            "nombreProyecto": $("#nombreProyecto").val(),
            "descripcion": $("#descripcion").val(),
            "zona": $('#zonasCombo').val(),
            "fechaInicio": $("#fechaInicio").val(),
            "fechaFin": $("#fechaFin").val(),
            "objetivo": $("#objetivo").val(),
            "beneficiarios": $("#beneficiarios").val(),
            "sectorEconomico": $("#sectorEconomicoCombo").val(),
            "sectorInstitucional": $("#sectorInstitucionalCombo").val(),
            "ejeEstrategico": $("#ejeEstrategicoCombo").val(),
            "areasFocalizacion": $("#areasFocalizacionCombo").val()
            };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                var html = '';
                if(response[0].bandera != true){
                 	proyectoid = response[0].proyectoid;    
                } 
                llenarEquipo();         
              },
            timeout: 4000
        });
    }

    function editarProyectoInformacion(){

        var datos = {
            "opcion": 13,
            "numeroProyecto": $("#numeroProyecto").val(),
            "nombreProyecto": $("#nombreProyecto").val(),
            "descripcion": $("#descripcion").val(),
            "zona": $('#zonasCombo').val(),
            "fechaInicio": $("#fechaInicio").val(),
            "fechaFin": $("#fechaFin").val(),
            "objetivo": $("#objetivo").val(),
            "beneficiarios": $("#beneficiarios").val(),
            "sectorEconomico": $("#sectorEconomicoCombo").val(),
            "sectorInstitucional": $("#sectorInstitucionalCombo").val(),
            "ejeEstrategico": $("#ejeEstrategicoCombo").val(),
            "areasFocalizacion": $("#areasFocalizacionCombo").val(),
            "proyectoid": proyectoid
            };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                llenarEquipo();
            },
            timeout: 4000
        });
    }

	
});


