<?php
	
	if(($_SESSION["rol"] == "1") or ($_SESSION["rol"] == "2")){
	echo"<script>alert('Su usuario no tiene permiso de Administrador para cargar esta pagina, por favor logeese de nuevo');
		window.location.href=\"index.php?p=login\"</script>"; 
	@session_start();
	session_destroy();
	exit();
	}	


include ("conexion.php");
include ("funciones.php");

$loginoperador = getParam($_GET["login"], "text");
$action = getParam($_GET["action"], "");
 
if ($action == "edit") {
	$login = sqlValue($_POST["login"], "text");
    $nombre = sqlValue($_POST["nombre"], "text");
    $rol = sqlValue($_POST["rol"], "text");
	$password = sqlValue($_POST["password"], "text");
	$activo = sqlValue($_POST["activo"], "text");
	$passwordmd5 = md5($password);
	
   
    $sql = "UPDATE operadores SET ";
    $sql.= "password=".$passwordmd5.", rol=".$rol.", nombre=".$nombre.", activo=".$activo."";
    $sql.= "WHERE login=".$login;
	
    mysql_query($sql, $conexion);
    header("location: index.php?p=consulta_operadores");
}
 
$sql = "SELECT * FROM operadores WHERE login = ".sqlValue($loginoperador, "text");
$queEmp = mysql_query($sql, $conexion);
$result = mysql_fetch_assoc($queEmp);
$total = mysql_num_rows($queEmp);



if ($total == 0) {
   header("location: index.php?p=consulta_operadores");
    exit;
}
?>
<html>
<head>
<title>Perfil Operadores</title>
</head>
<body>
<div align="center"> 
<br>
<br>
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
</style>

<h3>Perfil Operador</h3>
<form method="post" action="editar_operador.php?action=edit" >
    <strong>Login * :</strong>
    <input type="text" readonly="readonly"  name="login" value="<?php echo $result['login']; ?>" /> <br>
    <strong>Nombre :</strong>
    <input type="text" name="nombre" value="<?php echo $result['nombre']; ?>" /> <br>
    <strong>Contraseña :</strong>
	<input type="password" name="password" value="<?php echo $result['password']; ?>" /> <br>
    <strong>Rol :</strong>
	<input type="text" name="rol" value="<?php echo $result['rol']; ?>" /> <br> 
    <strong>Activo : </strong>
	<input type="text" name="activo" value="<?php echo $result['activo']; ?>" /> <br>
    <button type="submit">Editar Informacion</button>
    <button type="reset">Limpiar</button><br>
	<h6>Solo los Campos con * no son editables. </h6>
</form>


</div> 
</body>
</html>