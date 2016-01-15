jQuery(document).ready(function(){

    var componente = "";
    var producto = "";
    llenarProductos();

    $(document).on("click",".editar",function (e) {
        e.preventDefault();
        $('#productoDescripcion2').val($(this).data('descripcion'));
        componente = $(this).data('componente');
        producto = $(this).data('id');
        llenarComponentes();
        $("#modalEditarProductos").modal('show');
    });

    $(document).on("click",".agregarMasProductos",function (e) {
        e.preventDefault();
        $("#modalAgregarProductos").modal('show');
    });

    $("#formAgregarProductos").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 22,
            "descripcion": $("#productoDescripcion").val(),
            "componente": $("#componentesProyectoCombo").val(),
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
                        
                    $("#notificaciones3").html(html);
                    $("#notificaciones3").fadeOut(4000);
                    llenarProductos();
                    $("#modalAgregarProductos").modal('hide');
                }
            },
            timeout: 4000
        });
    });

    $("#formEditarProductos").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 7,
            "descripcion": $("#productoDescripcion2").val(),
            "componente": $("#componentesProyectoCombo2").val(),
            "producto": producto,
            "proyectoid": $('#proyectoGET').val()
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/verProyectos.php",
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
                        
                    $("#notificaciones3").html(html);
                    $("#notificaciones3").fadeOut(4000);
                    llenarProductos();
                    $("#modalEditarProductos").modal('hide');
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
                                    '<td>' + response[index].componente+ '</td>' + 
                                    '<td><center>'+
                                        '<a class="editar" data-id="'+response[index].codigo+'" data-componente="'+response[index].componenteId+'" data-descripcion="'+ response[index].descripcion +'" href=""><i class="edit fa fa-edit"></i></a>'+
                                    '</td></center>' +           
                                '</tr>';
                }
                $("#cTablaProducto").html(tabla);
            },
            timeout: 4000
        });
    }
    jQuery(".select2").select2({
        width: '100%'
    });

    llenarComponentes();
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
                    if(response[index].codigo == componente){
                        combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";
                    }
                    else{
                        combo += "<option  value='"  + response[index].codigo + "'>" + response[index].descripcion + "</option>";

                    }
                }

                $("#componentesProyectoCombo").html(combo);
                $("#componentesProyectoCombo2").html(combo);

            },
            timeout: 4000
        });
    }

});
   