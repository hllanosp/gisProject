jQuery(document).ready(function(){

    $(document).on("click",".agregarMascooperantes",function (e) {
        e.preventDefault();
        $("#modalAgregarCooperante").modal('show');
    });

    jQuery(".select2").select2({
        width: '100%'
    });

    llenarCooperantes();
    llenarMonedas();
    llenarCooperantesNacional();
    llenarLinea();

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
            timeout: 5000
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
            timeout: 5000
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
            "proyectoid": $("#proyectoGET").val()
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
            timeout: 5000
        });
    });

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

    $(document).on("click","#editarON",function (e) {
        e.preventDefault();
        $("#editarON").hide();
        $("#guardarON").show();
        $( "#lineaPresupuesto" ).prop( "disabled", false);
    });

    $(document).on("click","#guardarON",function (e) {
        e.preventDefault();
        
        $("#editarON").show();
        $("#guardarON").hide();
        $( "#lineaPresupuesto" ).prop( "disabled", true);
        var datos = {
            "opcion": 4,
            "lineaPresupuesto": $( "#lineaPresupuesto" ).val(),
            "proyectoid": $("#proyectoGET").val()
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
                }
            },
            timeout: 5000
        });
    });
	llenarPresupuesto();
	function llenarPresupuesto(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 12,
            "proyectoid": $("#proyectoGET").val()
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
                                    '<td>' + response[index].monto+ '</td>' +          
                                '</tr>';
                }

                $("#ctablaPresupuesto").html(tablaPresupuesto);
                $("#montoTotal").val(parseFloat(presupuestoGlobal));
            },
            timeout: 5000
        });
    }

    function llenarLinea(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 5,
            "proyectoid": $("#proyectoGET").val()
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/verProyectos.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                $('#lineaPresupuesto').val(response[0].linea);
            },
            timeout: 5000
        });
    }

});