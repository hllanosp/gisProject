jQuery(document).ready(function(){
    llenarTiposContratos();
    llenarJornadaTrabajo();
    llenarVacaciones();
    llenarIHSS();
    llenarINFOP();
    llenarTarifa_ISV();
    // llenado inicial de los cargos por niveles
    for (var i = 1; i <= 3; i++) {
        init_components(i);
    };

    // ------------------------------------------------------------------------------------//
    // ----------------------------------LANZAMIENTO MODALES---------------------------------//
    // ------------------------------------------------------------------------------------//

    $(document).on("click","#agregarDirectivo",function () {
        $("#modalAgregarDirectivo").modal('show');
    });
    $(document).on("click","#agregarEjecutivo",function () {
        $("#modalAgregarEjecutivo").modal('show');
    });
    $(document).on("click","#agregarTecnico",function () {
        $("#modalAgregarTecnico").modal('show');
    });

    $(document).on("click","#agregarTipoContrato",function () {
        $("#modalAgregarTipoContrato").modal('show');
    });


    // ------------------------------------------------------------------------------------//
    // -----------------------------------llenado inicial-----------------------------------//
    // ------------------------------------------------------------------------------------//

    function init_components(nivel){
        var datos = {
            "opcion": 2,
            "puesto_nivel": nivel
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var tr = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                     tr+='<tr>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">'+response[index].nombre+'</th>'+
                             '<th style="text-align:center; background-color: #c9e2dc;">'+response[index].descripcion+'<span class=" pull-right glyphicon glyphicon-user "></span></th>'+
                         '</tr>'
                }
                switch(nivel){
                    case 1:
                         $("#tbody_directivos").html(tr);

                    
                        break;
                    case 2:
                         $("#tbody_ejecutivos").html(tr);
                    
                        break;
                    case 3:
                         $("#tbody_tecnicos").html(tr);
                    
                        break;
                    default:
                        break;
                }
            },
            timeout: 4000
        });
    }
    // ---------------------------------TIPO DE CONTRATOS----------------------------------------//
    function llenarTiposContratos(){
        var datos = {
            "opcion": 4
            
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var tr = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                     tr+= '<div class="row ">'+
                        '<div class="col-md-6 col-md-offset-4 " style "">'+
                            '<div class="form-group" style = "border-bottom: 1px solid #13bf77;">'+
                                '<div class="ckbox ckbox-success">'+
                                    '<input type="checkbox" id="checkboxSuccess" checked="checked">'+
                                        '<label id = "" for="checkboxSuccess">'+response[index].descripcion+'</label>'+
                                            '</div>'+
                                                '</div>'+
                                                    '<div class="" ></div>'+
                                                '</div>'+
                                            '</div>'
                }
                $("#divContratos").html(tr);
            },
            timeout: 4000
        });


    }

    // --------------------------------------------------------------------------------------//

    function llenarJornadaTrabajo(){
        // alert("llenar form_jornadaTrabajo");
        var datos = {
            "opcion": 6,
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#diurnaHoras').val(response[1].descripcion);
                $('#recargoDiurno').val(response[1].descripcion);
                $('#Mixtohoras').val(response[1].descripcion);
                $('#recargoMixto').val(response[1].descripcion);
                $('#nocturnohoras').val(response[1].descripcion);
                $('#recargoNocturno').val(response[1].descripcion);
            },
            timeout: 4000
        });
    }



    // --------------------------------------------------------------------------------------//

    function llenarVacaciones(){
        // alert("llenar form_jornadaTrabajo");
        var datos = {
            "opcion": 8,
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#vacaciones_unAnio').val(response[1].descripcion);
                $('#vaca_1a2').val(response[1].descripcion);
                $('#vaca2a3').val(response[1].descripcion);
                $('#vaca4').val(response[1].descripcion);
                $('#tiempoMaxi').val(response[1].descripcion);
               
            },
            timeout: 4000
        });
    }

    // --------------------------------------------------------------------------------------//

    function llenarIHSS(){
        // alert("llenar form_jornadaTrabajo");
        var datos = {
            "opcion": 8,
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#salarioMinimo').val(response[1].descripcion);
                $('#numeroEmpleados').val(response[1].descripcion);
                $('#porcentajeEmpleado').val(response[1].descripcion);
                $('#porcentajePatrono').val(response[1].descripcion);
               
            },
            timeout: 4000
        });
    }
// --------------------------------------------------------------------------------------//

    function llenarINFOP(){
        // alert("llenar form_jornadaTrabajo");
        var datos = {
            "opcion": 12,
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#porcenValorPlanilla').val(response[1].descripcion);
               
            },
            timeout: 4000
        });
    }

// --------------------------------------------------------------------------------------//

    function llenarINFOP(){
        // alert("llenar form_jornadaTrabajo");
        var datos = {
            "opcion": 14,
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#isv_tasaNacional').val(response[1].nombre);
                $('#isv_tasaExtranjeros').val(response[1].nombre);
               
            },
            timeout: 4000
        });
    }

// --------------------------------------------------------------------------------------//

    function llenarTarifa_ISV(){
        var datos = {
            "opcion": 15
            
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var tr = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                     tr+= '<tr>'+
                            '<th style="text-align:center; background-color: #c9e2dc;" width="15%">' +response[1].zona+ '</th>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">' +response[1].descripcion+ '</th>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">' +response[1].descripcion+ '</th>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">' +response[1].descripcion+ '</th>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">' +response[1].descripcion+ '</th>'+
                            '<th style="text-align:center; background-color: #c9e2dc;">' +response[1].descripcion+ '</th>'+
                        '</tr>'
                }
                $("#tbody_tarifaISV").html(tr);
            },
            timeout: 4000
        });
    }

    // --------------------------------------------------------------------------------------//
    // --------------------------------------SUBMITS----------------------------------------//
    // --------------------------------------------------------------------------------------//

    $("#formAgregarDirectivo").submit(function (e){
        var datos = {
            "opcion": 1 ,
            "puesto_cod": $("#DirectivoCod").val(),
            "puesto_nombre": $("#DirectivoPuesto").val(),
            "puesto_nivel": $("#nivel").val()
            
        };
       
        // alert( $("#DirectivoCod").val()+"="+$("#DirectivoPuesto").val()*"="+$("#nivel").val());
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! </strong></div>'; 

                }
                    $("#notificacionesnivel").html(html);
                    // init_components($("#nivel").val());
                    $("#notificacionesnivel").fadeOut(4000);
                    $("#modalAgregarDirectivo").modal('hide');
            },
            timeout: 4000
        });
    });
    
   

   
    // -----------------------------------------------------------------------------------//
    
    $("#formAgregarEjecutivo").submit(function (e){
        var datos = {
            "opcion": 1 ,
            "puesto_cod": $("#EjecutivoCod").val(),
            "puesto_nombre": $("#EjecutivoPuesto").val(),
            "puesto_nivel": $("#nivelEjecutivo").val()
            
        };
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! </strong></div>';
                        

                }
                    $("#notificacionesnivel").html(html);
                    $("#notificacionesnivel").fadeOut(4000);
                    $("#modalAgregarEjecutivo").modal('hide');
            },
            timeout: 4000
        });
    });
    
    // -----------------------------------------------------------------------------------//
   
    
    $("#formAgregarTecnico").submit(function (e){
        var datos = {
            "opcion": 1 ,
            "puesto_cod": $("#TecnicoCod").val(),
            "puesto_nombre": $("#TecnicoPuesto").val(),
            "puesto_nivel": $("#nivelTecnico").val()
            
        };
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! </strong></div>';
                        

                }
                    $("#notificacionesnivel").html(html);
                    $("#notificacionesnivel").fadeOut(4000);
                    $("#modalAgregarTecnico").modal('hide');
            },
            timeout: 4000
        });
    });

// ------------------------------NUEVO TIPO CONTRATO--------------------------------------------------//
    
    $("#form_tipoContrato").submit(function (e){
        var datos = {
            "opcion": 3 ,
            "tipoContrato": $("#txt_tipoContrato").val()
            
        };
       
        alert( $("#txt_tipoContrato").val());
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-10">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionTipoContrato" ).html(html);
                    $("#notificacionTipoContrato").fadeOut(4000);
                    $("#modalAgregarTipoContrato").modal('hide');
            },
            timeout: 4000
        });
    });
    
   
// ------------------------------Jornada de trabajo y porcentajes de recargo--------------------------------//
    
    $("#form_jornadaTrabajo").submit(function (e){
        var datos = {
            "opcion": 5,
            "diurnaHoras": $("#diurnaHoras").val(),
            "recargoDiurno": $("#recargoDiurno").val(),
            "Mixtohoras": $("#Mixtohoras").val(),
            "recargoMixto": $("#recargoMixto").val(),
            "nocturnohoras": $("#nocturnohoras").val(),
            "recargoNocturno": $("#recargoNocturno").val()
        };
       
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionJornada" ).html(html);
                    $("#notificacionJornada").fadeOut(4000);
                    
            },
            timeout: 4000
        });
    });
   
// ------------------------------VACACIONES--------------------------------//
    
    $("#form_vacaciones").submit(function (e){
        var datos = {
            "opcion": 7,
            "vacaciones_unAnio": $("#vacaciones_unAnio").val(),
            "vaca_1a2": $("#vaca_1a2").val(),
            "vaca2a3": $("#vaca2a3").val(),
            "vaca4": $("#vaca4").val(),
            "tiempoMaxi": $("#tiempoMaxi").val()
        };
       
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionVacaciones" ).html(html);
                    $("#notificacionVacaciones").fadeOut(4000);
                    
            },
            timeout: 4000
        });
    });
    
     
// ------------------------------IHSS--------------------------------//
    
    $("#form_seguro").submit(function (e){
        var datos = {
            "opcion": 9,
            "salarioMinimo": $("#salarioMinimo").val(),
            "numeroEmpleados": $("#numeroEmpleados").val(),
            "porcentajeEmpleado": $("#porcentajeEmpleado").val(),
            "porcentajePatrono": $("#porcentajePatrono").val()
        };
       
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionSeguro" ).html(html);
                    $("#notificacionSeguro").fadeOut(4000);
                    
            },
            timeout: 4000
        });
    });
        
// ------------------------------INFOP--------------------------------//
    
    $("#form_INFOP").submit(function (e){
        var datos = {
            "opcion": 11,
            "porcenValorPlanilla": $("#porcenValorPlanilla").val(),
            
        };
       
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionInfop" ).html(html);
                    $("#notificacionInfop").fadeOut(4000);
                    
            },
            timeout: 4000
        });
    });
            
// ------------------------------ISV HONORARIOS PROFESIONALES--------------------------------//
    
    $("#form_ISV").submit(function (e){
        var datos = {
            "opcion": 13,
            "isv_tasaNacional": $("#isv_tasaNacional").val(),
            "isv_tasaExtranjeros": $("#isv_tasaExtranjeros").val()
        };
       
        
        $.ajax({
           async: true,
            type: "POST",
            url: "../class/RRHH_parametros.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                var html = '';

                if(response[1].bandera == true){
                   html = '<div class="alert alert-danger alert-error col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Error! </strong>' +response[1].mensajeError+ '</div>';
                    
                }else{

                    html = '<div class="alert alert-success alert-succes col-md-12">'+
                          '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                          '<strong> Exito! ' +response[1].mensajeError+ ' </strong></div>'; 

                }
                    $("#notificacionISV" ).html(html);
                    $("#notificacionISV").fadeOut(4000);
            },
            timeout: 4000
        });
    });
    
   
    
    
});