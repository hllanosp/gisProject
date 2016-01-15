jQuery(document).ready(function(){

 
    var componentes = [];
    var productos = [];
    var actividades = [];
    var fases = [];

    llenarComponentes();
    llenarActividades();
    llenarProductos();
    llenarFasesActividad();

    llenarPlanOperativo();
	
    function componente(codigo){
    	this.codigo = codigo;
    }

    function actividad(codigo,producto,presupuesto){
    	this.codigo = codigo;
    	this.producto = producto;
    	this.presupuesto = presupuesto;
    }

    function producto(codigo,componente){
    	this.codigo = codigo;
    	this.componente = componente;
    }

    function fase(codigo,nombre,inicio,fin,responsable,actividad){
    	this.codigo = codigo;
    	this.inicio = inicio;
    	this.nombre = nombre;
    	this.fin = fin;
    	this.responsable = responsable;
    	this.actividad = actividad;
    }

    function llenarComponentes(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 18,
            "proyectoid": $("#proyectoGET").val()
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
                	componentes[index] = new componente(response[index].codigo); 
                }

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
            async: false,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var tabla = '';
                var combo = '';
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
            "opcion": 12,
            "proyectoid": $('#proyectoGET').val()
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/verProyectos.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var tabla = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                  	fases[index] = new fase(response[index].codigo,response[index].nombre,response[index].inicio,response[index].fin,response[index].responsable,response[index].actividad) 
                }
            },
            timeout: 4000
        });
    }

    function llenarProductos(){
        /*Parametros:
            id del proyecto
        */

        var datos = {
            "opcion": 23,
            "proyectoid": $('#proyectoGET').val()
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                var tabla = '';
                var combo = '';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++){
                	productos[index] = new producto(response[index].codigo, response[index].componenteId);
                }


            },
            timeout: 4000
        });
    }

    function llenarPlanOperativo(){
    	var contenido = "";
        var pasoComponentes= false;
        var pasoActividades = false;
    	for(var indexC = 0; indexC < componentes.length; indexC++){
            pasoComponentes= true;
    		contenido += '<tr>'+
                            '<td  style="text-align:center; background-color: #D2DAE8;">'+
                                componentes[indexC].codigo+
                            '</td>';
    		for(var indexP = 0; indexP < productos.length; indexP++){
    			if(productos[indexP].componente == componentes[indexC].codigo){
                    if(pasoComponentes){

                        contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+
                                        productos[indexP].codigo+
                                  '</td>';
                                  pasoComponentes = false;
                    }else{
                        contenido += '<td></td>'+'<td style="text-align:center; background-color: #D2DAE8;">'+
                                        productos[indexP].codigo+
                                  '</td>';   
                    }
	    			
	    			for(var indexA = 0; indexA < actividades.length; indexA++){
	    				if(actividades[indexA].producto == productos[indexP].codigo){
                                pasoActividades=true;
    	    					contenido +=  '<td style="text-align:center; background-color: #D2DAE8;">'+
    				                                actividades[indexA].codigo+
    				                            '</td>'+
    				                            '<td style="text-align:center; background-color: #D2DAE8;">'+actividades[indexA].presupuesto+'</td>';
		    				for(var indexF = 0; indexF < fases.length; indexF++){
		    					if(pasoActividades){
		    						if(fases[indexF].actividad == actividades[indexA].codigo){
		    							contenido += '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
			    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].inicio+'</td>'+
			    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].fin+'</td>'+
			    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].responsable+'</td>'+
			    							  '</tr>';
                                        pasoActividades=false;
		    						}
		    					}else{
		    						if(fases[indexF].actividad == actividades[indexA].codigo){
		    							contenido +=  '<tr>'+
			    										 '<td></td>'+
			    										 '<td></td>'+
			    										 '<td></td>'+
			    										 '<td></td>'+
			    										 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].nombre+'</td>'+
				    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].inicio+'</td>'+
				    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].fin+'</td>'+
				    									 '<td style="text-align:center; background-color: #D2DAE8;">'+fases[indexF].responsable+'</td>'+
				    							  	  '</tr>';
		    						}
		    					}
			    			}
	    				}
	    			}
    			}	
    		}
    	}
    	$("#planOperativo").html(contenido);
    }
});