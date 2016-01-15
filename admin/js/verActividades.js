jQuery(document).ready(function(){

	llenarActividades();
    llenarComponentes();

    var producto= "";
    var atividad="";

    function llenarComponentes(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 18,
            "proyectoid": $('#proyectoGET').val()
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
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";
                }
                $("#componentesProyectoActividadesCombo").html(combo);
                $("#componentesEditarProyectoActividadesCombo").html(combo);

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
            "proyectoid": $('#proyectoGET').val()
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
                                    '<td>' + response[index].producto+ '</td>' +
                                    '<td><center>'+
                                        '<a class="editar" data-nombre ="'+response[index].nombre+'" data-id="'+response[index].codigo+'" data-producto="'+response[index].productoId+'" data-componente="'+response[index].componenteId+'" data-descripcion="'+ response[index].descripcion +'" href=""><i class="edit fa fa-edit"></i></a>'+
                                    '</td></center>' +         
                                '</tr>';
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";
                }
                $("#cTablaActividades").html(tabla);
            },
            timeout: 4000
        });
    }

    jQuery(".select2").select2({
        width: '100%'
    });

    $(document).on("click",".editar",function (e) {
        e.preventDefault();
        $("#nombreEditarActividadModal").val($(this).data('nombre'));
        $("#actividadEditarDescripcion").val($(this).data('descripcion'));
        $("#componentesEditarProyectoActividadesCombo").val($(this).data('componente'));
        producto  = $(this).data('producto');
        actividad = $(this).data('id');
        $("#modalEditarActividades").modal('show');
    });


    //Levanta el modal de agregar mas productos
	$(document).on("click",".agregarMasActividades",function () {
		$("#modalAgregarActividades").modal('show');
	});

    $("#formActividades").submit(function (e){
        e.preventDefault();

        var datos = {
            "opcion": 26,
            "codigo": $("#codigoActividadModal").val(),
            "nombre": $("#nombreActividadModal").val(),
            "descripcion": $("#actividadDescripcion").val(),
            "producto": $("#productosProyectoActividadCombo").val(),
            "proyectoid": $('#proyectoGET').val()
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

    $("#formEditarActividades").submit(function (e){
        e.preventDefault();
        alert();
        var datos = {
            "opcion": 8,
            "nombre": $("#nombreEditarActividadModal").val(),
            "descripcion": $("#actividadEditarDescripcion").val(),
            "producto": $("#productosEditarProyectoActividadCombo").val(),
            "actividad": actividad,
            "proyectoid": $('#proyectoGET').val()
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
                        
                    $("#notificaciones4").html(html);
                    $("#notificaciones4").fadeOut(4000);
                    llenarActividades();
                    $("#modalEditarActividades").modal('hide');

                }
            },
            timeout: 4000
        });
    });

    $(".componentes").change(function(){ // Llena los productos
        llenarProductosComponente($(this).val());
    });


    function llenarProductosComponente(valor){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 27,
            "proyectoid": $('#proyectoGET').val(),
            "componente": valor
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
                    if(response[index].codigo == producto){
                        combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    }
                    else{
                        combo += "<option value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                    }
                    
                }
                $("#productosProyectoActividadCombo").html(combo);
                $("#productosEditarProyectoActividadCombo").html(combo);
            },
            timeout: 4000
        });
    }
	
});