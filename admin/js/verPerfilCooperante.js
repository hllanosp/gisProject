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
                $('#nombreCooperante').html(response[1].descripcion);
                $('#codigo_cooperante').html(response[1].descripcion);
                $('#tipo_cooperante').html(response[1].descripcion);
                $('#RTN_cooperante').html(response[1].descripcion);
                $('#area_accion').html(response[1].descripcion);

                $('#contact_sitio').html(response[1].descripcion);
                $('#contact_urlface').html(response[1].descripcion);
                $('#contact_urlTwitter').html(response[1].descripcion);

                $('#mision').html(response[1].descripcion);
                $('#vision').html(response[1].descripcion);



                $('#representante').html(response[1].descripcion);
                $('#ejecutivoProyecto').html(response[1].descripcion);
                $('#asistente').html(response[1].descripcion);

                $('#ciudad').html(response[1].descripcion);
                $('#direccion').html(response[1].descripcion);
                $('#telefono').html(response[1].descripcion);
                $('#email').html(response[1].descripcion);
                
               
            },
            timeout: 4000
        });
    }
    // ----------------------------------------------------------//

    function obtenerLogo(){

    }
});
// end ready