jQuery(document).ready(function(){


    llenarComponentes();
    //Levanta el modal de agregar mas componentes
    $(document).on("click",".agregarMasComponente",function (e) {
        e.preventDefault();
        $("#modalAgregarComponentes").modal('show');
    });

    $(document).on("click",".editar",function (e) {
        e.preventDefault();

        $('#componenteDescripcion2').val($(this).data('descripcion'));
        $("#modalEditarComponentes").modal('show');
    });


    $("#formComponentes").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 17,
            "descripcion": $("#componenteDescripcion").val(),
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
                        
                    $("#notificaciones2").html(html);
                    $("#notificaciones2").fadeOut(4000);
                    llenarComponentes();
                    $("#modalAgregarComponentes").modal('hide');

                }
            },
            timeout: 4000
        });
    });

    $("#formComponentesEditar").submit(function (e){
        e.preventDefault();
        var datos = {
            "opcion": 6,
            "descripcion": $("#componenteDescripcion2").val(),
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

                    llenarComponentes();
                    $("#modalEditarComponentes").modal('hide');
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
            "proyectoid": $("#proyectoGET").val()
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
                                    '<td><center>'+
                                        '<a class="editar" data-descripcion="'+ response[index].descripcion +'" href=""><i class="edit fa fa-edit"></i></a>'+
                                    '</td></center>' +           
                                '</tr>';
                }
                $("#cTablaComponente").html(tablaComponente);

            },
            timeout: 4000
        });
    }
});
