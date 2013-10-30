<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$conC = "select nombre from contactos where activo = 1";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
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
				
		$( ".tagsC" ).autocomplete({
			source: availableTags
		});
	});
	
	</script>

<?php

	$conA = "select nombre, promocion from articulos where activo = 1";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
	$queryA = mysql_query($conA);
	while($row= mysql_fetch_array($queryA)) {//se reciben los valores y se almacenan en un arreglo
  		$elementosA[]= '"'.$row['nombre'].'"';
		$dicElementos[$row['nombre']]= $row['promocion'];
	}
	$arregloA= implode(", ", $elementosA);//junta los valores del array en una sola cadena de texto

?>
    
<script>
var dicElementos = eval(<?php echo json_encode($dicElementos); ?>);

$(function() {	
	
	var availableTags=new Array(<?php echo $arregloA; ?>);//imprime el arreglo dentro de un array de javascript
			
	$( ".tagsA" ).autocomplete({
		source: availableTags
	});
});

</script>
	
	
	

