<?php
	@session_start();

	include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
	//include("seguridad.php"); 
	
	include('sentencias.php');
	
		if(isset($_GET['nombre']))
			$nombre = $_GET['nombre'];
	else
		$nombre = "";
	
	
	//Define el tipo de informe seleccionado en el menú
	if(isset($_GET['p']) and ($_SESSION["autentica"] == "SIP") )
			$informe = $_GET['p'];
	else
		$informe = "login";
	
	$p = $_GET['p'];
	
	
	echo $informe;
	echo "-";
	echo $p;
	echo "autentica : ";
	echo $_SESSION["autentica"];
	echo " ------    ";
	echo $_SESSION["usuarioactual"];
	echo "ROL";
	echo $_SESSION["rol"];
	$rol = $_SESSION["rol"];
	echo $rol;
	//include($informe."_header.inc.php");
	//include($informe.".php");
	
	
?>

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Call Center - Casa de la sabila</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="stylesheets/foundation.css">
	<link rel="stylesheet" href="stylesheets/app.css">
	<link rel="stylesheet" href="stylesheets/grid.css">
	<link rel="stylesheet" href="stylesheets/ui.css">
	<link rel="stylesheet" href="stylesheets/forms.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->

	<?php if($ie_fix){ ?>
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php } ?>
	<script src="javascripts/apps.js"></script>

</head>
<body>
	<a name="top"></a>
	<!-- container -->
	<div class="container">

		<div class="row centered">
			<div class="twelve columns">
				<img src="images/layout/banner.png" width="976px" height="114px" />
			</div>
		</div>
		
		<div class="row centered">
			<div class="twelve columns">
				<a href="index.php?p=login" class=" small radius <?php if($informe == "login"){ ?>green<?php }else{ ?>blue<?php } ?> button">Inicio</a>
				<?php  if ($rol=='1' or $rol=='2' or $rol=='3'){?><a href="index.php?p=consulta_contactos" class=" small radius <?php if($informe == "consulta_contactos" || $_GET['p'] == "consulta_contactos"){ ?>green<?php }else{ ?>blue<?php } ?> button">Contactos</a><?php } ?> 
				<?php  if ($rol=='1' or $rol=='2' or $rol=='3'){?><a href="index.php?p=consulta_articulos" class=" small radius <?php if($informe == "consulta_articulos" || $_GET['p'] == "consulta_articulos"){ ?>green<?php }else{ ?>blue<?php } ?> button">Articulos</a><?php } ?> 
				<?php  if ($rol=='1' or $rol=='2' or $rol=='3'){?><a href="index.php?p=creacion_venta" class=" small radius <?php if($informe == "creacion_venta" || $_GET['p'] == "creacion_venta"){ ?>green<?php }else{ ?>blue<?php } ?> button">Ventas</a><?php } ?> 
				<?php  if ($rol=='3'){?><a href="index.php?p=consulta_operadores" class=" small radius <?php if($informe == "consulta_operadores" || $_GET['p'] == "consulta_operadores"){ ?>green<?php }else{ ?>blue<?php } ?> button">Operadores</a> <?php } ?> 
				<?php  if ($rol == '2' or $rol=='3'){?> <a href="index.php?p=reportes" class=" small radius <?php if($informe == "reportes"){ ?>green<?php }else{ ?>blue<?php } ?> button">Reportes</a><?php } ?> 
				<?php  if ($rol=='1' or $rol=='2' or $rol=='3'){?><a href="index.php?p=salir" class=" small radius <?php if($informe == "salir"){ ?>green<?php }else{ ?>blue<?php } ?> button">Salir</a><?php } ?> 
			</div>
		</div>
		
		<!-- Submenú para Contactos -->
		<?php 
			if($informe == 'consulta_contactos' || $informe == 'creacion_contacto')
			{
		?>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?p=creacion_contacto" <?php if($_GET['p'] == 'creacion_contacto'){ ?> class="selectedmenu" <?php } ?>>Creacion de Contactos</a> 
				</div>
		</div>
		<?php
			}
		?>
		
		<!-- Submenú para Articulos -->
		<?php 
			if($informe == 'consulta_articulos' || $informe == 'creacion_articulo')
			{
		?>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?p=creacion_articulo" <?php if($_GET['p'] == 'creacion_articulo'){ ?> class="selectedmenu" <?php } ?>>Creacion de Articulos</a> 
			</div>
		</div>
		<?php
			}
		?>
		
	
		
			<!-- Submenú para creacion_venta -->
		<?php 
			if($informe == 'creacion_venta' || $informe == 'consulta_ventas')
			{
		?>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?p=consulta_ventas" <?php if($_GET['p'] == 'consulta_ventas'){ ?> class="selectedmenu" <?php } ?>>Consulta de Ventas</a> 
			</div>
		</div>
		<?php
			}
		?>
		
		
		<!-- Submenú para operadores -->
		<?php 
			if($informe == 'creacion_operador' || $informe == 'consulta_operadores')
			{
		?>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="row centered">
			<div class="twelve columns">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?p=creacion_operador" <?php if($_GET['p'] == 'creacion_operador'){ ?> class="selectedmenu" <?php } ?>>Creacion de Operadores</a> 
			</div>
		</div>
		<?php
			}
		?>
	
	
	
		
		<!-- / Fin submenú para Tiempos de Solución vs ANS 
		
		<br />
		<div class="row">
			<div class="twelve columns">
				<form id="filtros" name="filtros" action="index.php" method="get">
					<input type="hidden" name="p" value="<?=$_GET['p']?>" />
					<?php// if(isset($_GET['s'])){ ?>
					<input type="hidden" name="s" value="<?=$_GET['s']?>" />
					<?php //} ?>
					<div>
						<?php // include('filtros.inc.php'); ?>
					</div>
				</form>
			</div>
		</div>-->

		<?php //include($informe."_body.inc.php"); ?>
		<?php //include($informe.".php"); ?>
		
		
		
		
		<?php
		

		//imprime la pagina
		if($informe == 'consulta_contactos' || $informe == 'consulta_articulos' || $informe == 'creacion_venta' || $informe == 'consulta_operadores' || $informe == 'reportes' 
		         || $informe == 'creacion_articulo' || $informe == 'consulta_venta' || $informe == 'consulta_operadores' || $informe == 'creacion_contacto' || $informe == 'consulta_ventas'
				|| $informe == 'creacion_operador' || $informe == 'consulta_operador' || $informe == 'salir' || $informe == 'login' || $informe == 'control'|| $informe == 'seguridad'
				|| $informe == 'ingreso_venta' || $informe == 'ingreso_actividades' 
				 )
			{
//			include(dirname(__FILE__) .$informe. ".php");
			
			$pagina = include($informe.".php"); 
			}
			else
			{
			
			$pagina = include($informe); 
			}
			
			echo $pagina;
			
			?>
		
				
		<div class="row">
			<div class="ten columns">
				<p>&copy; <?=date("Y")?> Todos los derechos reservados</p>
			</div>
			<div class="two columns">
				<p><a href="#top">Volver Arriba</a></p>
			</div>
		</div>

	</div>
	<!-- container -->

	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/jquery_extra_selectors.js"></script>
	<script src="javascripts/modernizr.foundation.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>