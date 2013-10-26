<?php
include ("conexion.php");
include ("funciones.php");

$nombrearticulo = getParam($_GET["nombre"], "text");
$action = getParam($_GET["action"], "");
 
if ($action == "edit") {
    $nombre = sqlValue($_POST["nombre"], "text");
    $precio = sqlValue($_POST["precio"], "int");
    $descripcion = sqlValue($_POST["descripcion"], "text");
    $promocion = sqlValue($_POST["promocion"], "text");
    $activo = sqlValue($_POST["activo"], "text");
   
   
    $sql = "UPDATE articulos SET ";
    $sql.= "precio=".$precio.", descripcion=".$descripcion.", promocion = ".$promocion.", activo = ".$activo ." " ;
    $sql.= "WHERE nombre=".$nombre;
	
    mysql_query($sql, $conexion);
    
}
 
$sql = "SELECT * FROM articulos WHERE nombre = ".sqlValue($nombrearticulo, "text");
$queEmp = mysql_query($sql, $conexion);
$result = mysql_fetch_assoc($queEmp);
$total = mysql_num_rows($queEmp);
if ($total == 0) {
    header("location: index.php?p=consulta_articulos");
    exit;
}
?>
<html>
<head>
<title>Editar Art&iacuteculo </title>
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

<h3>Editar Art&iacuteculo </h3>
<form method="post" action="editar_articulo.php?action=edit">
    <strong>Nombre * :</strong>
    <input type="text" readonly="readonly"  name="nombre" value="<?php echo $result['nombre']; ?>" /> <br>
    <strong>Precio :</strong>
    <input type="text" name="precio" value="<?php echo $result['precio']; ?>" /> <br>
    <strong>Descripcion :</strong>
    <input type="text" name="descripcion" value="<?php echo $result['descripcion']; ?>" /> <br>
	<strong>Promocion :</strong>
    <input type="text" name="promocion" value="<?php echo $result['promocion']; ?>" /> <br>
	<strong>Activo :</strong>
    <input type="text" name="activo" value="<?php echo $result['activo']; ?>" /> <br>
	
	<button type="submit">Guardar</button>
	<button type="reset">Limpiar</button> <br>
	<h6>Solo los Campos con * no son editables. </h6>
</form>
</div> 
</body>
</html>