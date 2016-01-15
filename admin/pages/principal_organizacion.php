<!DOCTYPE html>
<link rel="stylesheet" href="../css/menuContextual2.css">
 <link rel="stylesheet" href="../../componentes/bootstrap-social.css">

<html lang="en">

    <head>
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Gestión de proyectos</title>
        
    </head>
    <body>
<!-- stilos de la pagina -->
<link rel="stylesheet" href="../css/principal_organizacion.css">
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
                            <li><a href="principal_organizacion.php">Organizacion</a></li>
                            <li class="active">Perfil</li>
                        </ol>
                    </div>
                </div>

                <div class="contentpanel">
                    <div id="wrapper" class="toggled-2">
                       
                        <div id="page-content-wrapper" style="background-color: #d9d9d9;">
                          <div class="row " style = " display: table;">
                            <div class="col-sm-4 col-md-3" style ="float: none;display: table-cell;vertical-align: top;">
                              
                              <div class="panel panel-default" style ="background-color :  #d9d9d9;">
                                <div class="panel-body">
                                  <img class="featurette-image img-circle " src="../imagenes/perfil.jpg" >
                                  <div class="row">
                                    <div class = "col-sm-8">
                                      <h5>Mision </h5>
                                    </div>
                                    <div class="col-sm-12">
                                      <p id = "perfil_mision"class=""> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste accusamus nostrum, soluta dolore sunt enim necessitatibus maxime dignissimos incidunt aperiam hic quasi itaque modi ipsum similique quas. Officiis, officia labore!</p>
                                      <div id="basicflot" style="width: 100%; height: ; margin-bottom: 20px"></div>
                                    </div><!-- col-sm-8 -->
                                  
                                  </div><!-- row -->
                                  <div class="row">
                                    <div class = "col-sm-8">
                                      <h5>Vision </h5>
                                    </div>
                                    <div class="col-sm-12">
                                      <p id ="perfil_vision"class="mb15"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste accusamus nostrum, soluta dolore sunt enim necessitatibus maxime dignissimos incidunt aperiam hic quasi itaque modi ipsum similique quas. Officiis, officia labore!</p>
                                      <div id="basicflot" style="width: 100%; height: ; margin-bottom: 20px"></div>
                                    </div><!-- col-sm-8 -->
                                  
                                  </div><!-- row -->
                                  <div class="row" style = "margin-top : 10%">
                                    <div class = "col-sm-12">
                                      <div class="form-group">
                                              <label class="col-sm-2 control-label"> 
                                                <a class="btn btn-social-icon btn-twitter" style="">
                                                    <span class="fa fa-circle"></span>
                                                </a> </label>
                                              <div class="col-sm-10">
                                                <a href ="" value = "" name="contact_urltwitter" id="contact_urltwitter" class="form-control"  style = "background-color:#d9d9d9; color :blue; border : none;">www.organizacion.com</a>
                                              </div>
                                        </div> 
                                    </div>
                                  </div><!-- row -->
                                  <div class="row" style = "margin-top : 10%">
                                    <div class = "col-sm-12">
                                      <div class="form-group">
                                              <label class="col-sm-2 control-label"> 
                                                <a class="btn btn-social-icon btn-facebook" style="">
                                                    <span class="fa fa-circle"></span>
                                                </a> </label>
                                              <div class="col-sm-10">
                                                <a href ="" value = "" name="contact_urlfacebook" id="contact_urltwitter" class="form-control"  style = "background-color:#d9d9d9; color :blue; border : none;">www.organizacionfacebook.com</a>
                                              </div>
                                        </div> 
                                    </div>
                                  </div><!-- row -->
                                  <div class="row" style = "margin-top : 10%">
                                    <div class = "col-sm-12">
                                      <div class="form-group">
                                              <label class="col-sm-2 control-label"> 
                                                <a class="btn btn-social-icon btn-twitter" style="">
                                                    <span class="fa fa-twitter"></span>
                                                </a> </label>
                                              <div class="col-sm-10">
                                                <a href ="" value = "" name="contact_urltwitter" id="contact_urltwitter" class="form-control"  style = "background-color:#d9d9d9; color :blue; border : none;">www.organizaciontwitter.com</a>
                                              </div>
                                        </div> 
                                    </div>
                                  </div><!-- row -->

                                </div><!-- panel-body -->
                              </div><!-- panel -->
                              
                            </div><!-- col-sm-3 -->
                            
                            <div class="col-sm-8 col-md-9" style ="float: none;display: table-cell;vertical-align: top;">
                              <div class="panel panel-default" style  = "  background-color:  rgb(237, 236, 240); height: 270px;">
                                <div class="panel-body">
                                  <div id="">
                                    <h3 id="perfil_organizacion"></h3>
                                    <span class="media-meta pull-right" style=" margin-top: 0.1%; color : blue;"><a href="perfil.php">Editar Perfil</a></span>
                                    <p id ="perfil_ubicacion"style = "color : black;"href="#">
                                      <i class="glyphicon  glyphicon-record"></i> 
                                    </p>
                                    
                                </div>
                                  <div class="row">
                                    <div class = "col-sm-8">
                                      <h5>ACTIVIDAD </h5>
                                    </div>
                                    <div class="col-sm-12">
                                      <p id ="perfil_actividad"class="mb15"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste accusamus nostrum, soluta dolore sunt enim necessitatibus maxime dignissimos incidunt aperiam hic quasi itaque modi ipsum similique quas. Officiis, officia labore!</p>
                                      <div id="basicflot" style="width: 100%; height: 300px; margin-bottom: 20px"></div>
                                    </div><!-- col-sm-8 -->
                                  
                                  </div><!-- row -->
                                </div><!-- panel-body -->
                              </div><!-- panel -->
                              <div class="panel panel-default"  style  = "  background-color:  rgb(237, 236, 240); ;">
                                <div class="panel-body">
                                  <ul class="nav  nav-tabs nav-dark nav-justified">
                                    <li class="active"><a href="#info_legal" data-toggle="tab"><strong>Informacion Legal</strong></a></li>
                                    <li class=""><a href="#info_contacto" data-toggle="tab"><strong>Informacion de Contacto</strong></a></li>
                                   
                                  </ul>

                                  <div class="tab-content ">
                                    <div class="tab-pane active" id="info_legal">
                                      <form action="" id="" class="form-horizontal">
                                            
                                            <div class="form-group">
                                              <label  class="col-sm-3 col-md-offset-2 control-label">Numero de Registro: </label>
                                              <label id = "perfil_registro" class="col-sm-4 control-label" style="margin-left: 0%;">34536-345-sdgg </label>
                                              
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label col-md-offset-2">Fecha de Constitucion: </label>
                                              <label id = "perfil_fechaConstitucion" class="col-sm-4 control-label" style="margin-left0%;">05/06/99 </label>
                                              
                                            </div> 
                                            <div class="form-group" style = " border-bottom: 1px solid #d3d7db; "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">RTN: </label>
                                              <label  id = "perfil_RTN"class="col-sm-4 control-label" style="margin-left: 0%;">34536-345-sdgg </label>
                                              
                                            </div> 
                                                       
                                            <div class="form-group" style = "  "   >
                                               <div class = "col-sm-8 col-md-offset-4">
                                                <h4>JUNTA DIRECTIVA </h4>
                                              </div>
                                              
                                            </div> 
                                                       
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Presidente: </label>
                                              <label id = "perfil_presidente" class="col-sm-4 control-label " style="margin-left: 0%;">Lic. Lise Reyes Murillo </label>
                                            </div> 
                                                                  
                                            <div class="form-group"3style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Vicepresidente: </label>
                                              <label id = "perfil_vicePres"class="col-sm-4 control-label" style="margin-left: 0%;">Lic. Lise Reyes Murillo </label>
                                            </div> 
                                                                  
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Secretaria: </label>
                                              <label id = "perfil_secretaria" class="col-sm-4 control-label" style="margin-left: 0%;">Lic. Lise Reyes Murillo </label>
                                            </div> 
                                                                   
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Tesorero: </label>
                                              <label id = "perfil_tesorero" class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div> 
                                                                   
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Fiscal: </label>
                                              <label id = "perfil_fiscal" class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div>                
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Vocal I: </label>
                                              <label id = "perfil_vocalI"class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div>                
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Vocal II: </label>
                                              <label id = "perfil_vocalII"class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div>              
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 "> </label>
                                              <label id = ""class="col-sm-4 control-label" style="margin-left: %;"> </label>
                                            </div> 
                                                           
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Apoderado Legal: </label>
                                              <label id = "perfil_ApoderadoLegal" class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div>        
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 "></label>
                                              <label class="col-sm-4 control-label" style="margin-left: %;"> </label>
                                            </div> 
                                                  
                                            <div class="form-group" style = "  "   >
                                              <label class="col-sm-3 control-label col-md-offset-2 ">Director Ejectivo: </label>
                                              <label id = "perfil_direcEjectivo"class="col-sm-4 control-label" style="margin-left: %;">Lic. Lise Reyes Murillo </label>
                                            </div> 
                                        </form>
                                    </div>
                                    <div class="tab-pane " id="info_contacto">
                                      <div class="row">
                                        <form action="" class="form-horizontal">
                                          <div class = "col-sm-4  col-md-offset-4">
                                            <div class="form-group">
                                            <h4> <i class="glyphicon  glyphicon-home"></i>&nbsp;&nbsp;Direccion </h4>
                                                <address id = "perfil_direccion">
                                                  <strong>Twitter, Inc.</strong><br>
                                                  795 Folsom Ave, Suite 600<br>
                                                  San Francisco, CA 94107<br>
                                                  <abbr title="Phone">P:</abbr> (123) 456-7890
                                                </address>
                                              
                                            </div>
                                          </div>
                                          <div class = "col-sm-4  col-md-offset-4">
                                            <div class="form-group">
                                            <h4> <i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;Telefono </h4>
                                                <h5>9808-6001</h5>
                                                <h5>9808-6567</h5>
                                                <h5>9808-6567</h5>
                                              
                                            </div>
                                          </div>
                                          <div class = "col-sm-4  col-md-offset-4">
                                            <div class="form-group">
                                            <h4> <i class="glyphicon  glyphicon-envelope"></i>&nbsp;&nbsp;Correo Electronico </h4>
                                                <label id = "perfil_correo" for="">wwww.empresa.com</label>
                                            </div>
                                          </div>
                                        
                                          
                                        </form>
                                  </div><!-- row -->
                                      
                                    </div>
                                  </div>  
                                </div><!-- panel-body -->
                              </div><!-- panel -->
                            </div><!-- col-sm-9 -->
                            
                            
                          </div><!-- row -->
                          
                        </div><!-- page-content-wrapper -->
                    </div><!-- wrapper -->
                </div> <!-- contentpanel -->
            </div><!-- mainpanel -->
        </section>
        <?php include('footer.php'); ?>
        <script src="../js/verPerfilOrganizacion.js"></script>
    </body>
</html>
