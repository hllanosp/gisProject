
$(document).ready(function(){

    $.backstretch("imagenes/BG.jpg");
    /* funcion que se l
    evanta al momento de dar click para enviar el formulario*/
    $("#formSubmit").submit(function (e){
        e.preventDefault();
            var datos = {
                usuario: $("#usuario").val(),
                contrasena: $("#contrasena").val()
            }

        $.ajax({
            async: true,
            type: "POST",
            url: "class/login_submit.php",
            data: datos,
            dataType: "html",
            beforeSend: function(){
                $('#notificaciones').html('');
                var loader='<img class="img" src="imagenes/loader.gif" alt="" />';
                $('#loader').html(loader);
            }, 
            error: function(){

                $('#loader').html('');

                html = '<div id="mensajeError" class="alert alert-danger alert-error">'+
                             '<a  href="#" class="close" data-dismiss="alert">&times;</a>'+
                            '<strong> ¡Ups! </strong>Estamos teniendo problemas de conexión, porfavor reintente.</div>';

                $("#notificaciones").html(html);

            },
            success: function(data){
                alert(data);
                var response = JSON.parse(data);
                var html = "";
                $('#loader').html('');
                if(response[0].bandera == true){

                    document.location.href = "pages/pantalla_principal.php";

                }else{

                    html = '<div class="alert alert-danger alert-error">'+
                             '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                            '<strong> Error! </strong>' +response[0].mensajeError+ '</div>';

                    $("#notificaciones").html(html);
                }
            },
            timeout: 4000
        });
    });
});