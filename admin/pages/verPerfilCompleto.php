<!DOCTYPE html>
<link rel="stylesheet" href="../css/menuContextual2.css">
<link rel="stylesheet" href="../css/verPerfilProyecto.css">
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
                    <h2><i class="fa fa-home"></i>Gestión de proyectos <span></span></h2>
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
                                    <h3 id="headerProyecto" class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    PERFIL
                                </div>
                            </div><!-- panel --> 
                            <div id="subPerfilProyecto" class="panel panel-default">
                                <div class="panel-body editable-list-group">
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
                                            <h1 id="nombreProyecto"><?php echo $_GET['N'];?></h1>
                                            <h4 id="Localizacion"></h4>
                                            <br>
                                            <label> Descripción del proyecto</label>
                                            <div  class="col-md-12 componente">
                                                <label class="interno" id="descripcionProyecto"></label>
                                            </div>
                                            <br>
                                            <label id="labelduracion"> Duración del proyecto</label>
                                            <div  class="col-md-12 componente">
                                                <label class="col-md-12 interno1" id="inicioProyecto"></label>
                                                <label class="col-md-12 interno2" id="finProyecto"></label>
                                            </div>
                                            <br>
                                            <label id="labelObjetivo"> Objetivo del proyecto</label>
                                            <div  class="col-md-12 componente">
                                                <label class="interno" id="objetivoProyecto"></label>
                                            </div>
                                            <br>
                                            <label id="labelObjetivo"> Beneficiarios del proyecto</label>
                                            <div  class="col-md-12 componente">
                                                <label class="interno" id="beneficiariosProyecto"></label>
                                            </div>
                                            <br>
                                            <br>
                                            <div style="margin-top: 30px;" class="col-md-12">
                                                <label class="vineta col-md-3">Sector Institucional: </label> <label class="col-md-9 componente interno" id="SIProyecto"></label>
                                                <br>
                                                <label class="vineta col-md-3">Sector Economico: </label> <label class="col-md-9 componente interno" id="SEProyecto"></label>
                                                <br>
                                                <label class="vineta col-md-3">Eje Estrategico: </label> <label class="col-md-9 componente interno" id="EEProyecto"></label>
                                                <br>
                                                <label class="vineta col-md-3">Areas de focalización: </label> <label class="col-md-9 componente interno" id="AFProyecto"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row col-md-7">
                                            <br>
                                            <br>
                                            EQUIPO
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="subPerfilProyecto" class="panel panel-default">
                                <div class="panel-body">
                                     <div id="contenidoPerfilProyecto" class="row col-md-12">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <table align="center" class="table table-bordered mb30" width="600px">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Codigo</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Rol</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Nombre</th>
                                                        <th style="text-align:center; background-color: rgb(186, 200, 226);">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="empleadosExtras">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="row col-md-7">
                                            <br>
                                            <br>
                                            PRESUPUESTO
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="subPerfilProyecto" class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <br>
                                        <form id="formPresupuesto">
                                            <table border="0" width="810px">
                                                <tr>
                                                    <td style="background-color: rgb(186, 200, 226);" width="25%" align="center">
                                                        Línea:
                                                    </td>
                                                    <td width="50%">
                                                       <input type="text" name="lineaPresupuesto" placeholder="Línea del presupuesto del proyecto" id="lineaPresupuesto" class="form-control" required disabled/> 
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
                                                    <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Numero de Cooperante</th>
                                                    <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Cooperante</th>
                                                    <th style="text-align:center; background-color: rgb(186, 200, 226);" width="25%">Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ctablaPresupuesto">
                                                
                                            </tbody>
                                        </table>
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
                                    <div class="col-md-1"></div>
                                    <div id="regreso" class="row col-md-7">
                                        <a href="verProyecto.php?C=<?php echo $_GET['C']."&N=".$_GET['N']."&CI=".$_GET['CI']?>" id ="resgresar" class="btn btn-primary">Volver</a> 
                                        <label id ="opcionesExtras"><a href="#">Exportar a PDF</a></label>
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
        <script src="../js/verPerfilProyecto.js"></script>
        <script src="../js/verEquipoProyecto.js"></script>
        <script src="../js/verPresupuestoGeneralProyecto.js"></script>
    </body>
</html>
