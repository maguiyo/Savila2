<?php


 // Standard inclusions   
	
	include("pChart/pChart.class");
	include ("conexion.php");
	include ("funciones.php");
	
	
	
	
	$rs = mysql_query("select sum(cantidad) as total,nombre_a from venta group by nombre_a asc;", $conexion);
	if( $rs ){
			while( $fila = mysql_fetch_array($rs) ){
				$lista[] = $fila;
			}
			mysql_free_result( $rs );
		}
		
	$cantidad=array();
	$nombreA=array();
	foreach($lista as $datos){
	$cantidad[]=$datos['total'];	
	$nombreA[]=$datos['nombre_a'];
	
 }
 
   //Reporte 1 - Cantidad Articulos por Mes 
   //nombreA son las ETIQUETAS 
   
  $nombre_archivo="ReporteArticulos01";
  $datos = $cantidad;
   
  GraficoTorta($nombre_archivo, $datos, $nombreA, $radio=200); 
		
 
?>