<!DOCTYPE html>
<link rel="stylesheet" href="../css/menuContextual2.css">
<link rel="stylesheet" href="../css/verProyectos.css">
<link rel="stylesheet" href="../css/crearCooperante.css">
<link rel="stylesheet" href="../../css/fileinput.min.css">
<link rel="stylesheet" href="../../css/dropzone.css">
<html lang="en">
    <head>
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Crear Cooperante</title>
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
                    <h2><i class="fa fa-money"></i>Cooperantes<span></span></h2>
                    <!-- Migas de pan -->
                    <div class="breadcrumb-wrapper">
                        <span class="label">Usted esta Aqui:</span>
                        <ol class="breadcrumb">
                            <li><a href="pantalla_principal.php">Pantalla Principal</a></li>
                            <li><a href="gestionProyectos.php">Gestion de Proyectos</a></li>
                            <li class="active">Ver proyectos</li>
                        </ol>
                    </div>
                </div>

                <div class="contentpanel">
                    <div id="page-content-wrapper">
                        <div  class="panel panel-default">
                            <div  id="proyectosPanel" class="panel-heading">
                                <h3 id="panelheadding" style="color:black" class="panel-title">Crear Cooperantes</h3>
                            </div>
                            <div class="panel-body">
                                <ul style="background-color:#518AC7;" class="nav nav-tabs nav-justified">
                                  <li class="active"><a href="#parametros" data-toggle="tab"><strong style="color:black">Información de contacto</strong></a></li>
                                  <li ><a href="#informacionInstitucional" data-toggle="tab"><strong style="color:black">Información Institucional</strong></a></li>
                                  <li ><a href="#informacionContacto" data-toggle="tab"><strong style="color:black">Información de contacto</strong></a></li>
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="parametros">
                                        <br><br><br>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="10%">Tipo Cooperante</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaParametros">
                                                </tbody>
                                            </table>
                                            <a id="masParametros" href="#">Agregar más</a>
                                            <div id="notificaciones"></div>
                                        </div>                                        
                                    </div>
                                    <div class="tab-pane" id="informacionInstitucional">
                                        <div class ="col-md-2"></div>
                                        <div class ="col-md-10">
                                            <br><br>
                                            <form id="formCooperante">
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Nombre del cooperante: </label>
                                                  <div class="col-sm-6">
                                                    <input type="text" name="nombre" placeholder="Nombre del cooperante" id="nombreCooperante" class="form-control" required/>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Fecha Constitución:</label>
                                                    <div class="input-group col-md-6 mb15">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                        <input name="fechaConstitucion" type="text" placeholder="Fecha de constitución" id="fechaConstitucion" class="form-control" required/>
                                                    </div>
                                                </div> 
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label">RTN: </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="RTN" placeholder="RTN del cooperante" id="RTN" class="form-control" required/>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Tipo Cooperante: </label>
                                                  <div class="col-sm-6">
                                                    <select name="tipo" class="form-control" id="tipoCombo" >
                                                        <!-- Seccion para cargar la lista de locaciones almacenadas -->
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Areas de acción: </label>
                                                  <div class="col-sm-6">
                                                    <textarea id="areas" class="form-control" name="areas" required></textarea>
                                                  </div>
                                                </div>   
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Misión: </label>
                                                  <div class="col-sm-6">
                                                    <textarea id="mision" class="form-control" name="mision" required></textarea>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label class="col-sm-3 control-label">Visión: </label>
                                                  <div class="col-sm-6">
                                                    <textarea id="vision" class="form-control" name="vision" required></textarea>
                                                  </div>
                                                </div>  
                                                <button style="float:right" type ="submit"  id="guardarResponsableActividad" class="btn btn-primary" >Guardar</button>
                                            </form>
                                            <div style="display:none" id="divLogo" class="form-group col-sm-12" >
                                                <label class="col-sm-3 control-label">Logotipo </label>
                                                <div class="col-sm-6">
                                                  <input  id="input-fcount-1" name="file" multiple type="file" class="file-loading">
                                                </div>
                                            </div>
                                            <div id ="notificaciones1"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="informacionContacto">
                                        <form id="formPersonal" action="">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    PERSONAL DE CONTACTO
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class= "row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-9">
                                                            <div class=" col-sm-3" ><label class="control-label">Representante Pais: </label></div> 
                                                            <div class=" col-md-9">
                                                                <div style="margin-bottom:1%;" class="col-sm-6">
                                                                    <input type="text" name="nombreRepresentante" placeholder="Nombre" id="nombreRepresentante" class="form-control" required/>
                                                                </div>
                                                                <div style="margin-bottom:1%;"  class="col-sm-6">
                                                                    <input type="text" name="ApeliidoRepresentante" placeholder="Apellido" id="representanteRepresentante" class="form-control" required/>
                                                                </div>
                                                                <div  style="margin-bottom:1%;" class="col-sm-6">
                                                                    <input type="text" name="cargo" placeholder="Cargo" id="Cargo" class="form-control" required/>
                                                                </div>
                                                                <div  style="margin-bottom:1%;" class="col-sm-6">
                                                                    <input type="text" name="email" placeholder="Email" id="Email" class="form-control" required/>
                                                                </div> 
                                                            </div>
                                                            <a id="agregarMasPersonal" href="#">Agregar Mas</a>
                                                            <div id="notificaciones2"></div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    INFORMACIÓN DE CONTACTO
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <br>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Locación: </label>
                                                                <div class="col-sm-4">
                                                                        <select name="tipo" class="form-control" id="tipoCombo" >
                                                                            <!-- Seccion para cargar la lista de locaciones almacenadas -->
                                                                        </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                        <select name="tipo" class="form-control" id="tipoCombo" >
                                                                            <!-- Seccion para cargar la lista de locaciones almacenadas -->
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                  <label class="col-sm-2 control-label">Dirección: </label>
                                                                  <div class="col-sm-8">
                                                                    <textarea id="direccion" class="form-control" name="direccion" required></textarea>
                                                                  </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Teléfonos: </label>
                                                                <div class="col-sm-4">
                                                                    <input type="tel" name="telefono1" placeholder="Teléfono 1" id="telefono1" class="form-control" pattern="[0-9]{4}-[0-9]{4}" required/>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="tel" name="telefono2" placeholder="Teléfono 2" id="telefono2" class="form-control" pattern="[0-9]{4}-[0-9]{4}" required/>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Celular: </label>
                                                                <div class="col-sm-8">
                                                                    <input type="tel" name="Celular" placeholder="Celular" id="Celular" class="form-control" pattern="[0-9]{4}-[0-9]{4}" required/>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Email: </label>
                                                                <div class="col-sm-8">
                                                                    <input type="email" name="email" placeholder="prueba@dominio.net" id="email" class="form-control" required/>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Web: </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="web" placeholder="direccion web" id="email" class="form-control" required/>
                                                                </div>
                                                            </div> 
                                                            <br>
                                                            <button style="float:right" type ="submit"  id="guardarInformacionContacto" class="btn btn-primary" >Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel -->  
                    </div><!-- page-content-wrapper -->
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

        </section>
        <!-- Modal para editar Productos  -->
        <div  class="modal fade" id="modalTipoCooperante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" id="formTipo" name="form_editar" action="#">
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Tipos de cooperante</h4>
                        </div>
                        <div class = "modal-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                      <label class="col-sm-4 control-label">Nombre del tipo de Cooperante: </label>
                                      <div class="col-sm-8">
                                        <input type="text" name="nTipo" placeholder="Ingrese el nombre.." id="nombreTipo" class="form-control" required/>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type ="submit"  id="guardarResponsableActividad" class="btn btn-primary" >Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Modal para agregar contacto -->
        <div  class="modal fade" id="modalAgregarMasContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" id="formContacto" name="form_editar" action="#">
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Agregar Mas Contacto</h4>
                        </div>
                        <div class = "modal-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <div class= "row">
                                        <div class="col-md-12">
                                            <div class=" col-md-9">
                                                <div style="margin-bottom:1%;" class="col-sm-12">
                                                    <input type="text" name="nombreEjecutivo" placeholder="Nombre" id="nombreAsistenteModal" class="form-control" required/>
                                                </div>
                                                <div style="margin-bottom:1%;"  class="col-sm-12">
                                                    <input type="text" name="ApeliidoEjecutivo" placeholder="Apellido" id="apellidoAsistenteModal" class="form-control" required/>
                                                </div>
                                                <div  style="margin-bottom:1%;" class="col-sm-12">
                                                    <input type="text" name="cargoEjecutivo" placeholder="Cargo" id="CargoAsistenteModal" class="form-control" required/>
                                                </div>
                                                <div  style="margin-bottom:1%;" class="col-sm-12">
                                                    <input type="text" name="emailEjecutivo" placeholder="Email" id="EmailAsistenteModal" class="form-control" required/>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type ="submit"  id="guardarResponsableActividad" class="btn btn-primary" >Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
        <script src="../js/crearCooperante.js"></script>
    </body>
</html>
