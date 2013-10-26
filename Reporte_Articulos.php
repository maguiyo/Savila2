<?php


 // Standard inclusions   
	
	include("pChart/pChart.class");
	include ("conexion.php");
	include ("funciones.php");
	include("sentencias.php");
	
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
	<div class="row">
			<div class="twelve columns">
				<form id="filtros" name="filtros" action="Reporte_Articulos.php" method="get">
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
				}
		}
	
		
	
	//****************** 1. Porcentaje de las Ventas de Productos de Mes ******************
	
 
 
   //Reporte 1 - Porcentaje de las Ventas de Productos de Mes
   //nombreA son las ETIQUETAS 
   
//  $nombre_archivo="ReporteArticulos01";
//  $datos = $cantidad;
   
//  GraficoTorta($nombre_archivo, $datos, $nombreA, $radio=200); 
		
 
 //Reporte 2 -Porcentaje de Actividades  del Mes.
   //nombreA son las ETIQUETAS 
   
 
 
 
 
  //Reporte 3 - Porcentaje de ventas artículos  NO Promoción VS Promoción
   //nombreA son las ETIQUETAS 
   
 
 
 
 include("Ver_Reporte_Articulos.php");
 
?>