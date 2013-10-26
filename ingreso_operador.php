<?php
	include ("conexion.php");
	
	if(($_SESSION["rol"] == "1") or ($_SESSION["rol"] == "2")){
	echo"<script>alert('Su usuario no tiene permiso de Administrador para cargar esta pagina, por favor logeese de nuevo');
		window.location.href=\"index.php?p=login\"</script>"; 
	@session_start();
	session_destroy();
	exit();
	}
	
	mysql_connect("$host","$usuario", "$contrasena") or die ("No se puedo realizar la conexion");
	mysql_select_db("$db_name") or die ("No se puedo escoger la base de datos"); ;
	
	
	
	//$sql="INSERT INTO CONTACTOS (nombre,direccion,telefono) VALUES ('$var1',$var2',$var3')";
	$sql="INSERT INTO OPERADORES (login,nombre,password,rol,activo) VALUES ('$_POST[login]','$_POST[nombre]','$_POST[password]','$_POST[rol]','1')";
	
	?>
	<link rel="stylesheet" href="styleTable.css">
<div align="center"> 
<br>
<br>

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
</style>

	<h4>Se ha creado satisfactoriamente el Operador. </h4>
	
	<a href="index.php?p=consulta_operadores">Volver a Lista Operadores</a></td>
	</div>
	<?php
	$result= mysql_query($sql);
	
	mysql_close();
	
	
?>