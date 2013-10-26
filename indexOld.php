<!DOCTYPE html>


<?php

include("autocompleta.php");
	?>

<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Menu</title>
		<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="prefix-free.js"></script>
		<script language="JavaScript" src="FuncionesAjax.js"></script>
	</head>

<body>
	<div class="wrap">
	
	
	<nav>
		<ul class="menu">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Contactos</a>
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
			<li><a href="#"> Ventas</a>
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
		<div class="clearfix"></div>
	</nav>
	</div>

	<div id='contenedorPrincipal'>

	

	</div>
	

</body>

</html>