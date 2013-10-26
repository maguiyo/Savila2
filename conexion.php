<?php
	
	$host = "localhost";
    $usuario  = "root";
    $contrasena  = "";
	$db_name = "mg1";
	
$conexion = mysql_connect($host,$usuario,$contrasena);

	if($conexion){

		//echo "conectado<br>";

	}else{

		echo "No hay Conexion";


}


$base = mysql_select_db($db_name);

	if($base){

		//echo "Conectado a las base de datos: ".$db;

	}else{

		echo "Error en la base de datos";


}
	/*
function consultar($ConsultaSQL) 
	{
		$resultados = 0;
		try
		{
			$resultados = mysql_query($ConsultaSQL, $conexion); ;
		}
		catch(PDOException $e)
    	{
    		echo 'No fue posible ejecutar la consulta "'.$ConsultaSQL.'" en la base de datos: '.$e->getMessage();
    	}
		return $resultados;
	}

*/
	

?>