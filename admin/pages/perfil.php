<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/menuContextual2.css">
        <link rel="stylesheet" href="../../componentes/bootstrap-social.css">
        <link rel="stylesheet" href="../../css/dropzone.css">
        <link rel="stylesheet" href="../../css/fileinput.min.css">
        <?php
            session_start(); 
            include('head.php'); 
        ?>
        <title>Gis Project | Gestión de proyectos</title>
        
    </head>
      <!--cargando estilos   -->
      <link rel="stylesheet" href="../css/editar_perfilOrganizacion.css">
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
                            <li><a href="principal_organizacion.php">Organizacion</a></li>
                            <li class="active">Perfil</li>
                        </ol>
                    </div>
                </div>
                    <div id="notificacion"></div>
                <div class="contentpanel">

                    <div id="wrapper" class="toggled-2">
                       
                        <div id="page-content-wrapper">

                            <ul class="nav  nav-tabs nav-dark nav-justified">
                              <li class="active"><a href="#infoPerfil" data-toggle="tab"><strong>Perfil Organizacional</strong></a></li>
                              <li class=""><a href="#InformacionLegal" data-toggle="tab"><strong>Informacion Legal</strong></a></li>
                              <li class=""><a href="#infoContacto" data-toggle="tab"><strong>Informacion de Contacto</strong></a></li>
                            </ul>
                            
                            <div class="tab-content ">
                              <div class="tab-pane active" id="infoPerfil">
                                <div id="perfil_codigoAsignadoSistema">
                                    <h3 id="perfil_numeroAsignado">00001</h3>
                                    <h6>Numero asignado por el sistema</h6>
                                </div>
                                <form action="" id="perfilOrganizacional" class="form-horizontal">
                                            <div class="col-md-2"></div>
                                            <br>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Nombre: </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="perfil_org_nombre" placeholder="inserte un nombre" id="perfil_org_nombre" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Pais: </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="perfil_org_pais" placeholder="inserte un pais" id="perfil_org_pais" class="form-control" >
                                              </div>
                                            </div>                                                
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Departamento </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="perfil_org_depto" placeholder="inserte un Departamento" id="perfil_org_depto" class="form-control" >
                                              </div>
                                            </div>  
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Municipio </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="perfil_org_municipio" placeholder="inserte un municipio" id="perfil_org_municipio" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Actividad: </label>
                                              <div class="col-sm-6">
                                                <textarea id="perfil_org_act" name="perfil_org_act" placeholder = "inserte una actividad" class="form-control" ></textarea>
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Mision: </label>
                                              <div class="col-sm-6">
                                                <textarea id="perfil_org_mision" name="perfil_org_mision"  placeholder = "inserte la mision de la organizacion"class="form-control" ></textarea>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Vision: </label>
                                              <div class="col-sm-6">
                                                <textarea id="perfil_org_vision" name="perfil_org_vision" placeholder ="Inserte la vision de la organizacion"class="form-control" ></textarea>
                                              </div>
                                            </div>
                                         <!--    <div class="form-group">
                                              <label class="col-sm-3 control-label">Subir Logotipo Institucional: </label>
                                              <div class="col-sm-6">
                                                <input type="file" name="perfil_org_logo" placeholder="" id="perfil_org_logo" class="form-control" >
                                              </div>
                                            </div>   -->
                                            <div class="form-group " >
                                                <label class="col-sm-3 control-label">Subir Logotipo Institucional: </label>

                                                <div class="col-sm-6">
                                                  <input id="input-fcount-logo" name="file"  type="file" class="file-loading">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4 pull-right">
                                                  <button id = "submit1" class="btn btn-primary">Guardar</button>&nbsp;
                                                </div>
                                             </div>

                                            
                                        </form>
                              </div>
                              <div class="tab-pane" id="InformacionLegal">
                                <div id="legal_codigoAsignadoSistema">
                                    <h3 id="legal_codigoDerecho">00001</h3>
                                    <h6>Codigo y nombre de la institucion</h6>
                                </div>
                                <form action="" id="form_infoLegal" class="form-horizontal">
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Numero de Registro</label>
                                              <div class="col-sm-6">
                                                <input type="text" placeholder="inserte un numero de registro" class="form-control" id = "text_registro" name = "text_registro">
                                              </div>

                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Fecha de Constitucion: </label>
                                              <div class="col-sm-6">
                                                <input type="date" name="text_proyecto" placeholder="inserte fecha constitucion" id="text_proyecto" class="form-control" >
                                              </div>
                                            </div>                                                
                                            <div class="form-group"  >
                                              <label class="col-sm-3 control-label">RTN: </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="text_RTN" placeholder="inserte RTN" id="text_RTN" class="form-control" >
                                              </div>

                                            </div>  
                                              <div class = "form-group"id=""style = "margin-left : 30px ; border-bottom: 1px solid #d3d7db;  padding: 15px 0;">
                                                <h4>JUNTA DIRECTIVA</h4>
                                              </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Presidente </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_presidente" placeholder="inserte Presidente" id="txt_presidente" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                             <div class=" form-group">
                                              <label class="col-sm-3 control-label">Vicepresidente </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_vicePresidente" placeholder=" inserte vice-presidente" id="txt_vicePresidente" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                             <div class=" form-group">
                                              <label class="col-sm-3 control-label">Secretario </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_secretario" placeholder="inserte Secretario" id="txt_secretario" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                             <div class="form-group">
                                              <label class="col-sm-3 control-label">Tesorero </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_tesorero" placeholder="inserte Tesorero" id="txt_tesorero" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                             <div class="form-group">
                                              <label class="col-sm-3 control-label">Fiscal </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_fiscal" placeholder="inserte Nombre Fiscal" id="txt_fiscal" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                             <div class="form-group">
                                              <label class="col-sm-3 control-label">Vocal I </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_vocalI" placeholder="inserte Nombre vocalI" id="txt_vocalI" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Vocal II </label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_vocalII" placeholder="inserte Nombre del vocalII" id="txt_vocalII" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div>
                                            <div class="form-group">

                                              <label  id = "agregarJunta"class="col-sm-4 control-label"> <a class="" id = "" href="#">Agregar mas equipo</a> </label>
                                              
                                            </div>

                                           
                                            
                                            
                                            <div class="form-group">
                                                <div class="row">
                                              <label class="col-sm-3 control-label">Apoderado Legal</label>
                                              <div class="input-group col-sm-3">
                                                <input type="text" placeholder="inserte Apoderado Legal" class="form-control" id ="txt_apoderado" name ="txt_apoderado">
                                                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                              <div class="input-group  col-sm-3">
                                                 <span class="input-group-addon"><i class="">RTN</i></span>
                                                <input type="text" placeholder="RTN Apoderado" class="form-control" id = "txt_rtnApoderado" name ="txt_rtnApoderado">
                                              </div> 
                                            </div>
                                            </div>

                                              <div class="form-group">
                                              <label class="col-sm-3 control-label">Director Ejecutivo</label>
                                              <div class="input-group col-sm-6">
                                                <input type="text" name="txt_director" placeholder="inserte Director ejectivo" id="txt_director" class="form-control" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                              </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-sm-4 pull-right">
                                                  <button id = "submit2"class="btn btn-primary">Guardar</button>&nbsp;
                                                </div>
                                             </div>

                                            
                                </form>
                              </div>
                              <div class="tab-pane " id="infoContacto">
                                <div id="legal_codigoAsignadoSistema">
                                    <h3 id="legal_codigoDerecho">00001</h3>
                                    <h6>Codigo y nombre de la institucion</h6>
                                </div>
                                <form action="" id="form_infoContacto" class="form-horizontal">
                                            <div class="col-md-2"></div>
                                            <br>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Direccion: </label>
                                              <div class="col-sm-6">
                                                <textarea id="txt_contacto_direccion" name="txt_contacto_direccion" placeholder = "Direccion"class="form-control"></textarea>
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Telefono (1): </label>
                                              <div class="col-sm-6">
                                                <input type="tel" name="txt_contacto_telefono1" placeholder="ingrese Telefono" id="txt_contacto_telefono1" class="form-control" >
                                              </div>
                                            </div> 
                                              <div class="form-group">
                                              <label class="col-sm-3 control-label">Telefono (2): </label>
                                              <div class="col-sm-6">
                                                <input type="tel" name="txt_contacto_telefono2" placeholder="Ingrese un Telefono" id="txt_contacto_telefono2" class="form-control" >
                                              </div>
                                            </div>                                                
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Celular :</label>
                                              <div class="col-sm-6">
                                                <input type="text" name="txt_contacto_celular" placeholder="Ingrese Celular" id="txt_contacto_celular" class="form-control" >
                                              </div>
                                            </div>  
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Email :</label>
                                              <div class="col-sm-6">
                                                <input type="text" name="txt_contacto_email" placeholder="Ingrese email" id="txt_contacto_email" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Web: </label>
                                              <div class="col-sm-6">
                                                <input id="txt_contacto_web" name="txt_contacto_web" placeholder = "ingrese Web"class="form-control" ></input>
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label"> 
                                                <a class="btn btn-social-icon btn-facebook" style="margin-left: -42px;">
                                                    <span class="fa fa-facebook"></span>
                                                </a> </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="contact_urlFacebook" placeholder="inserte url facebook" id="contact_urlFacebook" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label"> 
                                                <a class="btn btn-social-icon btn-twitter" style="margin-left: -42px;">
                                                    <span class="fa fa-twitter"></span>
                                                </a> </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="contact_urltwitter" placeholder="inserte url twitter" id="contact_urltwitter" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label"> 
                                                <a class="btn btn-social-icon btn-youtube" style="margin-left: -42px;">
                                                    <span class="fa fa-youtube"></span>
                                                </a> </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="contact_urlyoutube" placeholder="inserte url youtube" id="contact_urlyoutube" class="form-control" >
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label"> 
                                                <a class="btn btn-social-icon btn-linkedin" style="margin-left: -42px;">
                                                    <span class="fa fa-linkedin"></span>
                                                </a> </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="contact_urllinkedin" placeholder="inserte url linkedin" id="contact_urllinkedin" class="form-control" required="">
                                              </div>
                                            </div> 
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label"> 
                                                <a class="btn btn-social-icon btn-instagram" style="margin-left: -42px;">
                                                    <span class="fa fa-instagram"></span>
                                                </a> </label>
                                              <div class="col-sm-6">
                                                <input type="text" name="contact_urlIstagram" placeholder="inserte url instagram" id="contact_urlIstagram" class="form-control" required="">
                                              </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-sm-4 pull-right">
                                                  <button id = "submit3" class="btn btn-primary">Guardar</button>&nbsp;
                                                </div>
                                             </div>
                                        </form>
                         </div>
                        </div><!-- page-content-wrapper -->
                    </div><!-- wrapper -->
                </div> <!-- contentpanel -->
            </div><!-- mainpanel -->


             <!-- Modal para agregar mas campos en la Junta Directiva -->
                <div  class="modal fade" id="modal_agregaJuntaDirectiva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Agregar Miembro</h4>
                                </div>
                                <div class = "modal-body">
                                  <form action="form" id = "form_agregaJunta" class = "form-horizontal">
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Cargo</label>
                                      <div class="col-sm-4">
                                        <input id = "nuevo_juntaCargo"type="text" placeholder="" class="form-control">
                                      </div>
                                      <label class="col-sm-2 control-label">Nombre</label>
                                      <div class="col-sm-4">
                                        <input id = "nuevo_juntaNombre" type="text" placeholder="" class="form-control">
                                      </div>
                                      
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" id="agregarDirectiva" class="btn btn-primary" >Agregar</button>
                                    </div>
                                  </form>
                                </div>
                            
                        </div>
                    </div>
                </div>
        </section>
       
        <?php include('footer.php'); ?>
        <script src="../js/editar_perfilOrganizacion.js"></script>
    </body>
</html>
