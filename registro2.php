	
<?php 
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
include("autocompleta.php");
//Realizar una consulta MySQL
	if($nombre2){
	$query = "SELECT nombre,direccion,telefono,celular FROM contactos where nombre like '%$nombre2%'  ";
	//$query = "SELECT direccion,telefono FROM contactos where nombre like '%Mago%' ";
	// $query = "SELECT direccion,telefono FROM contactos";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	
	if( $row = mysql_fetch_array ( $result )) {
   $telefono2= $row [ "telefono" ];
   $direccion2= $row [ "direccion" ];
   $nombre_c2= $row [ "nombre" ];
   $celular2= $row [ "celular" ];
   }
   mysql_free_result($result);	
    }

	
	$TipoRegistro2=$_POST['Registro2'];
	if($TipoRegistro2 == '1')
			{
?>
	
    <div class="contacto">   
     <p align="center" > Registro de Venta  </p>
	<form method="post">
	<strong>Nombre Contacto:</strong>   <input id="tagsC2" name="nombre_c2" value="<?php echo $nombre_c2 ?>" >
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	
		 <?php //LOS VALORES DE LOS DEMAS DIVS  
		 include("form1.php");
		 ?>

    <input name="Buscar" type="submit"  value="Consulta" />
	</form>
	<form method="post" action ='index.php?p=ingreso_venta'>
	<input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
	<input type ="hidden"  name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" >
	<input type ="hidden"  name="ConfirmacionBoton2" value="1" >
	<input type ="hidden"  name="nombre_c2" value="<?php echo $nombre_c2 ?>" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c2' size='30' border ='0' readonly="readonly" value="<?php echo $direccion2 ?>"> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c2' size='30'   readonly="readonly" value="<?php echo $telefono2 ?>">  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c2' size='30'   readonly="readonly" value="<?php echo $celular2 ?>">  
	<strong>Art&iacuteculo: </strong>  <input id="tagsA2" name="nombre_a2" value="" >
   <strong> Cantidad: </strong>  <input type = 'text' name='cantidad2' size='10' value = ""> 
	<strong>Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha2" />
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
	</div>
	
	<?php } ?>
<?php 
	if($TipoRegistro2 == '2'){
?>
	
    <div align="center" class="contacto">   
     <p align="center" > Registro de Actividades  </p>
	<form method="post">
	<strong>Nombre Contacto: </strong>  <input id="tagsC2" name="nombre_c2" value="<?php echo $nombre_c2 ?>" >
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	<?php //LOS VALORES DE LOS DEMAS DIVS 
	include("form1.php");
	?>

    <input name="Buscar" type="submit"  value="Consulta" /><br>	
	</form>
	<form method="post" action ='index.php?p=ingreso_actividades'>
	<?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form1.php");
	 ?>
	<input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
	<input type ="hidden"  name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" >
	<input type ="hidden"  name="ConfirmacionBoton2" value="1" >
	<input type ="hidden"  name="nombre_c2" value="<?php echo $nombre_c2 ?>" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c2' size='30' border ='0' readonly="readonly" value="<?php echo $direccion2 ?>"/> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c2' size='30'   readonly="readonly" value="<?php echo $telefono2 ?>"/>  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c' size='30'   readonly="readonly" value="<?php echo $celular2 ?>"/>  
	<strong>Tipo Actividad:  </strong> 
		<SELECT NAME="tipo_actividad2"> 
		<OPTION SELECTED VALUE=0> Escoga un Tipo Actividad </option>
		<OPTION VALUE=1> No se pudo contactar con el usuario </option>
		<OPTION VALUE=2> El usuario contesto pero no estuvo interesado en la compra </option>
		<OPTION VALUE=3> El usuario contesto y estuvo interesado en la compra </option>
		<OPTION VALUE=4> Otras razones </option>
		</SELECT>
	
    <strong> Descripcion: </strong>  <textarea id="descripcion" name="descripcion2" rows="5" cols="50"></textarea>
	<strong> Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha2" />
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
</div>
	<?php 
	} 
?>
	
	
	<?php 
	if($TipoRegistro2 == '3'){
?>
	<h5>Se ha Registrado en el sistema con exito . </h5>
	
	<?php 
	} /////////////////////////////////////
?>
	

	</div>