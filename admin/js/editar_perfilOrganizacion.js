jQuery(document).ready(function(){
    initComponents();

    $(document).on("click","#agregarJunta",function () {
        $("#modal_agregaJuntaDirectiva").modal('show');
    });

    // funcionalidad para subir el logo
    $("#input-fcount-logo").fileinput({
        paramName: "logo",
        uploadUrl: "../class/upload_logo.php",
        minFileCount: 1,
        validateInitialCount: true,
        overwriteInitial: false
    });

    // agregar miembros en la junta directiva
    $("#form_agregaJunta").submit(function (e){
        e.preventDefault();
       
       var datos = {
            "opcion": 10,
            "cargo": $("#nuevo_juntaCargo").val(),
            "nombre": $("#nuevo_juntaNombre").val()
            
        };
        alert("="+ $("#nuevo_juntaCargo").val()+"="+$("#nuevo_juntaNombre").val()
            );
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/perfil_organizacion.php",
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
                    $("#notificacion").html(html);
                    $("#notificacion").fadeOut(4000);
                    $("#modal_agregaJuntaDirectiva").modal('hide');
            },
            timeout: 4000
        });
    });

    // submit de los formularios

    $("#perfilOrganizacional").submit(function (e){
        e.preventDefault();
        editar_info_organizacion();
    });

    $("#form_infoLegal").submit(function (e){
        e.preventDefault();
        editar_info_organizacion();
    });

    $("#form_infoContacto").submit(function (e){
        e.preventDefault();
        editar_info_organizacion();
    });

    // ----------------------------------------------------------//
    // este codigo se utiliza para detectar cambios en los valores de cualquier input esto para evitar salir sin guardar
    var warn_on_unload="";
    $('input:text,input:checkbox,input:radio,textarea,select').one('change', function() 
    {
        warn_on_unload = "Si sale de la pagina, no se guardaran los datos, guarde los datos antes de abandonar la pagina.";
 
        $('#submit1').click(function() { 
            warn_on_unload = "";}); 
 

        $('#submit2').click(function() { 
            warn_on_unload = "";});  


        $('#submit3').click(function() { 
            warn_on_unload = "";});  

            window.onbeforeunload = function() { 
            if(warn_on_unload != ''){
                return warn_on_unload;
            }   
        }
    });
    // ----------------------------------------------------------//


    // ----------------------------------------------------------//
    // aqui se iniciaran los componentes de los formularios en editar perfil
    function initComponents(){
        
        var datos = {
            "opcion": 0,
            "proyectoId": 1 //valor de prueba
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/perfil_organizacion.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                // formulario Informacion de Contacto
                $('#txt_contacto_direccion').val(response[1].descripcion);
                $('#txt_contacto_telefono1').val(response[1].descripcion);
                $('#txt_contacto_telefono2').val(response[1].descripcion);
                $('#txt_contacto_celular').val(response[1].descripcion);
                $('#txt_contacto_email').val(response[1].descripcion);
                $('#txt_contacto_web').val(response[1].descripcion);
                $('#contact_urlFacebook').val(response[1].descripcion);
                $('#contact_urltwitter').val(response[1].descripcion);
                $('#contact_urlyoutube').val(response[1].descripcion);
                $('#contact_urllinkedin').val(response[1].descripcion);
                $('#contact_urlIstagram').val(response[1].descripcion);

                // formulario Informacion Legal
                $('#text_registro').val(response[1].descripcion);
                $('#text_proyecto').val(response[1].descripcion);
                $('#text_RTN').val(response[1].descripcion);
                $('#txt_presidente').val(response[1].descripcion);
                $('#txt_vicePresidente').val(response[1].descripcion);
                $('#txt_secretario').val(response[1].descripcion);
                $('#txt_tesorero').val(response[1].descripcion);
                $('#txt_fiscal').val(response[1].descripcion);
                $('#txt_vocalI').val(response[1].descripcion);
                $('#txt_vocalII').val(response[1].descripcion);
                $('#txt_apoderado').val(response[1].descripcion);
                $('#txt_rtnApoderado').val(response[1].descripcion);
                $('#txt_director').val(response[1].descripcion);
                // formulario Perfil Organizacional
                
                $('#perfil_org_nombre').val(response[1].descripcion) ;
                $('#perfil_org_pais').val(response[1].descripcion);
                $('#perfil_org_depto').val(response[1].descripcion);
                $('#perfil_org_municipio').val(response[1].descripcion);
                $('#perfil_org_act').val(response[1].descripcion);
                $('#perfil_org_mision').html(response[1].descripcion);
                $('#perfil_org_vision').html(response[1].descripcion);
                $('#perfil_org_logo').val(response[1].descripcion);

                // faltan agregar los telefonos
                // FALTA AGREGAR EL icono de la organizacion y tambien reparar problema del margin derecho
                // falta agregar links debajo del icono de la empresa
            },
            timeout: 4000
        });
    }
    // ----------------------------------------------------------//

    function editar_info_organizacion(){
        var nada  = "ND/ND";
        var datos = {
            "opcion": 1,
            "direccion": $('#txt_contacto_direccion').val(),
            "telefono1": $('#txt_contacto_telefono1').val(),
            "telefono2": $('#txt_contacto_telefono2').val(),
            "celular": $('#txt_contacto_celular').val(),
            "email": $('#txt_contacto_email').val(),
            "txt_contacto_web": $('#txt_contacto_web').val(),
            "contact_urlFacebook": $('#contact_urlFacebook').val(),
            "contact_urltwitter": $('#contact_urltwitter').val(),
            "contact_urlyoutube": $('#contact_urlyoutube').val(),
            "contact_urllinkedin": $('#contact_urllinkedin').val(),
            "contact_urlIstagram": $('#contact_urlIstagram').val(),


            "registro": $('#text_registro').val(),
            "proyecto": $('#text_proyecto').val(),
            "RTN": $('#text_RTN').val(),
            "presidente": $('#txt_presidente').val(),
            "vicePresidente": $('#txt_vicePresidente').val(),
            "secretario": $('#txt_secretario').val(),
            "tesorero": $('#txt_tesorero').val(),
            "fiscal": $('#txt_fiscal').val(),
            "vocalI": $('#txt_vocalI').val(),
            "vocalII": $('#txt_vocalII').val(),
            "apoderado": $('#txt_apoderado').val(),
            "rtnApoderado": $('#txt_rtnApoderado').val(),
            "director": $('#txt_director').val(),

            "nombre": $('#perfil_org_nombre').val(),
            "pais": $('#perfil_org_pais').val(),
            "departamento": $('#perfil_org_depto').val(),
            "municipio": $('#perfil_org_municipio').val(),
            "perfil_org_act": $('#perfil_org_act').val(),
            "mision": $('#perfil_org_mision').val(),
            "vision": $('#perfil_org_vision').val(),
            // "logo": $('#logo').val(),
            


            // "segundoNombre": (!$.trim($('#segundoNombre').val())) ? nada : $('#segundoNombre').val(),
            // "segundoApellido": (!$.trim($('#segundoApellido').val())) ? nada : $('#segundoApellido').val() ,
            
           
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/perfil_organizacion.php",
            data: datos,
            dataType: "html",
            success: function(data){
               alert(data);
            },
            timeout: 4000
        });
    }
    // ----------------------------------------------------------------// // ----------------------------------------------------------//




});
// end ready