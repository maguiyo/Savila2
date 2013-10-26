<?php
	
	//Retorna la fecha menos 6 meses
	function FechaInicial6m($mes, $anio)
	{
	
		return $anio.$mes."01";
	}

	//Retorna la fecha del primer día del mes
	function FechaInicial1m($mes, $anio)
	{
		$meses = array('01','02','03','04','05','06','07','08','09','10','11','12');
	
		$mes--;
		$anio_ini = $anio;
		$mes_ini = $meses[$mes];
		if($mes == 1)
			$mes_ini--;
			
		return $anio_ini.$mes_ini."01";
	}

	//Retorna la fecha calculando hasta el último día del mes
	function FechaFinal($mes, $anio)
	{
		$meses = array('01','02','03','04','05','06','07','08','09','10','11','12');
		$anio_ini = $anio;

		if($mes == 12)
		{
			$mes_fin = '01';
			$anio_ini++;
		}
		else
		{
			$mes--;
			$mes_fin = $meses[$mes+1];
		}
		
		return $anio_ini.$mes_fin."01";
	}

	//1 QUERY:% de Porcentaje de las Ventas de Productos de Mes
	function Sentencia1($mes, $anio,$operador='%')
	{			
		$fecha_ini = FechaInicial6m($mes, $anio);
		$fecha_fin = FechaFinal($mes, $anio);
		
		$sentencia = "SELECT sum(cantidad) as total,nombre_a FROM venta
						WHERE DATE(fecha) BETWEEN '$fecha_ini' AND '$fecha_fin'
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by nombre_a asc
						ORDER BY 1
						";
		
		return $sentencia;
	}
	
	
	//1 QUERY:% de Porcentaje de Actividades  del Mes.
	function Sentencia2($mes, $anio,$operador='%')
	{			
		$fecha_ini = FechaInicial6m($mes, $anio);
		$fecha_fin = FechaFinal($mes, $anio);
		
		$sentencia = "SELECT sum(1) as total,tipo_actividad FROM actividades
						WHERE DATE(fecha) BETWEEN '$fecha_ini' AND '$fecha_fin' 
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by tipo_actividad asc
						ORDER BY 1
						";
		
		return $sentencia;
	}
	
	
	
	
	//3 QUERY:% de Porcentaje de ventas artículos  NO Promoción VS Promoción
	function Sentencia3($mes, $anio,$operador='%')
	{			
		$fecha_ini = FechaInicial6m($mes, $anio);
		$fecha_fin = FechaFinal($mes, $anio);

		$sentencia = "SELECT sum(cantidad) as total,promocion_a FROM venta
						WHERE DATE(fecha) BETWEEN '$fecha_ini' AND '$fecha_fin'   
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by promocion_a asc
						ORDER BY 1";
		
		return $sentencia;
	}
	
	//4 QUERY:% de Top Compradores del mes  
	function Sentencia4($mes, $anio,$operador='%')
	{			
		$fecha_ini = FechaInicial6m($mes, $anio);
		$fecha_fin = FechaFinal($mes, $anio);

		$sentencia = "SELECT 1,nombre_c,sum(cantidad) as total FROM venta
						WHERE DATE(fecha) BETWEEN '$fecha_ini' AND '$fecha_fin'
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by nombre_c 
						ORDER BY 3 desc
						LIMIT 10";
		
		return $sentencia;
	}
	
	
	//5 QUERY:% de Total Actividades/Ventas de cada Mes.
	function Sentencia5a($mes, $anio,$operador='%')
	{			
		

		$sentencia = "SELECT MONTH( fecha ) AS mes,sum(1) AS total FROM actividades
						WHERE YEAR(fecha) like '$anio' 
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by mes 
						ORDER BY 1 desc
						";
		
		return $sentencia;
	}
	
		//5 QUERY:% de Total Ventas de cada Mes.
	function Sentencia5b($mes, $anio,$operador='%')
	{			
		

		$sentencia = "SELECT MONTH( fecha ) AS mes,sum(1) AS total  FROM venta
						WHERE YEAR(fecha) like '$anio' 
							";

		if($operador <> '%')
			$sentencia .= "AND vendedor like '$operador' ";
			
		$sentencia .= "GROUP by mes 
						ORDER BY 1 desc
						";
		
		return $sentencia;
	}
	
	
	
	
	
	
	
	
	//******************* Consultas para Filtros *******************
	//Operadores
	function SetenciaOperadores()
	{
		$sentencia = "SELECT distinct nombre
						FROM operadores
						WHERE activo = 1
						 ";
		
		return $sentencia;
	}



	

?>