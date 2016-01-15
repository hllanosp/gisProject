<!DOCTYPE html>
<link rel="stylesheet" href="../css/menuContextual2.css">
<link rel="stylesheet" href="../css/editarPerfilProyecto.css">
<link rel="stylesheet" href="../css/bootstrap-editable.css">
<html lang="en">
    <head>
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Ver Proyectos</title>
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
                    <h2><i class="fa fa-pencil"></i>Editar Pefil Proyecto</h2>
                    <!-- Migas de pan -->
                    <div class="breadcrumb-wrapper">
                        <span class="label">Usted esta Aqui:</span>
                        <ol class="breadcrumb">
                            <li><a href="pantalla_principal.php">Pantalla Principal</a></li>
                            <li><a href="gesionProyectos.php">Gestión de Proyectos</a></li>
                            <li class="active">Perfil de proyecto</li>
                        </ol>
                    </div>
                </div>

                <div class="contentpanel">
                    <div id="wrapper" class="toggled-2">
                        <div id="sidebar-wrapper">
                            <ul class="sidebar-nav nav-pills nav-stacked" id="menuProyectos"></ul> 
                        </div><!-- side-wrapper -->
                        <div id="page-content-wrapper">
                            <div id="panelPerfilProyecto"  class="panel panel-default">
                                <div  id="proyectosPanel" class="panel-heading">
                                    <input id ="proyectoGET" type="hidden" value="<?php echo $_GET['C'];?>"></input>
                                    <input id ="nombreGET" type="hidden" value="<?php echo $_GET['N'];?>"></input>
                                    <input id ="codigoGET" type="hidden" value="<?php echo $_GET['CI'];?>"></input>
                                    <h3 id="headerProyecto" class="panel-title">Proyecto  <?php echo $_GET['C']." - ".$_GET['N'];?></h3>
                                </div>
                                <div class="panel-body">
                                    PERFIL
                                </div>
                            </div><!-- panel --> 
                            <div id="subPerfilProyecto" class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="codigoDerecho">
                                            <h5>Numero asignado por el sistema</h5>
                                            <h3 id="codigoDerecho"><?php echo $_GET['CI'] ?></h3>
                                        </div>
                                        <div id="codigoIzquierdo">
                                            <h5>Numero asignado por el sistema</h5>
                                            <h3><?php echo $_GET['C'] ?></h3>
                                        </div>
                                    </div>
                                    <div id="contenidoPerfilProyecto" class="row col-md-12">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <form action="" id ="formInformacion" class="form-horizontal">
                                                <div class="col-md-2"></div>
                                                <br>                                            
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
                                        <div class="col-md-1"></div>
                                        <div id="regreso" class="row col-md-7">
                                                <a href="verProyecto.php?C=<?php echo $_GET['C']."&N=".$_GET['N']."&CI=".$_GET['CI']?>" id ="resgresar" class="btn btn-primary">Volver</a> 
                                                <label id ="opcionesExtras"><a  class="guardar" href="#">Guardar</a></a></label>
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
        <?php include('footer.php'); ?>
        <script src="../js/gestionProyectos.js"></script>
        <script src="../js/pantallaPrincipalVerProyectos.js"></script>
        <script src="../../componentes/bootstrap-editable.min.js"></script>
        <script src="../js/editarPerfilProyecto.js"></script>
    </body>
</html>
