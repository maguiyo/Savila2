




<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$conC = "select * from contactos where activo = 1";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$queryC = mysql_query($conC);

	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($queryC)) {//se reciben los valores y se almacenan en un arreglo
      $elementosC[]= '"'.$row['nombre'].'"';
	  
}
$arregloC= implode(", ", $elementosC);//junta los valores del array en una sola cadena de texto
		?>	
		
		var availableTags=new Array(<?php echo $arregloC; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#tagsC" ).autocomplete({
			source: availableTags
		});
	});
	</script>

	<?php

$conA = "select * from articulos where activo = 1";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$queryA = mysql_query($conA);

	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($queryA)) {//se reciben los valores y se almacenan en un arreglo
      $elementosA[]= '"'.$row['nombre'].'"';
	  
}
$arregloA= implode(", ", $elementosA);//junta los valores del array en una sola cadena de texto
		?>	
		
		var availableTags=new Array(<?php echo $arregloA; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#tagsA" ).autocomplete({
			source: availableTags
		});
	});
	</script>