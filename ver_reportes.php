
<?php 
	//*<img src="images/graphics/ReporteArticulos001<?=$sufijo.png" width='380' height='200' />
	//no olvidarse llamar a nuestra archivo de renderizado
	//Seguridad para que una persona logeada con rol 1 no pueda entrar a la pagina
	if($_SESSION["rol"] == "1"){
	echo"<script>alert('Su usuario no tiene permiso de Administrador o Reportes para cargar esta pagina, por favor logeese de nuevo');
		window.location.href=\"index.php?p=login\"</script>"; 
	@session_start();
	session_destroy();
	exit();
	}

	
	 
	 //echo "<img src='images/graphics/ReporteArticulos01.png' width='380' height='200' />";
?>

			   <div class="row">
					<div class="six columns">
						<h4>Ventas de Productos de Mes</h4>
						<br/>
						<img src="images/graphics/Reporte1<?php echo $sufijo?>.png" width='380' height='200' />
						<br/>
						<br/>
						<h4>Actividades  del Mes.</h4>
						<br/>
						<img src="images/graphics/Reporte2<?php echo $sufijo?>.png" width='380' height='200' />
					</div>
					
					<div class="six columns">
						<h4>Ventas articulos NO Promocion VS Promocion</h4>
						<br/>
						<img src="images/graphics/Reporte3<?php echo $sufijo?>.png" width='380' height='200' />
					</div>
					
					<div class="twelve columns">
					<br/>
						<h4>Top 10 Compradores del mes</h4><br />
						<?php echo utf8_encode($tabla_top_compradores_mes); ?> 	<br/>
						<h4>Total Actividades de cada Mes.</h4>
						<br/>
						<img src="images/graphics/Reporte5<?php echo $sufijo?>.png" width='1000' height='100'  />
					</div>
					
				
	



