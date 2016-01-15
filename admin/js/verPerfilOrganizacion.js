jQuery(document).ready(function(){
    obtenerPerfil();
    obtenerLogo();


    // ----------------------------------------------------------//
    // en esta funcion se obtienen todos los datos del perfil de la organizacion
    function obtenerPerfil(){

        var datos = {
            "opcion": 0,
            "proyectoId": 1
        };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/perfil_organizacion.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                $('#perfil_organizacion').val("que ondas ");
                $('#perfil_ubicacion').html(response[1].descripcion);
                $('#perfil_actividad').html(response[1].descripcion);
                $('#perfil_mision').html(response[1].descripcion);
                $('#perfil_vision').html(response[1].descripcion);
                $('#perfil_registro').html(response[1].descripcion);
                $('#perfil_fechaConstitucion').html(response[1].descripcion);
                $('#perfil_RTN').html(response[1].descripcion);
                $('#perfil_presidente').html(response[1].descripcion);
                $('#perfil_vicePres').html(response[1].descripcion);
                $('#perfil_secretaria').html(response[1].descripcion);
                $('#perfil_tesorero').html(response[1].descripcion);
                $('#perfil_fiscal').html(response[1].descripcion);
                $('#perfil_vocalI').html(response[1].descripcion);
                $('#perfil_vocalII').html(response[1].descripcion);
                $('#perfil_ApoderadoLegal').html(response[1].descripcion);
                $('#perfil_direcEjectivo').html(response[1].descripcion);
                $('#perfil_direccion').html(response[1].descripcion);
                $('#perfil_correo').html(response[1].descripcion);
                
                // faltan agregar los telefonos
                // FALTA AGREGAR EL icono de la organizacion y tambien reparar problema del margin derecho
                // falta agregar links debajo del icono de la empresa
            },
            timeout: 4000
        });
    }
    // ----------------------------------------------------------//

    function obtenerLogo(){

    }
});
// end ready