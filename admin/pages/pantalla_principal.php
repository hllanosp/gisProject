<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
  <?php include('head.php'); ?>
  <title>Gis Project | Inicio</title>
  <link rel="stylesheet" href="../css/pantalla_principal.css">
</head>

    <div class="headerbar" > 
      <div class="header-left col-md-3">
        <div  class="logopanel" id="logopanel">
            <img class="img" src="../imagenes/logo3.png" alt="">
        </div><!-- logopanel -->     
      </div><!-- header-left -->
    </div><!-- headerbar -->
    <div class="contentpanel" id="contentpanel" style="height: 100%;">
      <div class="col-lg-3" id="userPerfil">
        <br>
        <img src="../imagenes/perfil.jpg" id="imagenPerfil" class="thumbnail img-responsive img-circle" alt="" />
        <div class="mb30"></div>
        <!-- Correo de la organización logueada -->
        <h5 class="subtitle">Correo</h5>
        <a id="correoContacto"><?php echo $_SESSION['correo']; ?></a><br><br>
        <!-- Direccion web de la organizacion logueada -->
        <h5 class="subtitle">Web</h5>
        <a id="direccionWeb"><?php echo $_SESSION['direccionWeb']; ?></a><br><br>
        <!-- Direccion de la organizacion -->
        <h5 class="subtitle">Dirección</h5>
        <p id="direccion"><?php echo $_SESSION['direccion']; ?></p><br><br>
        <!-- Telefono de la organizacion -->
        <h5 class="subtitle">Teléfono</h5>
        <p id="telefono"><?php echo $_SESSION['telefono']; ?></p><br><br>
        <!-- a para pasar a la pantalla de edicion de perfiles organizacionales -->
        <a id="editarPerfil">Editar Perfil</a><br>
      </div>
      <div class="col-lg-9" >
          <div class="center-div resize">
            <table align="center" border="0" width="600px">
                <tr>
                  <td colspan="2">
                    <img class="img img-responsive" src="../imagenes/menu2.jpg" alt="">
                  </td>
                </tr>
                <tr>
                  <td id="gestionP" width="45%">
                    <a class="links2" href="gestionProyectos.php">Gestión de proyectos</a>
                  </td>
                  <td id="gestionF" width="85%">
                    <a class="links" href="gestionDeAdministracion.php">Gestión de administración y finanzas</a>
                  </td>
                </tr>
            </table>        
          </div>
      </div>
    </div>
    <div class="row" id="footer">
      <br> 
      <div class="col-md-11" id="redes">
          Desarrolado por: <span style="font-family: 'Tw Cen MT'; font-size: larger;" >GOBAL</span><span style="font-family: 'Tw Cen MT'; font-size: larger;"><b>INFORMATION</b></span><span style="font-family: 'Tw Cen MT'; font-size: larger; font-style:oblique;">SYSTEMS</span><span style="font-family: 'Tw Cen MT'; font-size: larger;"><b> GIS </b></span><span>&copy;2015</span>
          <h6 id="h6footer">Bulevar Morazán, Sendero Selecta, Esquina Opuesta de Cenáculo, edificio de tres plantas.</h6>
          <h6 id="h6footer2">Tel. 2235-8293, email: gis@gisproject.net</h6>
      </div>
    </div>

    <?php include('footer.php'); ?>
</html>
