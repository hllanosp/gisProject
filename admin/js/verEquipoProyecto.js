jQuery(document).ready(function(){

    obtenerProyecto();
    llenarEquipo();
    var empleado;
    var cargo;

    jQuery(".select2").select2({
        width: '100%'
    });
    //Levanta el modal de agregar mas equipo
    $(document).on("click",".agregarMasEquipo",function () {
        llenarEmpleados();
        llenarCargos();
        $("#modalAgregarEmpleado").modal('show');
    });

    //Levanta el modal editar empleados
    $(document).on("click",".editar",function (e) {
        e.preventDefault();
        empleado = $(this).data('id');
        cargo = $(this).data('rol');
        llenarEmpleados();
        llenarCargos();
        $("#modalEditarEquipo").modal('show');
    });

    $("#formEquipoModal").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 10,
            "cargo": $("#cargosCombo").val(),
            "empleadoid": $("#empleadosEquipoCombo").val(),
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
                        
                    $("#notificaciones").html(html);
                    $("#notificaciones").fadeOut(4000);
                    llenarEquipo();
                    $("#modalAgregarEmpleado").modal('hide');

                }
            },
            timeout: 4000
        });
    });

    $("#formEditarEquipoModal").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 3,
            "cargoModificado": $("#cargosEditarCombo").val(),
            "cargoActual": cargo,
            "empleadoModificado": $("#empleadosEditarEquipoCombo").val(),
            "empleadoActual": empleado,
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
                    llenarEquipo();
                    $("#modalEditarEquipo").modal('hide');

                }
            },
            timeout: 4000
        });
    });

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
                    if(response[index].codigo == cargo ){

                        combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    }else{
                        combo += "<option  value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    }   
                }
                $("#cargosCombo").html(combo);
                $("#cargosEditarCombo").html(combo);
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
                alert(data);
                var combo = '<option></option>';
                var response = JSON.parse(data);
                // alert(empleado);
                for(var index = 0; index < response.length; index++){
                    if(response[index].codigo == empleado ){
                        combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    }else{
                        combo += "<option  value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    } 
                }
                $("#empleadosEquipoCombo").html(combo);
                $("#empleadosEditarEquipoCombo").html(combo);
            },
            timeout: 4000
        });
    }
    function llenarEquipo(){
        
        var datos = {
            "opcion": 24,
            "proyectoid": $("#proyectoGET").val()
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
                                        '<a class="editar" data-rol="'+response[index].rolId+'" data-id="'+ response[index].codigo +'" href=""><i class="edit fa fa-edit"></i></a>'+
                                    '</td></center>' +            
                              '</tr>';
                }

                $("#empleadosExtras").html(tablaEmpleados);
            },
            timeout: 4000
        });
    }

	function obtenerProyecto(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 0,
            "proyectoId": $("#proyectoGET").val()
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/verProyectos.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                $('#headerProyecto').text("Proyecto " + $("#proyectoGET").val() + " - " + response[1].nombre );
            },
            timeout: 4000
        });
	}
});