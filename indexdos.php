<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
include("autocompleta.php");
	?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Casa de la Sab&iacute;la</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script language="JavaScript" src="FuncionesAjax.js"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="indexdos.php">Casa de <span class="logo_colour">la Sab&iacute;la</span></a></h1>
          <h2>Casa de la Sab&iacute;la</h2>
        </div>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li class="selected"><a href="indexdos.php">inicio</a></li>
          <li><a href="#">contactos</a>
            <ul>
					<li><a onClick="JavaScript:cargarCreacionxContacto()" >Creaci&oacute;n de Contactos</a></li>
					<li><a onClick="JavaScript:cargarConsultaxContacto()" >Consulta de Contactos</a></li>
		  </ul>
          </li>
          
          <li><a href="#">Art&iacute;culos</a>
          <ul>
				<li><a onClick="JavaScript:cargarCreacionxArticulo()" >Creaci&oacute;n de Articulos</a></li>
				<li><a onClick="JavaScript:cargarConsultaxArticulo()" >Consulta de Articulos</a></li>
				</ul>
          </li>
          <li><a href="#">ventas</a>
          <ul>
					
                    <li><a href="creacion_ventas_f.php" >Registro de Ventas</a></li>
					<li><a onClick="JavaScript:cargarConsultaxVentas()" >Consulta de Ventas</a></li>
				</ul>
          </li>
          <li><a href="#">Reportes</a>
				<ul>
					<li><a onClick="JavaScript:cargarReporte01()" >Reporte de Cantidad de Articulos Por Mes</a></li>
				</ul>
			</li>
         
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <div id='contenedorPrincipal'>
      
	</div>
    </div>
    
    <footer>
      <p><a href="">Casa de la Sab&iacute;la</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
   <script type="text/javascript" src="js/jquery.*"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#images').kwicks({
        max : 600,
        spacing : 2
      });
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
