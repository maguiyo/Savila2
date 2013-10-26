	<?php 
	include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
include("autocompleta.php");
	$TipoRegistro1=$_POST['Registro1'];
	$nombre1=$_POST['nombre_c1'];
	
	//Realizar una consulta MySQL
	if($nombre1){
	$query = "SELECT nombre,direccion,telefono,celular FROM contactos where nombre like '%$nombre1%'  ";
	//$query = "SELECT direccion,telefono FROM contactos where nombre like '%Mago%' ";
	// $query = "SELECT direccion,telefono FROM contactos";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	
	if( $row = mysql_fetch_array ( $result )) {
   $telefono1= $row [ "telefono" ];
   $direccion1= $row [ "direccion" ];
   $nombre_c1= $row [ "nombre" ];
   $celular1= $row [ "celular" ];
   }
   mysql_free_result($result);	
    }
	
	if($TipoRegistro1 == '1')
			{
?>
	<div id="Venta1" >   
     <p align="center" > Registro de Venta  </p>
	<form method="post" action ='index.php?p=creacion_venta'>
	<strong>Nombre Contacto:</strong>   <input id="tagsC" name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	
     <?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 ?>
	
    <input name="Buscar" type="submit"  value="Consulta" />
	</form>
	
	
	<form method="post" action ='index.php?p=ingreso_venta'>
	<input type ="hidden"  name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
	 <?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 ?>
	<input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
	<input type ="hidden"  name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" >
	<input type ="hidden"  name="ConfirmacionBoton1" value="1" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c1' size='30' border ='0' readonly="readonly" value="<?php echo $direccion1 ?>"> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c1' size='30'   readonly="readonly" value="<?php echo $telefono1 ?>">  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c1' size='30'   readonly="readonly" value="<?php echo $celular1 ?>">  
	<strong>Art&iacuteculo: </strong>  <input id="tagsA" name="nombre_a1" value="<?php echo $nombre_a1 ?>"> 
   <strong> Cantidad: </strong>  <input type = 'text' name='cantidad1' size='10' value="<?php echo $cantidad1 ?>"> 
	<strong>Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha1" value="<?php echo $fecha1 ?>"> 
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
	</div>
	
	<?php } ?>
<?php 
	if($TipoRegistro1 == '2'){
?>
	
	<div id="Actividad1" >   
     <p align="center" > Registro de Actividades  </p>
	<form method="post">
	<strong>Nombre Contacto: </strong>  <input id="tagsC" name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	
		 <?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 ?>
    <input name="Buscar" type="submit"  value="Consulta" /><br>	
	</form>
	<form method="post" action ='index.php?p=ingreso_actividades'>
	<?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 ?>
	<input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
	<input type ="hidden"  name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" >
	<input type ="hidden"  name="ConfirmacionBoton1" value="1" >
	<input type ="hidden"  name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c1' size='30' border ='0' readonly="readonly" value="<?php echo $direccion1 ?>"/> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c1' size='30'   readonly="readonly" value="<?php echo $telefono1 ?>"/>  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c1' size='30'   readonly="readonly" value="<?php echo $celular1 ?>"/>  
	<strong>Tipo Actividad:  </strong> 
		<SELECT NAME="tipo_actividad1"> 
		<OPTION SELECTED VALUE=0> Escoga un Tipo Actividad </option>
		<OPTION VALUE=1> No se pudo contactar con el usuario </option>
		<OPTION VALUE=2> El usuario contesto pero no estuvo interesado en la compra </option>
		<OPTION VALUE=3> El usuario contesto y estuvo interesado en la compra </option>
		<OPTION VALUE=4> Otras razones </option>
		</SELECT>
	
    <strong> Descripcion: </strong>  <textarea id="descripcion" name="descripcion1" rows="5" cols="50"></textarea>
	<strong> Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha1" />
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
	</div>
	
	<?php 
	} 
	if($TipoRegistro1 == '3'){
?>
	<h5>Se ha Registrado en el sistema con exito . </h5>
	
	<?php 
	} 
?>
	