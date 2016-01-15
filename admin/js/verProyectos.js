jQuery(document).ready(function(){
	
	llenarProyectos();
	function llenarProyectos(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 1
        };

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/verProyectos.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var ul = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                    ul += '<li>'+
                            '<a href="verProyecto.php?C='+response[index].codigo+'&N='+response[index].nombre+'&CI='+response[index].codigoInterno+'"><span class="fa-stack fa-lg pull-left"><i class="fa fa-file-text-o fa-stack-1x "></i></span>'+response[index].codigo+'</a>'+
                          '</li>';
                }
                $("#menuProyectos").html(ul);
            },
            timeout: 4000
        });
	}
});