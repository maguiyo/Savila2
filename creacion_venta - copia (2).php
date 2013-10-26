<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#Registro1").change(function(){
    alert("The text has been changed.");
  });
});
</script>

<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
include("autocompleta.php");
	?>
<html>
	<head>
		<title>
			Registro de Venta
		</title>
	</head>
	<body>	
 
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
.nobord { border-style: solid; border-width: 0; padding: 0 }
</style>
	



<?php
	
	$nombre1=$_POST['nombre_c1'];
	$nombre2=$_POST['nombre_c2'];
	
	
	$direccion2=$_POST['direccion2'];
	$telefono2=$_POST['telefono2'];
	$celular2 =$_POST['celular2'];
	$nombre_a2 =$_POST['nombre_a2'];
	$cantidad2 =$_POST['cantidad2'];
	$fecha2 =$_POST['fecha2'];
	$tipo_actividad2 =$_POST['tipo_actividad2'];
	$descripcion2 =$_POST['descripcion2'];
	
	
	
	$direccion1=$_POST['direccion1'];
	$telefono1=$_POST['telefono1'];
	$celular1 =$_POST['celular1'];
	$nombre_a1 =$_POST['nombre_a1'];
	$cantidad1 =$_POST['cantidad1'];
	$fecha1 =$_POST['fecha1'];
	$tipo_actividad1 =$_POST['tipo_actividad1'];
	$descripcion1 =$_POST['descripcion1'];
	
	
	
	
	
	
	
	
	

	$TipoRegistro1 = $_POST['TipoRegistro1']; 
	$TipoRegistro2 = $_POST['TipoRegistro2']; 
	
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
	
	
	
	
	
?>
	<br>
	<div class="row">  
	<br>
	<form method="post" action="index.php?p=creacion_venta" >
	<SELECT id="Registro1" NAME="TipoRegistro1"> 
	<OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
	<OPTION VALUE=1> Registrar Venta </option>
	<OPTION VALUE=2> Registrar Actividad </option>  
	</SELECT>
	
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />	
		
	 <?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 include("form1.php");
	 ?>
	

	<input type="submit" value="---">
	</form>
	
	
<?php 

	
	//echo "Tipo de Registro1     ----:".$TipoRegistro1."----------";
	echo $articulo;
	if($TipoRegistro1 == '1')
			{
?>
	
    <div class="contacto">   
     <p align="center" > Registro de Venta  </p>
	<form method="post">
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
	
    <div align="center" class="contacto">   
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
?>
	
	
	<?php 
	if($TipoRegistro1 == '3'){
?>
	<h5>Se ha Registrado en el sistema con exito . </h5>
	
	<?php 
	} /////////////////////////////////////
?>
	
	
	
	
	
	
	
	</div>
	
	
	
	
	<br>
	<div class="row">  
	<br>
	<form method="post" action="index.php?p=creacion_venta" >
	<SELECT NAME="TipoRegistro2"> 
	<OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
	<OPTION VALUE=1> Registrar Venta </option>
	<OPTION VALUE=2> Registrar Actividad </option>  
	</SELECT>
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	
	<?php //LOS VALORES DE LOS DEMAS DIVS  
		 include("form1.php");
		 include("form2.php");
		 ?>

	
	
	<input type="submit" value="---">
	</form>
	
	
<?php 

	
	
	//echo "Tipo de Registro2     ----:".$TipoRegistro2."----------";
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
	
	
	
	
	
	
	
	
	
	<?php
	
	$nuevafecha = date('Y-m-d', strtotime($fecha));
	
	
	mysql_close($conexion);
		
?>

</body>
	</html>