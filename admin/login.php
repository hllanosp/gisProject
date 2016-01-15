<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="imagenes/gisIcon.png" type="image/png">
  <title>Iniciar Sesión GisProject</title>
  <link href="../css/style.default.css" rel="stylesheet">
  <link href="../css/bootstrap-social.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="css/login.css">
  <link href='https://fonts.googleapis.com/css?family=Podkova' rel='stylesheet' type='text/css'>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../js/html5shiv.js"></script>
  <script src="../js/respond.min.js"></script>
  <![endif]-->
</head>
  <div class="row" id="logo01" style="">  
        <a href="../index.php"><img src="imagenes/logo01.png"></a>
  </div>
  <div class="col-md-12" >
    <div class="row" id="textoPromosional">
        <h1 id="#login_tit_01" style=" font-size: 200%; text-align:center; font-family:Corbel,italic;"><span style="font-family: 'Tw Cen MT'; font-size: larger;"><b>GIS</b></span><span style="font-family:'Podkova',serif;">project Team</span> les da la <span style="font-style:oblique;">BIENVENIDA</span> a la plataforma especializada en gestión de proyectos, administración y finanzas; socio estratégico para realizar su trabajo por resultados; haciendo que sea productivo, medible y agradable en todo momento.</h1>
    </div>
  </div>
<body class="signin">
  
<section>
  <div class="col-md-12">
      <div class="signinpanel">
          <div class="row">
              <div class="col-md-7" ></div>
              <div class="col-md-5">
                  <form role="form" id="formSubmit" method="post">
                    <h2 id="tituloPanelLogin">¡Trabaje donde quiera!</h2>
                    <h5 id="h5Login">Nosotros le ayudamos a simplificar la gestión de proyectos</h5>
                    <img class="img" src="imagenes/logo02.png" alt="">
                    <br>
                    <br>
                    <p id="pLogin" class="mt5 mb20">Login to your <span style="font-family: 'Tw Cen MT';">GIS</span> project acount.</p>
                    <div class="img" id="loader"></div>
                    <div id ="notificaciones"></div>
                    <input id="usuario" type="text" class="form-control uname textoCorporativo" placeholder="Correo@dominio.net" />
                    <input id="contrasena" type="password" class="form-control pword textoCorporativo" placeholder="Contraseña" />
                    <a class="textoCorporativo" href=""><small>Olvidaste tu contraseña?</small></a>
                    <button type="button submit" id = "iniciar_sesion" class="btn btn-success btn-block">Entrar</button>
                  </form>
              </div><!-- col-sm-5 -->
          </div><!-- row -->
      </div><!-- signin -->
      <div class="row" id="footer">
          <br> 
          <div class="col-md-11" id="redes">
            <div class="col-md-1">
                <a href=""><img src="imagenes/logofb.png" alt=""></a>
                <a href=""><img src="imagenes/logoin.png" alt=""></a>
            </div>
              Desarrolado por: <span style="font-family: 'Tw Cen MT'; font-size: larger;" >GLOBAL</span><span style="font-family: 'Tw Cen MT'; font-size: larger;"><b>INFORMATION</b></span><span style="font-family: 'Tw Cen MT'; font-size: larger; font-style:oblique;">SYSTEMS</span><span style="font-family: 'Tw Cen MT'; font-size: larger;"><b> GIS </b></span><span>&copy;2015</span>
              <h6 id="h6footer">Bulevar Morazán, Sendero Selecta, Esquina Opuesta de Cenáculo, edificio de tres plantas.</h6>
              <h6 id="h6footer2">Tel. 2235-8293, email: gis@gisproject.net</h6>
          </div>
      </div>
    </div>
</section>
<script src="../componentes/jquery-1.11.1.min.js"></script>
<script src="../componentes/jquery-migrate-1.2.1.min.js"></script>
<script src="../componentes/bootstrap.min.js"></script>
<script src="../componentes/modernizr.min.js"></script>
<script src="../componentes/retina.min.js"></script>
<script src="../componentes/jquery.sparkline.min.js"></script>
<script src="../componentes/custom.js"></script>
<script src="../componentes/toggles.min.js"></script>
<script src="../componentes/jquery.cookies.js"></script>
<script src="../componentes/backstretch/jquery.backstretch.min.js"></script>
<script src="js/login_submit.js"></script>
</body>
</html>
