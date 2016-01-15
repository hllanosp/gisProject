jQuery(document).ready(function(){

    var actividades = [];
    var fases = [];

    llenarActividades();
    llenarFasesActividad();
    llenarFasesSeguimiento();

    function actividad(codigo,producto,presupuesto){
        this.codigo = codigo;
        this.producto = producto;
        this.presupuesto = presupuesto;
    }

    function fase(codigo,nombre,estado,estadoId,accion,actividad,informe,informeId){
        this.codigo = codigo;
        this.nombre = nombre;
        this.estado = estado;
        this.informe = informe;
        this.estadoId = estadoId;
        this.accion = accion;
        this.actividad = actividad;
        this.informeId = informeId;
    }

    $(document).on("click",".verIndicadores",function () {
        $("#modalIndicadores").modal('show');
    });

    function llenarActividades(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 25,
            "proyectoid": $('#proyectoGET').val()
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                   actividades[index] = new actividad(response[index].codigo, response[index].productoId, response[index].presupuesto);
                }
            },
            timeout: 4000
        });
    }

    function llenarFasesActividad(){
        /*Parametros:
            id del proyecto
        */
        var datos = {
            "opcion": 0,
            "proyectoid": $('#proyectoGET').val()
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/gestionarSeguimiento.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){

                    fases[index] = new fase(response[index].codigo,response[index].nombre,response[index].estado,response[index].estadoId,response[index].accion,response[index].actividad,response[index].informe,response[index].informeId); 
                }
            },
            timeout: 4000
        });
    }

    function llenarFasesSeguimiento(){
        var contenido = "";
        var cambio = false; 
        for(var indexA = 0; indexA < actividades.length; indexA++){

            cambio=true;
            contenido += '<tr>'+
                                '<td style="text-align:center; background-color: #D2DAE8;">'+
                                    actividades[indexA].codigo+
                                '</td>';
            for(var indexF = 0; indexF < fases.length; indexF++){
                
                if(cambio){
                    if(fases[indexF].actividad == actividades[indexA].codigo){
                        switch(fases[indexF].estadoId){

                            case "P":
                                contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;">Vacio</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a href="darSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                cambio = false;
                            break;
                            case "E":
                                contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;">Vacio</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a href="darSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                cambio = false;
                            break;
                            case "F":
                                if(fases[indexF].informeId == 0){
                                    contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a href="generarInformeSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].informe+'</a></td>'+
                                         '<td style="text-align:center; background-color: #D2DAE8;"><a href="verResultados.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                    cambio = false;   
                                }else{
                                    contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="verInformeSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].informe+'</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="verResultados.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                    cambio = false;
                                }
                            break;
                            default:                            
                        }              
                    }
                }else{
                    if(fases[indexF].actividad == actividades[indexA].codigo){

                        switch(fases[indexF].estadoId){
                            case "P":
                                contenido += '<tr>'+
                                                 '<td style="text-align:center; background-color: #ECECEC;"></td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">Vacio</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;"><a href="darSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                             '</tr>';
                                             cambio = false;
                                break;
                            case "E":
                                contenido += '<tr>'+
                                                 '<td style="text-align:center; background-color: #ECECEC;"></td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;">Vacio</td>'+
                                                 '<td style="text-align:center; background-color: #D2DAE8;"><a href="darSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                             '</tr>';
                                             cambio = false;
                                break;
                            case "F":
                                if(fases[indexF].informeId == 0){
                                    contenido += '<tr>'+ 
                                     '<td style="text-align:center; background-color: #ECECEC;"></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="generarInformeSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].informe+'</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="verResultados.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                }else{
                                    contenido += '<tr>'+
                                     '<td style="text-align:center; background-color: #ECECEC;"></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].estado+'</td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a class="verIndicadores" href="#">Ver Indicadores</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="verInformeSeguimiento.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].informe+'</a></td>'+
                                     '<td style="text-align:center; background-color: #D2DAE8;"><a href="verResultados.php?C='+$('#proyectoGET').val()+'&N='+$('#NGET').val()+'&CI='+$('#CIGET').val()+'&F='+fases[indexF].codigo+'">'+fases[indexF].accion+'</a></td>'+
                                    '</tr>';
                                }
                                break;
                            default:
                        }
                    }
                }
            }
        }
        $("#tablaSeguimiento").html(contenido);
    }
});