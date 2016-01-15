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
        <style>
            img.featurette-image.img-circle {
              margin-left: 10%;
              margin-right: 10%;
              margin-top: 15%;
            }
        </style>
    </head>
    <body>
<!-- stilos de la pagina -->
<!-- <link rel="stylesheet" href="../css/principal_organizacion.css"> -->
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
                            
                            
                            <div class="col-sm-12 col-md-12" style ="float: none;display: table-cell;vertical-align: top;">
                              <div class="panel panel-default"  style  = "  background-color:  rgb(237, 236, 240); ;">
                                <div class="panel-body">
                                  <div class="row" style=" border-bottom: 1px solid #d3d7db; ">
                                    <div class="col-sm-3">
                                      <img class="featurette-image img-circle " src="../imagenes/perfil.jpg" >
                                    </div>
                                    <div class="col-sm-6">
                                       
                                          <div class="row">
                                            <div class = "col-sm-8">
                                              <h3 id = "nombreCooperante" >NOMBRE COOPERANTE </h3>
                                            </div>
                                            <div class="col-sm-12">
                                              <h5 id = "codigo_cooperante" >Coodigo de Cooperacion</h5>
                                             
                                            </div><!-- col-sm-8 --><div class="col-sm-12">
                                              <h5 id = "tipo_cooperante" >TIpo de Cooperacion</h5>
                                             
                                            </div><!-- col-sm-8 -->

                                            <div class="col-sm-12">
                                              <h5 id = "RTN_cooperante" >RTN</h5>
                                             
                                            </div><!-- col-sm-8 -->
                                            <div class="col-sm-12">
                                              <h4>AREAS DE ACCION</h4>
                                              <p id = "area_accion" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eius officia fugiat totam possimus alias maxime veritatis neque sint, accusamus soluta quaerat quas? Inventore at, ipsum, tempora quibusdam quaerat rem.</p>
                                             
                                            </div><!-- col-sm-8 -->
                                          
                                          </div><!-- row -->
                                      
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="row" style = "margin-top : 10%">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-2 control-label"> 
                                                    <a class="btn btn-social-icon btn-twitter" style="">
                                                        <span class="fa fa-circle"></span>
                                                    </a> </label>
                                                  <div class="col-sm-10">
                                                    <a href ="" value = "" name="contact_urltwitter" id="contact_sitio" class="form-control"  style = "  background-color:  rgb(237, 236, 240);  color :blue; border : none;">www.organizacion.com</a>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                      <div class="row" style = "">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-2 control-label"> 
                                                    <a class="btn btn-social-icon btn-facebook" style="">
                                                        <span class="fa fa-circle"></span>
                                                    </a> </label>
                                                  <div class="col-sm-10">
                                                    <a href ="" value = "" name="contact_urlfacebook" id="contact_urlface" class="form-control"  style = "  background-color:  rgb(237, 236, 240) ;color :blue; border : none;">www.organizacionfacebook.com</a>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                      <div class="row" style = "">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-2 control-label"> 
                                                    <a class="btn btn-social-icon btn-twitter" style="">
                                                        <span class="fa fa-twitter"></span>
                                                    </a> </label>
                                                  <div class="col-sm-10">
                                                    <a href ="" value = "" name="contact_urltwitter" id="contact_urlTwitter" class="form-control"  style = "  background-color:  rgb(237, 236, 240);  color :blue; border : none;">www.organizaciontwitter.com</a>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                      <h4 >Mision</h4>
                                      <p id = "mision" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam earum suscipit libero, doloremque sequi provident a harum dolore amet veniam omnis! Commodi vero, voluptatem distinctio debitis eaque maxime, eos consequatur.</p>
                                    </div>
                                    <div class="col-md-5 col-md-offset-0 pull-right">
                                      <h4>Vision</h4>
                                      <p id = "vision" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis explicabo nulla temporibus vel dicta, saepe dolores facilis magni. Dolores eos soluta dolorum commodi harum eaque quaerat, maiores doloremque eveniet fugiat.</p>
                                    </div>
                                  </div>
                              
                                  
                                </div><!-- panel-body -->
                              </div><!-- panel -->





                              <div class="panel panel-default"  style  = "  background-color:  rgb(237, 236, 240); ;">
                                <div class="panel-body">
                                  <!-- <div class="row" style=" border-bottom: 1px solid #d3d7db; ">
                                    <div class="col-md-6 col-md-offset-1">
                                    </div>
                                    <div class="col-md-5">
                                    </div>
                                  </div> -->
                                  <div class="row"  >
                                    <div class="col-xs-12 col-md-6 col-md-offset-1 " style=" ">
                                      <h4 style = "">PERSONAL DE CONTACTO</h3>
                                       <div class="row" style=" border-top: 1px solid #d3d7db; ">
                                         <form action="" id="" class="form-horizontal">
                                            <div class="form-group">
                                                <label  class="col-sm-3 col-md-offset-1 control-label">Representante de Pais : </label>
                                                <label id = "representante" class="col-sm-4 control-label" style="margin-left: 0%;">34536-345-sdgg </label>
                                                
                                              </div> 
                                              <div class="form-group">
                                                <label class="col-sm-3 control-label col-md-offset-1">Ejecutivo de Proyectos: </label>
                                                <label id = "ejecutivoProyecto" class="col-sm-4 control-label" style="margin-left0%;">05/06/99 </label>
                                                
                                              </div> 
                                              <div class="form-group" style = "  "   >
                                                <label class="col-sm-3 control-label col-md-offset-1 ">Contacto de Asistente: </label>
                                                <label  id = "asistente"class="col-sm-4 control-label" style="margin-left: 0%;">34536-345-sdgg </label>
                                                
                                              </div> 
                                         </form>
                                         
                                       </div>
                                    </div>
                                    <div class="col-xs-12 col-md-5" >
                                      <h4>INFORMACION DE CONTACTO</h3>
                                          <div class="row"  style=" border-top: 1px solid #d3d7db; ">
                                        <div class = "col-sm-12" style ="margin-top : 5%">
                                          <div class="form-group">
                                                  <label class="col-sm-1 control-label"> 
                                                    <i class="fa fa-circle" style="">
                                                      
                                                    </i> </label>
                                                  <div class="col-sm-10">
                                                    <label href ="" value = "" name="contact_urltwitter" id="ciudad" class=""  style = "">Ciudad, Pais</label>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                      <div class="row" style = "">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-1 control-label"> 
                                                    <i class="fa fa-circle" style="">
                                                       
                                                    </i> </label>
                                                  <div class="col-sm-10">
                                                    <label href ="" value = "" name="contact_urlfacebook" id="direccion" class=""  style = "">www.organizacionfacebook.com</label>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                      <div class="row" style = "">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-1 control-label"> 
                                                    <i class="fa fa-circle" style="">
                                                       
                                                    </i> </label>
                                                  <div class="col-sm-10">
                                                    <label href ="" value = "" name="contact_urlfacebook" id="telefono" class=""  style = "">www.organizacionfacebook.com</label>
                                                  </div>
                                            </div> 
                                        </div>
                                      </div><!-- row -->
                                      <div class="row" style = "">
                                        <div class = "col-sm-12">
                                          <div class="form-group">
                                                  <label class="col-sm-1 control-label"> 
                                                    <i class="fa fa-user" style="">
                                                        
                                                    </i> </label>
                                                  <div class="col-sm-10">
                                                    <label href ="" value = "" name="contact_urltwitter" id="email" class=""  style = "">www.organizaciontwitter.com</label>
                                                  </div>
                                            </div> 
                                        </div>
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
        <script src="../js/verPerfilCooperante.js"></script>
    </body>
</html>
