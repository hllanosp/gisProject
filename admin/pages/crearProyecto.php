<!DOCTYPE html>
<link rel="stylesheet" href="../css/crearProyecto.css">
<html lang="en">
    <head>
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Crear Proyecto</title>
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
                    <h2><i class="fa fa-home"></i>Gestión de proyectos <span></span></h2>
                    <!-- Migas de pan -->
                    <div class="breadcrumb-wrapper">
                        <span class="label">Usted esta Aqui:</span>
                        <ol class="breadcrumb">
                            <li><a href="pantalla_principal.php">Pantalla Principal</a></li>
                            <li class="active">Gestión de Proyectos</li>
                            <li class="active">Crear Proyecto</li>
                        </ol>
                    </div>
                </div>
                <!-- Contenido geberala de la pagina -->
                <div class="contentpanel">
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div style="margin-bottom:0;" class="panel panel-default">
                                <div id="perfilProyecto" class="panel-heading">
                                  <h3 id="panelheadding" class="panel-title">Fase 1 - Perfil del proyecto</h3>
                                </div>
                                <div class="panel-body">
                                  Descripción
                                </div>
                                
                            </div><!-- panel -->
                        </div>
                        <div class=" col-md-6">
                            <div style="margin-bottom:0;" class="panel panel-default">
                                <div id="planOperativo" class="panel-heading">
                                  <h3 id="panelheadding" class="panel-title">Fase 2 - Plan operativo del proyecto</h3>
                                </div>
                                <div class="panel-body">
                                   Descripción
                                </div>
                            </div><!-- panel -->
                        </div>
                        <div id="tabsRow" class="row col-md-12">
                            <div id="validationWizard" class="basic-wizard">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul id="ultabs" class="nav nav-pills nav-justified">
                                          <li><a href="#dtab1" data-toggle="tab"> Crear</a></li>
                                          <li><a href="#dtab2" data-toggle="tab"> Equipo</a></li>
                                          <li><a href="#dtab3" data-toggle="tab"> Presupuesto Global</a></li>
                                          <li><a href="#dtab4" data-toggle="tab"> Componentes </a></li>
                                          <li><a href="#dtab5" data-toggle="tab"> Productos </a></li>
                                          <li><a href="#dtab6" data-toggle="tab"> Actividades</a></li>
                                          <li><a href="#dtab7" data-toggle="tab"> Fases</a></li>
                                          <li><a href="#dtab8" data-toggle="tab"> Presupuestos</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="tabContente" class="tab-content">

                                    <div class="tab-pane" id="dtab1">
                                        <form action="" id ="formInformacion" class="form-horizontal">
                                            <div class="col-md-2"></div>
                                            <br>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Numero de Proyecto: </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="numero" placeholder="Numero de proyecto" id="numeroProyecto" class="form-control" required/>
                                              </div>
                                            </div>                                                
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Nombre de Proyecto: </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="nombre" placeholder="Nombre del Proyecto" id="nombreProyecto" class="form-control" required/>
                                              </div>
                                            </div>                                                       
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Locación del proyecto: </label>
                                              <div class="col-sm-6">
                                                <select name="zonas" class="form-control" id="zonasCombo" >
                                                    <!-- Seccion para cargar la lista de locaciones almacenadas -->
                                                </select>
                                              </div>
                                            </div>  
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Descripción: </label>
                                              <div class="col-sm-6">
                                                <textarea id="descripcion" name="descripcion" class="form-control" name="objetivo" required ></textarea>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Duración del proyecto:</label>
                                              <div class="input-group col-md-6 mb15">
                                                
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    <input name="inicio" type="text" placeholder="Fecha de Inicio" id="fechaInicio" class="form-control" required/>
                                                
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    <input name="fin" type="text" placeholder="Fecha de Finalización" id="fechaFin" class="form-control" required/>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Objetivo del Proyecto: </label>
                                              <div class="col-sm-6">
                                                <textarea id="objetivo" class="form-control" name="objetivo" required></textarea>
                                              </div>
                                            </div> 
                                            <div  style="display:none;"class="form-group" id="divBeneficiarios">
                                              <label class="col-sm-3 control-label">Beneficiarios: </label>
                                              <div class="col-sm-6">
                                                <textarea id="beneficiarios" class="form-control" name="beneficiario"></textarea>
                                              </div>
                                            </div> 
                                            <div style="display:none;" class="form-group" id="divSectorInstitucional">
                                              <label class="col-sm-3 control-label">Sector Institucional: </label>
                                              <div class="col-sm-6">
                                                <select name="institucional" class="form-control" id="sectorInstitucionalCombo" >
                                                    <!-- Seccion para cargar la lista de sectores institucionales almacenadas -->
                                                </select>
                                              </div>
                                            </div>
                                            <div style="display:none;" class="form-group" id="divSectorEconomico">
                                              <label class="col-sm-3 control-label">Sector Económico: </label>
                                              <div class="col-sm-6">
                                                <select name="economico" class="form-control" id="sectorEconomicoCombo" >
                                                    <!-- Seccion para cargar la lista de sectores economicos almacenadas -->
                                                </select>
                                              </div>
                                            </div>
                                            <div style="display:none;" class="form-group" id="divEjeEstrategico">
                                              <label class="col-sm-3 control-label">Eje Estrategico: </label>
                                              <div class="col-sm-6">
                                                <select name="eje" class="form-control" id="ejeEstrategicoCombo" >
                                                    <!-- Seccion para cargar la lista de ejes almacenadas -->
                                                </select>
                                              </div>
                                            </div>
                                            <div style="display:none;" class="form-group" id="divAreasFocalizacion">
                                              <label class="col-sm-3 control-label">Areas de Focalización: </label>
                                              <div class="col-sm-6">
                                                <select name="areas" class="form-control" id="areasFocalizacionCombo">
                                                    <!-- Seccion para cargar la lista de areas de focalizacion almacenadas -->
                                                </select>
                                              </div>
                                            </div>   
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="dtab2">      
                                        
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            
                                            <form id="formEquipo">
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">* Director del proyecto: </label>
                                                    <div class="col-sm-5">
                                                        <select id="directorProyectoCombo"  name="directorProyectoCombo" class="select2" data-placeholder="Seleccione un Empleado..." required>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">* Administrador</label>
                                                    <div class="col-sm-5">
                                                        <select id="administradorProyectoCombo"  name="administradorProyectoCombo" class="select2" data-placeholder="Seleccione un Empleado..." required>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                            </form>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                            <div id="notificaciones"></div>
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="15%">Codigo</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Rol</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Nombre</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="empleadosExtras">
                                                    
                                                </tbody>
                                            </table>
                                            <a class="agregarMasEquipo" href="#">Agregar mas equipo</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dtab3">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                            <br>
                                            <form id="formPresupuesto">
                                                <table border="0" width="810px">
                                                    <tr>
                                                        <td style="background-color: rgb(186, 200, 226);" width="25%" align="center">
                                                            Línea:
                                                        </td>
                                                        <td width="50%">
                                                           <input type="text" name="lineaPresupuesto" placeholder="Línea del presupuesto del proyecto" id="lineaPresupuesto" class="form-control" required/> 
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <br>
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th  style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Numero de Cooperante</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Cooperante</th>
                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Moneda</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ctablaPresupuesto">
                                                    
                                                </tbody>
                                            </table>
                                            <a class="agregarMascooperantes" href="#">Agregar más cooperantes</a>
                                            <br>
                                            <br>
                                            <div id="notificaciones1"></div>
                                            <table border="0" width="810px">
                                                <tr>
                                                    <td style="padding-right:15px; background-color: rgb(186, 200, 226);" width="75%" align="right">
                                                        Monto total :
                                                    </td>
                                                    <td width="25%">
                                                       <input type="text" name="montoTotal" id="montoTotal" readonly/> 
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dtab4">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                            <br>
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Codigo del sistema</th>                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Componente</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cTablaComponente">
                                                </tbody>
                                            </table>
                                            <div id="notificaciones2" class="col-md-12"></div>
                                            <a class="agregarMasComponente" href="#">Agregar más componentes</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dtab5">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-9">
                                            <br>
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Codigo del sistema</th>
                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Descripción</th>
                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Componente</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cTablaProducto">
                                                    
                                                </tbody>
                                            </table>
                                            <a class="agregarMasProductos" href="#">Agregar más productos</a>
                                            <div id="notificaciones3"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dtab6">
                                        <br>
                                        <table align="center" class="table table-bordered mb30" width="600px">
                                            <thead >
                                                <tr >
                                                    <th style="text-align:center; background-color: rgb(186, 200, 226);" width="15%">Codigo del sistema</th>
                                                    <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="35%">Descripción de la actividad</th>
                                                    <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Componente</th>
                                                    <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Producto</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cTablaActividades">
                                                
                                            </tbody>
                                        </table>
                                        <a class="agregarMasActividades" href="#">Agregar más Actividades</a>
                                        <div id="notificaciones4"></div>
                                    </div>
                                    <div class="tab-pane" id="dtab7">
                                        <br>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 mb20">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                  <div class="panel-btns">
                                                    <a href="" class="minimize">&minus;</a>
                                                  </div>
                                                  <h4 class="panel-title">Fases por actividad</h4>
                                                </div>
                                                <div class="panel-body panel-body-nopadding">
                                                    <div id="basicWizard" class="basic-wizard">
                                                        <ul id="ultabs" class="nav1 nav-tabs nav-justified">
                                                          <li style="text-align:center; background-color: rgb(186, 200, 226);" ><a href="#dtab71" data-toggle="tab">Crear Fases</a></li>
                                                          <li style="text-align:center; background-color: rgb(186, 200, 226);" ><a href="#dtab72" data-toggle="tab">Programacion de fases</a></li>
                                                          <li style="text-align:center; background-color: rgb(186, 200, 226);" ><a href="#dtab73" data-toggle="tab">Asignar Responsable</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane" id="dtab71">
                                                                <br>
                                                                <div class="col-md-3">
                                                                    <table class="table table-bordered mb30">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);">Actividad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="actividadesCrearFasesProyectosCombo" class="select2" data-placeholder="Seleccione una actividad..." required>
                                                                                        <option value=""></option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <table align="center" class="table table-bordered mb30" width="600px">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Fases</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Descripción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="cTablaFasesActividad">
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                    <a class="agregarMasFases" href="#">Agregar más Fases</a>
                                                                    <div id="notificaciones5"></div>
                                                                </div>            
                                                            </div>
                                                            <div class="tab-pane" id="dtab72">
                                                                <br>
                                                                <div class="col-md-3">
                                                                    <table class="table table-bordered mb30">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);">Actividad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="actividadesProgramacionFasesProyectosCombo" class="select2" data-placeholder="Seleccione una actividad..." required>
                                                                                        <option value=""></option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <div class="col-md-9">
                                                                    <table align="center" class="table table-bordered mb30" width="600px">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Fases</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Fecha Inicio</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Facha Fín</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Programación</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="cTablaProgramacionFasesActividad">    
                                                                        </tbody>
                                                                        <div id="notificaciones6"></div>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="dtab73">
                                                                <br>
                                                                <div class="col-md-3">
                                                                    <table class="table table-bordered mb30">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);">Actividad</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="actividadesFasesResponsablesProyectosCombo" class="select2" data-placeholder="Seleccione una actividad..." required>
                                                                                        <option value=""></option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <div class="col-md-9">
                                                                    <table align="center" class="table table-bordered mb30" width="600px">
                                                                        <thead >
                                                                            <tr >
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Fases</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Responsable</th>
                                                                                <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Asignar Responsable</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="ResponsableFasesActividad">    
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                          
                                                        </div><!-- tab-content -->
                                                    </div>
                                                </div><!-- #disabledTabWizard -->
                                            </div><!-- panel-body -->
                                        </div><!-- panel -->
                                    <div class="col-md-1"></div>
                                    </div>
                                    <div class="tab-pane" id="dtab8">
                                        <br>
                                        <div class="col-md-3">
                                            <table class="table table-bordered mb30">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Actividad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select id="actividadesPresupuestoProyectosCombo" class="select2" data-placeholder="Seleccione una actividad..." required>
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-9">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Codigo cooperante</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Cooperante</th>
                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Moneda</th>
                                                        <th style=" text-align:center;background-color: rgb(186, 200, 226);" width="25%">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                            <table border="0" width="890px">
                                                <tr>

                                                    <td style="padding-right:15px; background-color: rgb(186, 200, 226);" width="75%" align="right">
                                                        Presupuesto de <span id="nombreActividad"></span>-  Monto total :
                                                    </td>
                                                    <td width="25%">
                                                       <input type="text" name="montoTotalActividad" id="montoTotal" readonly/> 
                                                    </td>
                                                </tr>
                                            </table>
                                            <a class="asignarPresupuesto" href="#">Asignar Presupuesto</a>
                                        </div>
                                    </div>

                                </div>
                                <ul id="pager" class="pager wizard">
                                    <li class="previous"><a href="javascript:void(0)">Anterior</a></li>
                                    <li class="next"><a href="javascript:void(0)">Siguiente</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                <div class="tab-content">
                    <div class="tab-pane active" id="rp-alluser">
                        <h5 class="sidebartitle">Online Users</h5>
                        <ul class="chatuserlist">
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/userprofile.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Eileen Sideways</strong>
                                        <small>Los Angeles, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user1.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <span class="pull-right badge badge-danger">2</span>
                                        <strong>Zaham Sindilmaca</strong>
                                        <small>San Francisco, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user2.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <small>Bangkok, Thailand</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user3.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Renov Leongal</strong>
                                        <small>Cebu City, Philippines</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user4.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong>
                                        <small>Tokyo, Japan</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                        </ul>

                        <div class="mb30"></div>

                        <h5 class="sidebartitle">Offline Users</h5>
                        <ul class="chatuserlist">
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user5.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Eileen Sideways</strong>
                                        <small>Los Angeles, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user2.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Zaham Sindilmaca</strong>
                                        <small>San Francisco, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user3.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <small>Bangkok, Thailand</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user4.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Renov Leongal</strong>
                                        <small>Cebu City, Philippines</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user5.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong>
                                        <small>Tokyo, Japan</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user4.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Renov Leongal</strong>
                                        <small>Cebu City, Philippines</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user5.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong>
                                        <small>Tokyo, Japan</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="rp-favorites">
                        <h5 class="sidebartitle">Favorites</h5>
                        <ul class="chatuserlist">
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user2.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Eileen Sideways</strong>
                                        <small>Los Angeles, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user1.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Zaham Sindilmaca</strong>
                                        <small>San Francisco, CA</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user3.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <small>Bangkok, Thailand</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user4.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Renov Leongal</strong>
                                        <small>Cebu City, Philippines</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user5.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong>
                                        <small>Tokyo, Japan</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="rp-history">
                        <h5 class="sidebartitle">History</h5>
                        <ul class="chatuserlist">
                            <li class="online">
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user4.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Eileen Sideways</strong>
                                        <small>Hi hello, ctc?... would you mind if I go to your...</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user2.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Zaham Sindilmaca</strong>
                                        <small>This is to inform you that your product that we...</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                            <li>
                                <div class="media">
                                    <a href="#" class="pull-left media-thumb">
                                        <img alt="" src="images/photos/user3.png" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <small>Are you willing to have a long term relat...</small>
                                    </div>
                                </div><!-- media -->
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane pane-settings" id="rp-settings">

                        <h5 class="sidebartitle mb20">Settings</h5>
                        <div class="form-group">
                            <label class="col-xs-8 control-label">Show Offline Users</label>
                            <div class="col-xs-4 control-label">
                                <div class="toggle toggle-success"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-8 control-label">Enable History</label>
                            <div class="col-xs-4 control-label">
                                <div class="toggle toggle-success"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-8 control-label">Show Full Name</label>
                            <div class="col-xs-4 control-label">
                                <div class="toggle-chat1 toggle-success"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-8 control-label">Show Location</label>
                            <div class="col-xs-4 control-label">
                                <div class="toggle toggle-success"></div>
                            </div>
                        </div>

                    </div><!-- tab-pane -->

                </div><!-- tab-content -->
            </div><!-- rightpanel -->
            <!-- Modal para agregar equipo  -->
                <div  class="modal fade" id="modalAgregarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formEquipoModal" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Participante</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select id ="cargosCombo" class="select2" data-placeholder="Seleccione un cargo...">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="empleadosEquipoCombo" class="select2" data-placeholder="Seleccione un Empleado..." required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarEmpleado" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Modal para agregar cooperantes  -->
                <div  class="modal fade" id="modalAgregarCooperante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formCooperantesModal" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Cooperante</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Tipo de Fondo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select id="tipoFondo" class="select2" data-placeholder="Seleccione una actividad...">
                                                                <option value="1">Fondos propios</option>
                                                                <option value="2">Cooperante Nacional</option>
                                                                <option value="3">Cooperante</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="div1" class="col-md-12">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Moneda</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select id="monedaCombo" class="select2" data-placeholder="Seleccione una moneda...">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="montoModal" placeholder="Monto" id="montoModal" class="form-control"/>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="div2" class="col-md-12" style="display:none;">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Moneda</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Cooperante Nacional</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select id="monedaNacionalCombo" class="select2" data-placeholder="Seleccione una moneda...">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id ="nuevoCooperanteNacionalCombo" class="select2" data-placeholder="Seleccione un cooperante...">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="montoModal" placeholder="Monto" id="montoNacionalModal" class="form-control"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="div3" class="col-md-12" style="display:none;">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead >
                                                    <tr >
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Moneda</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Cooperante</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr>
                                                        <td>
                                                            <select id="monedaCooperanteCombo" class="select2" data-placeholder="Seleccione una moneda...">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id ="nuevoCooperanteCombo" class="select2" data-placeholder="Seleccione un cooperante...">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="montoModal" placeholder="Monto" id="montoCooperanteModal" class="form-control"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                              
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarCooperante" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <!-- Modal para agregar componentes  -->
                <div  class="modal fade" id="modalAgregarComponentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formComponentes" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Componente</h4>
                                </div>
                                <div class = "modal-body">                                   
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <textarea type="text" name="componenteDescripcion" placeholder="descripción del componente" id="componenteDescripcion" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>                                 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarComponente" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <!-- Modal para agregar Productos  -->
                <div  class="modal fade" id="modalAgregarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formProductos" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Productos</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div>
                                                <textarea type="text" name="productoDescripcion" placeholder="descripcion del del producto" id="productoDescripcion" class="form-control" required></textarea>
                                            </div>
                                            <br>
                                            <div>
                                                <select id="componentesProyectoCombo" class="select2" data-placeholder="Seleccione un Componente..." required>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarProductos" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                  <!-- Modal para agregar Productos  -->
                <div  class="modal fade" id="modalAgregarActividades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formActividades" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Actividades</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br>
                                            <div>
                                                <input type ="text" placeholder="Introduzca codigo de actividad" id="codigoActividadModal" class="form-control" name="codigoActividadModal" required>
                                            </div>
                                            <br>
                                            <div>
                                                <input type ="text" placeholder="Introduzca nombre de actividad" id="nombreActividadModal" class="form-control" name="nombreActividadModal" required>
                                            </div>
                                            <br>
                                            <div>
                                                <textarea type="text" name="actividadDescripcion" placeholder="descripcion del de la actividad" id="actividadDescripcion" class="form-control" required></textarea>
                                            </div>
                                            <br>
                                            <div>
                                                <select id="componentesProyectoActividadesCombo" class="select2" data-placeholder="Seleccione un Componente..." required>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <br>
                                            <div>
                                                <select id="productosProyectoActividadCombo" class="select2" data-placeholder="Seleccione un producto..." required>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="guardarActividades" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar Fases de la actividad -->
                <div  class="modal fade" id="modalAgregarFasesActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formFases" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Nueva Fase</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <h5><label class="col-sm-12 control-label">Nombre</label></h5>
                                            <div class="col-sm-12">
                                                <input type ="text" placeholder="Introduzca el nombre de la fase" id="nombreFase" class="form-control" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <h5><label class="col-sm-12 control-label">Descripción</label></h5>
                                            <div class="col-sm-12">
                                                <textarea id="descripcionFase" class="form-control" name="DescripcionFase"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type ="submit"  id="guardarPresupuestoActividad" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar Programacion de fases por actividad -->
                <div  class="modal fade" id="modalprogramarFasesActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formProgramacionFase" name="form_insertar" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Programación de Fases</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="input-group col-md-10 mb15">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <input name="inicioFase" type="text" placeholder="Fecha de Inicio" id="fechaInicioFase" class="form-control" required/>
                                        
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <input name="finFase" type="text" placeholder="Fecha de Finalización" id="fechaFinFase" class="form-control" required/>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type ="submit"  id="guardarProgramacionFaseActividad" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar responsable de la fase-->
                <div  class="modal fade" id="modalresponsableFasesActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formResponsableFase" name="formResponsableFase" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Asignar responsable de la Fases</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <select id="componentesProyectoCombo" class="select2" data-placeholder="Seleccione un Componente..." required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type ="submit"  id="guardarResponsableActividad" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             <!-- Modal para asignar presupuesto a una actividad-->
                <div  class="modal fade" id="modalPresupuestoActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form role="form" id="formPresupuestoActividad" name="formPresupuestoActividad" action="#">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Asignar Presupuesto a la actividad</h4>
                                </div>
                                <div class = "modal-body">
                                    <div class="row">
                                        <br>
                                        <select id="monedaPresupuestoActividadCombo" class="select2" data-placeholder="Seleccione una moneda...">
                                            <option value=""></option>
                                        </select>
                                        <br>
                                        <select id ="cooperantePresupuestoActividadCombo" class="select2" data-placeholder="Seleccione un cooperante...">
                                            <option value=""></option>
                                        </select>
                                        <br>
                                        <input type="text" name="montoModal" placeholder="Monto" id="montoCooperanteModal" class="form-control"/
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type ="submit"  id="guardarResponsableActividad" class="btn btn-primary" >Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </section>
        <?php include('footer.php'); ?>
        <script src="../js/crearProyecto.js">
        </script>
    </body>
</html>
