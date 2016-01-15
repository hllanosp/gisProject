jQuery(document).ready(function(){

    obtenerProyecto();
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
                $('#Localizacion').text(response[1].zona);
                $('#descripcionProyecto').text(response[1].descripcion);
                $('#inicioProyecto').text("Inicio:"+"   "+response[1].inicio);
                $('#finProyecto').text("Fin:"+"        "+response[1].fin );
                $('#objetivoProyecto').text(response[1].objetivo);
                $('#beneficiariosProyecto').text(response[1].beneficiarios);
                $('#SIProyecto').text(response[1].institucional);
                $('#SEProyecto').text(response[1].economico);
                $('#EEProyecto').text(response[1].eje);
                $('#AFProyecto').text(response[1].area);
            },
            timeout: 4000
        });
	}
});