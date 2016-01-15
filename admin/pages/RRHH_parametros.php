<!DOCTYPE html>
<link rel="stylesheet" href="../css/RRHH_menuContextual2.css">
<html lang="en">
    <head>
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Ver Proyectos</title>
        <style>
        .panel-body {
  padding: 20px;
  background-color: #EBEBEB;
}
.tab-content {
  background-color: #E4E7EA;
}
.panel-default > .panel-heading{
    /*background-color: #13bf77;*/
    background-color: #13bf77;
}
.panel-title{
    color: white;
    text-align: center;
    
}
a{
    color: #13bf77;

}
h3{
    color: #13bf77;
}
.ckbox, .rdio {
  margin-left: 20%;
}

.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus{
    background-color: #13bf77;
}

        </style>
    </head>
    <body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

        <section>
            <?php include('menuContextual.php'); ?>
            <div class="mainpanel">
                <?php include('header.php'); ?>
                <div class="pageheader">
                    <h2><i class="fa fa-home"></i>Parametros <span></span></h2>
                    <!-- Migas de pan -->
                    <div class="breadcrumb-wrapper">
                        <span class="label">Usted esta Aqui:</span>
                        <ol class="breadcrumb">
                            <li><a href="RRHH_parametros.php">Recursos Humanos</a></li>
                            <li class="">Parametros</li>
                            <li class="active">Estructura Organizacional</li>
                        </ol>
                    </div>
                </div>

                <div class="contentpanel">
                    <div id="wrapper" class="toggled-2">
                        <div id="sidebar-wrapper">
                            <ul class="sidebar-nav nav-pills nav-stacked   bb" id="menuParametros">
                                <li><h4 href=""><strong>Parametros</strong></h4></li>
                                <li class = "active"><a  href="#dtab1" data-toggle="tab"><span class="fa-stack fa-lg pull-left"><i    class="fa fa-database fa-stack-1x "></i></span>Estructura Organizacional</a>
                                <li><a class = "" href="#dtab2" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-usd fa-stack-1x "></i></span>Tipos de Contratos</a>
                                <li><a class = "" href="#dtab3" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-building-o fa-stack-1x "></i></span>Jornada de trabajo</a>
                                <li><a class = "" href="#dtab4" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-coffee fa-stack-1x "></i></span>Vacaciones</a>
                                <li><a class = "" href="#dtab5" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-male fa-stack-1x "></i></span>Seguro Social</a>
                                <li><a class = "" href="#dtab6" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-bank fa-stack-1x "></i></span>IISR de Persona Natural</a>
                                <li><a class = "" href="#dtab7" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-bank fa-stack-1x "></i></span>INFOP</a>
                                <li><a class = "" href="#dtab8" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-bank fa-stack-1x "></i></span>RAP</a>
                                <li><a class = "" href="#dtab9" data-toggle="tab" ><span class="fa-stack fa-lg pull-left"><i    class="fa fa-bank fa-stack-1x "></i></span>ISR Honorarios</a>
                                </li>
                            </ul> 
                        </div><!-- side-wrapper -->
                        <div id="page-content-wrapper" style=" min-height: inherit;">
                            <div id="tabContenido" class="tab-content">
                                <div class="tab-pane active" id="dtab1">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h3 class="panel-title">Estructura Organizacional</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionesnivel"></div>
                                            <div class="row" style = "border-bottom: 1px solid #13bf77; ">
                                                <div class="col-md-12" style "">
                                                        
                                                        <h3>NIVEL DIRECTIVO</h3>
                                                        <table align="center" class="table table-bordered mb30" width="600px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center; background-color: #77c988;" width="15%">Código</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Nombre del Puesto</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_directivos">
                                                               <tr>
                                                                   <th style="text-align:center; background-color: #c9e2dc;">Còdigo</th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;">asdf<span class=" pull-right glyphicon glyphicon-user "></span></th>
                                                               </tr>
                                                            </tbody>
                                                        </table>
                                                        <a style ="" role = "button" id="agregarDirectivo" ><i class = " glyphicon-plus"></i>Agregar Nuevo</a>
                                                        <div class="" style ="margin-bottom : 10px;"></div>
                                                    </div>
                                                
                                            </div>
                                            <div class="row" style = "border-bottom: 1px solid #13bf77; ">
                                                <div class="col-md-12" style "">
                                                        
                                                        <h3>NIVEL EJECUTIVO</h3>
                                                        <table align="center" class="table table-bordered mb30" width="600px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center; background-color: #77c988;" width="15%">Código</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Nombre del Puesto</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_ejecutivos">
                                                               <tr>
                                                                   <th style="text-align:center; background-color: #c9e2dc;">asdf<span class=" pull-right glyphicon glyphicon-user "></span></th>
                                                                   
                                                               </tr>
                                                            </tbody>
                                                        </table>
                                                        <a style ="" role = "button" id="agregarEjecutivo" href="#"><i class = " glyphicon-plus pull-right " style = "  "></i>Agregar Nuevo</a>
                                                        <div class="" style ="margin-bottom : 10px;"></div>
                                                    </div>
                                                
                                            </div>
                                            <div class="row" style = "border-bottom: 1px solid #13bf77; ">
                                                <div class="col-md-12" style "">
                                                        
                                                        <h3>NIVEL TÉCNICO</h3>
                                                        <table align="center" class="table table-bordered mb30" width="600px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center; background-color: #77c988;" width="15%">Código</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Nombre del Puesto</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_tecnicos">
                                                               
                                                            </tbody>
                                                        </table>
                                                        
                                                        <a style ="" role = "button" id="agregarTecnico" href="#"><i class = " glyphicon-plus"></i>Agregar Nuevo</a>
                                                        <div class="" style ="margin-bottom : 10px;"></div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab2">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Tipos de Contratos</h4>
                                        </div>
                                        <div class="panel-body">
                                            <form action="" class = "form form-bordered">
                                                
                                            <div id="notificacionTipoContrato"></div>
                                            <div id = "divContratos">
                                                
                                                
                                            </div>
                                            <a style="  margin-left: 46%;" role="button" id="agregarTipoContrato" href="#"><i class=" glyphicon-plus"></i>Agregar Nuevo</a>
                                           
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab3">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Jornada de Trabajo  y Porcentaje de Recargo</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionJornada"></div>
                                            <div  class = ""id = "divContratos">
                                                <form action="" class = "form" id ="form_jornadaTrabajo">
                                                    <div class="" style = "margin-bottom: 15px;" >
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Diurna:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "diurnaHoras"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">horas</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Porcentaje de Recargo</label>
                                                                    <div class="col-sm-3">
                                                                    <input id = "recargoDiurno"type="text" placeholder="" class="form-control input-sm">
                                                                    </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Mixto:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "Mixtohoras"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">horas</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Porcentaje de Recargo</label>
                                                                    <div class="col-sm-3">
                                                                    <input id = "recargoMixto"type="text" placeholder="" class="form-control input-sm">
                                                                    </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                        
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Nocturno:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "nocturnohoras"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">horas</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Porcentaje de Recargo</label>
                                                                    <div class="col-sm-3">
                                                                    <input id = "recargoNocturno"type="text" placeholder="" class="form-control input-sm">
                                                                    </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 46%;" role="button" id="guardar_jornada" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab4">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Vacaciones</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionVacaciones"></div>
                                            <div id = "divContratos">
                                                <form action="" class = "form form-bordered" id ="form_vacaciones">
                                                    <div class="container" style = "margin-bottom: 15px;" >
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6 col-md-offset-3" >
                                                                    <label class="col-sm-4 control-label">Un año:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "vacaciones_unAnio"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">dias</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                                    <label class="col-sm-4 control-label">1 a 2 años:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "vaca_1a2"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">dias</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                        
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                                    <label class="col-sm-4 control-label">2 a 3 años:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "vaca2a3"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">dias</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                        
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                                    <label class="col-sm-4 control-label">4 en adelante:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "vaca4"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">dias</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                        
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                                    <label class="col-sm-4 control-label">Tiempo maximo de acumular vacaciones:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "tiempoMaxi"type="text" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">dias</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 35%;" role="button" id="guardar_vacaciones" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab5">
                                     <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Instituto Hondureño de Seguridad Social (IHSS)</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionSeguro"></div>
                                            <div id = "divContratos">
                                                <form action="" class = "form form-bordered" id ="form_seguro">
                                                    <div class="container" style = "margin-bottom: 15px;" >
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-7 col-md-offset-2" >
                                                                    <label class="col-sm-5 control-label">Salario Minimo:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "salarioMinimo"type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">Lps</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                                                    <label class="col-sm-4 control-label">Nùmero de Empleados:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "numeroEmpleados" type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">empleados(que corresponda rama economica 10).</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                        
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label class="col-sm-4 control-label">Empleado:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "porcentajeEmpleado" type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                                <div class="col-xs-12 col-md-5">
                                                                    <label class="col-sm-4 control-label">Patrono:</label>
                                                                    <div class="col-sm-3">
                                                                    <input id = "porcentajePatrono" type="num" placeholder="" class="form-control input-sm">
                                                                    </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 35%;" role="button" id="guardarSeguro" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab6">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Impuesto Sobre la Renta (ISR) para persona natural </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionInfop"></div>
                                            <div class="row" style = "border-bottom: 1px solid #13bf77; ">
                                                <div class="col-md-8 col-md-offset-2" style "">
                                                        
                                                        <h4>Tarifa del impuesto sobre la renta</h4>
                                                        <table align="center" class="table table-bordered mb30" width="600px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center; background-color: #77c988;" width="15%">No</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Desde</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Hasta</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Gastos Mèdicos</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Total Exento</th>
                                                                    <th style="text-align:center; background-color: #77c988;">Tasa</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_tarifaISV">
                                                               <tr>
                                                                   <th style="text-align:center; background-color: #c9e2dc;">0</th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;"></th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;"></th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;"></th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;"></th>
                                                                   <th style="text-align:center; background-color: #c9e2dc;"></th>
                                                               </tr>
                                                              
                                                            </tbody>
                                                        </table>
                                                        <!-- <button class="btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 46%;" role="button" id="guardar_jornada" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>                                                         -->
                                                        <div class="" style ="margin-bottom : 10px;"></div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab7">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">INFOP</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionInfop"></div>
                                            <div id = "divContratos">
                                                <form action="" class = "form form-bordered" id ="form_INFOP">
                                                    <div class="container" style = "margin-bottom: 15px;" >
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-7 col-md-offset-2" >
                                                                    <label class="col-sm-5 control-label">Porcentaje de Valor Bruto de la Planilla:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "porcenValorPlanilla" type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 35%;" role="button" id="guardarINFOP" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab8">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Regimen de Aportaciones Privadas (RAP) </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionInfop"></div>
                                            <div id = "divContratos">
                                                <form action="" class = "form form-bordered" id ="form_INFOP">
                                                    <div class="container" style = "margin-bottom: 15px;" >
                                                        
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 35%;" role="button" id="guardarINFOP" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="dtab9">
                                    <div class="panel panel-default" class = "" style="  background-color:  rgb(237, 236, 240); height: 270px;">
                                        <div class="panel-heading panel_RRHH" id = "">
                                            <h4 class="panel-title">Impuesto Sobre la Renta por Honorarios Profesionales</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div id="notificacionISV"></div>
                                            <div id = "divContratos">
                                                <form action="" class = "form form-bordered" id ="form_ISV">
                                                    <div class="container" style = "margin-bottom: 15px;" >
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-7 col-md-offset-2" >
                                                                    <label class="col-sm-5 control-label">Tasa para nacionales:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "isv_tasaNacional" type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-1 " style "">
                                                            <div class="form-group" style = "border-bottom: 1px solid #13bf77;">
                                                                <div class="col-xs-12 col-md-7 col-md-offset-2" >
                                                                    <label class="col-sm-5 control-label">Tasa para extranjeros:</label>
                                                                     <div class="col-sm-3">
                                                                     <input id = "isv_tasaExtranjeros" type="num" placeholder="" class="form-control input-sm">
                                                                     </div>
                                                                    <label class="col-sm-4 control-label">%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class = "btn btn-default" style=" color : white;  background-color : #13bf77; margin-left: 35%;" role="button" id="guardarISV" href="#"><i class=" glyphicon-plus"></i>Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>


                        </div><!-- page-content-wrapper -->
                    </div><!-- wrapper -->
                </div> <!-- contentpanel -->
            </div><!-- mainpanel -->

            <div class="rightpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#rp-alluser" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                    <li><a href="#rp-favorites" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#rp-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                    <li><a href="#rp-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
                </ul>

                <!-- Tab panes -->
                
            </div><!-- rightpanel -->

            <!-- ========================================================================================================== -->

        <!-- ============================================MODALES============================================================= -->
            <!-- Modal para agregar Puesto Nivel Directivo -->
                <div  class="modal fade" id="modalAgregarDirectivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formAgregarDirectivo" name="form_insertar" action="#" class = "form-horizontal form-bordered">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Puesto Directivo</h4>
                                </div>
                                <div class = "modal-body">
                                    
                                        <input id = "nivel" type="text" class = "hidden" value = 1 >
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" style = "  margin-top: 12px;">Codigo</label>
                                          <div class="col-sm-3">
                                            <input id = "DirectivoCod" type="text" placeholder="codigo" class="form-control">
                                          </div>
                                          <label class="col-sm-3 control-label" style = "  margin-top: 12px;">Nombre Puesto</label>
                                          <div class="col-sm-4">
                                            <input id = "DirectivoPuesto"type="text" placeholder="Puesto" class="form-control">
                                          </div>
                                         
                                        </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="" class="btn btn-success" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- Modal para agregar Puesto Nivel Ejecutivo -->
                <div  class="modal fade" id="modalAgregarEjecutivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formAgregarEjecutivo" name="form_insertar" action="#" class = "form-horizontal form-bordered">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Puesto Ejectivo</h4>
                                </div>
                                <div class = "modal-body">
                                    
                                        <input id = "nivelEjecutivo" type="text" class = "hidden" value = 2 >
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" style = "  margin-top: 12px;">Codigo</label>
                                          <div class="col-sm-3">
                                            <input id = "EjecutivoCod" type="text" placeholder="codigo" class="form-control">
                                          </div>
                                          <label class="col-sm-3 control-label" style = "  margin-top: 12px;">Nombre Puesto</label>
                                          <div class="col-sm-4">
                                            <input id = "EjecutivoPuesto"type="text" placeholder=".col-sm-3" class="form-control">
                                          </div>
                                         
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarEmpleado" class="btn btn-success" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- Modal para agregar Puesto Nivel Tecnico -->
                <div  class="modal fade" id="modalAgregarTecnico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formAgregarTecnico" name="form_insertar" action="#" class = "form-horizontal form-bordered">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Puesto Tecnico</h4>
                                </div>
                                <div class = "modal-body">
                                        <input id = "nivelTecnico" type="text" class = "hidden" value = 3 >
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" style = "  margin-top: 12px;">Codigo</label>
                                          <div class="col-sm-3">
                                            <input id = "TecnicoCod" type="text" placeholder="codigo" class="form-control">
                                          </div>
                                          <label class="col-sm-3 control-label" style = "  margin-top: 12px;">Nombre Puesto</label>
                                          <div class="col-sm-4">
                                            <input id = "TecnicoPuesto" type="text" placeholder=".col-sm-3" class="form-control">
                                          </div>
                                         
                                        </div>
                              
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarEmpleado" class="btn btn-success" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- Modal para agregar Tipos de contratos -->
                <div  class="modal fade" id="modalAgregarTipoContrato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="form_tipoContrato" name="form_insertar" action="#" class = "form-horizontal ">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Tipo de Contrato</h4>
                                </div>
                                <div class = "modal-body">
                                        <input id = "nivelTecnico" type="text" class = "hidden" value = 3 >
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">Tipo Contrato</label>
                                          <div class="col-sm-6">
                                            <input id= "txt_tipoContrato" type="text" placeholder="Ingrese Tipo de Contrato" class="form-control">
                                          </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarTipoContrato" class="btn btn-success" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </section>
        <?php include('footer.php'); ?>
        <script src="../js/RRHH_parametros.js"></script>
        
    </body>
</html>
