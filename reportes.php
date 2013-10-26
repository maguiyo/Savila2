<?php


 // Standard inclusions   
	include ("seguridad.php");
	include("pChart/pChart.class");
	include ("conexion.php");
	include ("funciones.php");
	//Seguridad para que una persona logeada con rol 1 no pueda entrar a la pagina
	if($_SESSION["rol"] == "1"){
	echo"<script>alert('Su usuario no tiene permiso de Administrador o Reportes para cargar esta pagina, por favor logeese de nuevo');
		window.location.href=\"index.php?p=login\"</script>"; 
	@session_start();
	session_destroy();
	exit();
	}

	
	$meses_ref = array('01','02','03','04','05','06','07','08','09','10','11','12');
    $sufijo = '';
	if(isset($_GET['mes']) && ($_GET['mes'] <> 'all'))
	{
		$mes = $_GET['mes'];
		$sufijo .= $mes;
	}
	else
		$mes = date("m");
		
	$mes = $meses_ref[$mes-1];
		
	if(isset($_GET['anio']) && ($_GET['anio'] <> 'all'))
	{
		$anio = $_GET['anio'];
		$sufijo .= $anio;
	}
	else
		$anio = date("Y");
	
	if(isset($_GET['operador']) && ($_GET['operador'] <> 'all'))
	{
		$operador = $_GET['operador'];
		$sufijo .= $operador;
	}
	else
		$operador ='%';
	
	$sufijo = md5($sufijo);
			
	//****************** Filtros******************
	?>
		<!-- Included CSS Files -->
	<link rel="stylesheet" href="stylesheets/foundation.css">
	<link rel="stylesheet" href="stylesheets/app.css">
	<link rel="stylesheet" href="stylesheets/grid.css">
	<link rel="stylesheet" href="stylesheets/ui.css">
	<link rel="stylesheet" href="stylesheets/forms.css">
	
	<link rel="stylesheet" href="styleTable.css">

<style>
body {padding-bottom:130px}
#scripinty {height:130px; width:100%; position:fixed; bottom:0; left:0; margin:0; background:#666; min-width:900px; z-index:9999}
#scripintyleft {float:left; padding:30px 0 0 35px}
#scripintyleft h1 {font:18px 'Trebuchet MS',Verdana; color:#fff; text-shadow:1px 1px #000}
#scripintyleft p {color:#aaa; font-size:16px; font-style:italic}
#scripintyleft p a {color:#eee; text-decoration:none}
#scripintyleft p a:hover {color:#fff}
#scripintyleft span {font:15px Arial,Verdana; color:#ddd; text-shadow:1px 1px #444}
#scriptinyright {float:right; padding:10px 15px 0; height:120px; width:300px; background:#555}
#bsap_aplink {float:right; font-size:10px; margin:0; padding:4px 0 0; color:#eee; text-shadow:none}
#bsap_aplink:hover {color:#fff}
body .one .bsa_it_ad {border:none; background:transparent; font-family:inherit; padding:0; margin:0; text-align:right}
body .one .bsa_it_ad .bsa_it_i {float:right; padding:0; margin:0 0 0 13px}
body .one .bsa_it_ad .bsa_it_i img {padding:0; border:none; margin-top:3px}
body .one .bsa_it_ad .bsa_it_t {padding:0; font-size:13px; color:#eee; text-shadow:1px 1px #444; margin-bottom:6px}
body .one .bsa_it_ad .bsa_it_t:hover {color:#fff}
body .one .bsa_it_p {display:none}
body .one .bsa_it_ad .bsa_it_d {font:12px Arial,Verdana; color:#ccc; text-shadow:#444 1px 1px}
.add_insert{width:468px;height:60px;float:left;border:0px solid red;margin-left: 492px;margin-top: -42px;}
</style>
	
	
	<div class="row">
			<div class="twelve columns">

				<form id="filtros" name="filtros" action="index.php?p=reportes" method="get">
					<div>
						<?php include('filtros.php'); ?>
					</div>
				</form>
			</div>
		</div>
	
	
	
	<?php

	
	
	
	
	
	//****************** 1. Porcentaje de las Ventas de Productos de Mes ******************
	/*
	echo $anio;
	echo $mes;
	echo $operador;
	*/
	$datos = array();
	$etiquetas = array();
	$sentencia1 = Sentencia1($mes,$anio,$operador);
	$resultado = mysql_query($sentencia1, $conexion);
	
	if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			mysql_free_result( $resultado );
			$cantidad=array();
			$etiquetas=array();
				if(count($lista)) {
				foreach($lista as $datos){
				$cantidad[]=$datos['total'];	
				$etiquetas[]=$datos['nombre_a'];
				}
				GraficoTorta("Reporte1".$sufijo, $cantidad, $etiquetas, $radio=200);
				
				//Barrido de informacion para que no afecte los demas reportes
				
				}
				unset($etiquetas);
				unset($cantidad);
				unset($lista);
				unset($fila);
				unset($resultado);
		}
	
	//****************** 2. Porcentaje de Actividades  del Mes. ******************
		
		$datos = array();
	$etiquetas = array();
	$sentencia2 = Sentencia2($mes,$anio,$operador);
	$resultado = mysql_query($sentencia2, $conexion);
	//echo $sentencia2;
	if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			mysql_free_result( $resultado );
			$cantidad=array();
			$etiquetas=array();
				if(count($lista)) {
				foreach($lista as $datos){
				$cantidad[]=$datos['total'];	
				if ($datos['tipo_actividad'] == 1 ) {
				array_push($etiquetas,"No se pudo contactar con el usuario");
				}
				if ($datos['tipo_actividad'] == 2 ) {
				array_push($etiquetas,"El usuario contesto pero no estuvo interesado en la compra");
				}
				if ($datos['tipo_actividad'] == 3 ) {
				array_push($etiquetas,"El usuario contesto y estuvo interesado en la compra");
				}
				if ($datos['tipo_actividad'] == 4 ) {
				array_push($etiquetas,"Otras razones");
				}				
				}
				
				
				
				GraficoTorta("Reporte2".$sufijo, $cantidad, $etiquetas, $radio=200);
				
				//Barrido de informacion para que no afecte los demas reportes
				
				}
				unset($etiquetas);
				unset($cantidad);
				unset($lista);
				unset($fila);
				unset($resultado);
		}	
		
		
		
		
		
		
		
		
		
		
		
	
	//****************** 3. Porcentaje de ventas artículos  NO Promoción VS Promoción ******************
	/*
	echo $anio;
	echo $mes;
	echo $operador;
	*/
	
	$cantidad = array();
	$datos = array(0,0);
	
	$sentencia3 = Sentencia3($mes,$anio,$operador);
	$resultado = mysql_query($sentencia3, $conexion);
	//echo $sentencia3;
	
	if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			mysql_free_result( $resultado );
			$cantidad=array();
			$etiquetas = array();
				if(count($lista)) {
				foreach($lista as $datos){
				$cantidad[]=$datos['total'];
				if ($datos['promocion_a'] == 0 ) {
				array_push($etiquetas,"Sin Promocion");
				}
				if ($datos['promocion_a'] == 1 ) {
				array_push($etiquetas,"Con Promocion");
				}	
				}

				GraficoTorta("Reporte3".$sufijo, $cantidad, $etiquetas, $radio=200);
				}
				unset($etiquetas);
				unset($cantidad);
				unset($lista);
				unset($fila);
				unset($resultado);
		}
 
 
 
 
 
 
 
 
 	//****************** 4. Top Compradores del mes   ******************
	$datos = array();
	$etiquetas = array();
	$sentencia4 = Sentencia4($mes,$anio,$operador);
	$resultado = mysql_query($sentencia4, $conexion);
	//echo $sentencia4;
	if(count($resultado))
	{
		if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			
			mysql_free_result( $resultado );
			$cantidad=array();
			$etiquetas = array();
				if(count($lista)) {
				$encabezado = array("#","Usuario","Cantidad");
				
					$tabla_top_compradores_mes = Tabla($encabezado, $lista);
				}
				unset($etiquetas);
				unset($cantidad);
				unset($lista);
				unset($fila);
		}		
	}
	else
	{
		$tabla_top_compradores_mes = "";
	}	
 
 
 
 	//****************** 5. Total Actividades / Ventas de cada Mes.   ******************
	$encabezados = array();
	$etiquetas = array();
	$datos_array = array();
	
	
	$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	$encabezados = array('Actividades','Ventas');
	
	$sentencia5 = Sentencia5a($mes,$anio,$operador);
	$resultado = mysql_query($sentencia5, $conexion);

	if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			mysql_free_result( $resultado );
			$cantidad1=array();
			
			
				if(count($lista)) {
				foreach($lista as $datos){
				//for($i=0; $i<count($lista); $i++)
				//{
					$mes = $datos['mes']-1;
					$cantidad1 [$mes] = $datos['total'];	
					
				}
				if ($cantidad1[0] == null) $cantidad1[0] = null;
				if ($cantidad1[1] == null) $cantidad1[1] = null;
				if ($cantidad1[2] == null) $cantidad1[2] = null;
				if ($cantidad1[3] == null) $cantidad1[3] = null;
				if ($cantidad1[4] == null) $cantidad1[4] = null;
				if ($cantidad1[5] == null) $cantidad1[5] = null;
				if ($cantidad1[6] == null) $cantidad1[6] = null;
				if ($cantidad1[7] == null) $cantidad1[7] = null;
				if ($cantidad1[8] == null) $cantidad1[8] = null;
				if ($cantidad1[9] == null) $cantidad1[9] = null;
				if ($cantidad1[10] == null) $cantidad1[10] = null;
				if ($cantidad1[11] == null) $cantidad1[11] = null;
				
				unset($etiquetas);
				unset($lista);
				unset($fila);
				unset($resultado);
				
				
				//print_r ($cantidad);
				//GraficoBarras('Reporte5'.$sufijo, $cantidad, '', $etiquetas);
				
				
				//Barrido de informacion para que no afecte los demas reportes
				
				}
				
		}

		
		
	$sentencia5b = Sentencia5b($mes,$anio,$operador);
	$resultado = mysql_query($sentencia5b, $conexion);
	
	if(count($resultado) ){
			while( $fila = mysql_fetch_array($resultado) ){
				$lista[] = $fila;
			}
			mysql_free_result( $resultado );
					
				if(count($lista)) {
				foreach($lista as $datos){
				//for($i=0; $i<count($lista); $i++)
				//{
					$mes = $datos['mes']-1;
					$cantidad2 [$mes] = $datos['total'];	
					
				}
				if ($cantidad2[0] == null) $cantidad2[0] = null;
				if ($cantidad2[1] == null) $cantidad2[1] = null;
				if ($cantidad2[2] == null) $cantidad2[2] = null;
				if ($cantidad2[3] == null) $cantidad2[3] = null;
				if ($cantidad2[4] == null) $cantidad2[4] = null;
				if ($cantidad2[5] == null) $cantidad2[5] = null;
				if ($cantidad2[6] == null) $cantidad2[6] = null;
				if ($cantidad2[7] == null) $cantidad2[7] = null;
				if ($cantidad2[8] == null) $cantidad2[8] = null;
				if ($cantidad2[9] == null) $cantidad2[9] = null;
				if ($cantidad2[10] == null) $cantidad2[10] = null;
				if ($cantidad2[11] == null) $cantidad2[11] = null;
				
				/*
				
			for($i=0; $i<13; $i++)
					{
						$tmp_array = array(0,0);
						
						for($j=0; $j<3; $j++)
						{
							$tmp_array[0] = $cantidad1[$i];
							$tmp_array[1] = $cantidad2[$i];
						
						}
						
						$datos_array[] = $tmp_array;
					}
		*/
		
		//Organiza la informacion del primer query
		$datos1 = array();
			for($i=0; $i<count($cantidad1); $i++)
		{
			$datos1[$i] = $cantidad1[$i];
		}
		
		//Organiza la informacion del segundo query
		$datos2 = array();
			for($i=0; $i<count($cantidad2); $i++)
		{
			$datos2[$i] = $cantidad2[$i];
		}
		
		
			
						$etiqueta = 
			$etiqueta2 = "Ventas";
			 Grafico2Barras("Reporte5".$sufijo, $datos1, 'Actividades' , $datos2,'Ventas' , $meses);
				//GraficoxBarras("Reporte5".$sufijo, $datos_array, $etiquetas, $encabezados);
				
				//GraficoxBarras("Reporte5".$sufijo, $cantidad, $etiquetas, $encabezados);
				//print_r ($cantidad);
				//GraficoBarras('Reporte5'.$sufijo, $cantidad, '', $etiquetas);
				
				
				//Barrido de informacion para que no afecte los demas reportes
				
				}
					
				
				unset($etiquetas);
				unset($cantidad);
				unset($cantidad1);
				unset($cantidad2);
				unset($lista);
				unset($fila);
				unset($resultado);
		}
		
		
		
 
 
 
 
 
 
 
 
 
 
  //Reporte 3 - Porcentaje de ventas artículos  NO Promoción VS Promoción
   //nombreA son las ETIQUETAS 
   
 
 
 
 include("ver_reportes.php");
 
?>