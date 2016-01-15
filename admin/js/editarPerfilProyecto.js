jQuery(document).ready(function(){

    obtenerProyecto();
    llenarZona();
    llenarSectorEconomico();
    llenarSectorInstitucional();
    llenarEjeEstrategico();
    llenarAreasFocalizacion();

    jQuery(".select2").select2({
        width: '100%'
    });

    jQuery('#fechaInicio').datepicker({
        dateFormat: "yy-mm-dd"
    });
    jQuery('#fechaFin').datepicker({
        dateFormat: "yy-mm-dd"
    });

            /*Mostrar y ocultar divs*/
    $("#objetivo").click(function(){
        $('#divBeneficiarios').show(1000);  
    });

    $("#beneficiarios").click(function(){
        $('#divSectorInstitucional').show(1000);    
    });

    $("#sectorInstitucionalCombo").click(function(){
        $('#divSectorEconomico').show(1000);    
    });

    $("#sectorEconomicoCombo").click(function(){
        $('#divEjeEstrategico').show(1000); 
    });

    $("#ejeEstrategicoCombo").click(function(){
        $('#divAreasFocalizacion').show(1000);  
    });
    function llenarZona(){
        var datos = {"opcion": 0};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                  
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                  
                $("#zonasCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarSectorEconomico(){
        var datos = {"opcion": 2};

        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){

                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)

                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#sectorEconomicoCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarSectorInstitucional(){
        var datos = {"opcion": 3};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
 
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#sectorInstitucionalCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarEjeEstrategico(){
        var datos = {"opcion": 1};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#ejeEstrategicoCombo").html(combo);
            },
            timeout: 4000
        });
    }

    function llenarAreasFocalizacion(){
        var datos = {"opcion": 7};
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                
                var combo = '<option></option>';
                var response = JSON.parse(data);
                for(var index = 0; index < response.length; index++)
                    combo += "<option  selected value='"  + response[index].codigo + "'>" + response[index].nombre + "</option>";
                $("#areasFocalizacionCombo").html(combo);
            },
            timeout: 4000
        });
    }

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
                $('#nombreProyecto').val(response[1].nombre);
                $('#zonasCombo').val(response[1].zona);
                $('#descripcion').val(response[1].descripcion);
                $('#fechaInicio').val(response[1].inicio);
                $('#fechaFin').val(response[1].fin);
                $('#objetivo').val(response[1].objetivo);
                $('#beneficiarios').val(response[1].beneficiarios);
                $('#sectorEconomicoCombo').val(response[1].institucional);
                $('#sectorInstitucionalCombo').val(response[1].economico);
                $('#ejeEstrategicoCombo').val(response[1].eje);
                $('#areasFocalizacionCombo').val(response[1].area);
            },
            timeout: 4000
        });
	}

    $(document).on("click",".guardar",function () {
        var respuesta = confirm("¿Esta seguro de los datos que desea modificar?");
        if(respuesta){
            editarProyectoInformacion();
        }
    });

    function editarProyectoInformacion(){

        var datos = {
            "opcion": 13,
            "numeroProyecto": $("#codigoGET").val(),
            "nombreProyecto": $("#nombreProyecto").val(),
            "descripcion": $("#descripcion").val(),
            "zona": $('#zonasCombo').val(),
            "fechaInicio": $("#fechaInicio").val(),
            "fechaFin": $("#fechaFin").val(),
            "objetivo": $("#objetivo").val(),
            "beneficiarios": $("#beneficiarios").val(),
            "sectorEconomico": $("#sectorEconomicoCombo").val(),
            "sectorInstitucional": $("#sectorInstitucionalCombo").val(),
            "ejeEstrategico": $("#ejeEstrategicoCombo").val(),
            "areasFocalizacion": $("#areasFocalizacionCombo").val(),
            "proyectoid": $("#proyectoGET").val()
            };
        $.ajax({
            async: true,
            type: "POST",
            url: "../class/registrarProyecto.php",
            data: datos,
            dataType: "html",
            success: function(data){
                window.location="verPerfilProyecto.php?C="+$("#proyectoGET").val()+"&N="+$("#nombreProyecto").val()+"&CI="+$("#codigoGET").val();
            },
            timeout: 4000
        });
    }
});