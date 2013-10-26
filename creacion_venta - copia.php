
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
	
	$nombre=$_POST['nombre_c'];
	
	
	//Realizar una consulta MySQL
	if($nombre){
	$query = "SELECT nombre,direccion,telefono,celular FROM contactos where nombre like '%$nombre%'  ";
	//$query = "SELECT direccion,telefono FROM contactos where nombre like '%Mago%' ";
	// $query = "SELECT direccion,telefono FROM contactos";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	
	if( $row = mysql_fetch_array ( $result )) {
   $telefono= $row [ "telefono" ];
   $direccion= $row [ "direccion" ];
   $nombre_c= $row [ "nombre" ];
   $celular= $row [ "celular" ];
   }
   mysql_free_result($result);	
    }else{
	
	
 }
?>
	<br>
	<div class="row">  
	<br>
	<form method="post" action="index.php?p=creacion_venta.php" >
	<SELECT NAME="TipoRegistro"> 
	<OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
	<OPTION VALUE=1> Registrar Venta </option>
	<OPTION VALUE=2> Registrar Actividad </option>  
	</SELECT>
	<input type="submit" value="---">
	</form>
	
	
<?php 

	$TipoRegistro = $_POST['TipoRegistro']; 
	//echo "Tipo de Registro :".$TipoRegistro."----------";
	
	if($TipoRegistro == '1')
			{
?>
	
    <div class="contacto">   
     <p align="center" > Registro de Venta  </p>
	<form method="post">
	<strong>Nombre Contacto:</strong>   <input id="tagsC" name="nombre_c" value="<?php echo $nombre_c ?>" >
	<input type="hidden" name="TipoRegistro" value="<?php echo $TipoRegistro ?>" />
    <input name="Buscar" type="submit"  value="Consulta" />
	</form>
	<form method="post" action ='ingreso_venta.php'>
	<input type ="hidden"  name="nombre_c" value="<?php echo $nombre_c ?>" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c' size='30' border ='0' readonly="readonly" value="<?php echo $direccion ?>"> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c' size='30'   readonly="readonly" value="<?php echo $telefono ?>">  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c' size='30'   readonly="readonly" value="<?php echo $celular ?>">  
	<strong>Art&iacuteculo: </strong>  <input id="tagsA" name="nombre_a" value="" >
   <strong> Cantidad: </strong>  <input type = 'text' name='cantidad' size='10' value = ""> 
	<strong>Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha" />
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
	</div>
	
	<?php 
	}
?>
	
		
	
<?php 

	//$TipoRegistro = $_POST['TipoRegistro']; 
	//echo "Tipo de Registro :".$TipoRegistro."----------";
	
	if($TipoRegistro == '2')
			{
?>
	
    <div align="center" class="contacto">   
     <p align="center" > Registro de Actividades  </p>
	<form method="post">
	<strong>Nombre Contacto: </strong>  <input id="tagsC" name="nombre_c" value="<?php echo $nombre_c ?>" >
	<input type="hidden" name="TipoRegistro" value="<?php echo $TipoRegistro ?>" >
    <input name="Buscar" type="submit"  value="Consulta" /><br>	
	</form>
	<form method="post" action ='ingreso_actividades.php'>
	<input type ="hidden"  name="nombre_c" value="<?php echo $nombre_c ?>" >
	<input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
    <strong>Direcci&oacuten del Contacto:</strong>   <input type = 'text' class="nobord" name='direccion_c' size='30' border ='0' readonly="readonly" value="<?php echo $direccion ?>"/> 
	<strong>Telefono:</strong>  <input type = 'text' class="nobord" name='telefono_c' size='30'   readonly="readonly" value="<?php echo $telefono ?>"/>  
	<strong>Celular:</strong> <input type = 'text' class="nobord" name='celular_c' size='30'   readonly="readonly" value="<?php echo $celular ?>"/>  
	<strong>Tipo Actividad:  </strong> 
		<SELECT NAME="tipo_actividad"> 
		<OPTION SELECTED VALUE=0> Escoga un Tipo Actividad </option>
		<OPTION VALUE=1> No se pudo contactar con el usuario </option>
		<OPTION VALUE=2> El usuario contesto pero no estuvo interesado en la compra </option>
		<OPTION VALUE=3> El usuario contesto y estuvo interesado en la compra </option>
		<OPTION VALUE=4> Otras razones </option>
		</SELECT>
	
    <strong> Descripcion: </strong>  <textarea id="descripcion" name="descripcion" rows="5" cols="50"></textarea>
	<strong> Fecha (formato dia-mes-a&ntilde;o): </strong> <input type="text" name="fecha" />
    <input name="Registrar" type="submit"  value="Registrar" />
	</form>
	</div>
	
	<?php 
	}
?>
	
	
	</div>
	
	
	<?php
	
	$nuevafecha = date('Y-m-d', strtotime($fecha));
	
	
	mysql_close($conexion);
		
?>

</body>
	</html>