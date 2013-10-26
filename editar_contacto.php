<?php
include ("conexion.php");
include ("funciones.php");

$nombrecontacto = getParam($_GET["nombre"], "text");
$action = getParam($_GET["action"], "");
 
if ($action == "edit") {
    $nombre = sqlValue($_POST["nombre"], "text");
    $direccion = sqlValue($_POST["direccion"], "text");
    $telefono = sqlValue($_POST["telefono"], "text");
	$celular = sqlValue($_POST["celular"], "text");
	$activo = sqlValue($_POST["activo"], "text");
	$ultimo_contacto = sqlValue($_POST["ultimo_contacto"], "text");
	
	
   
    $sql = "UPDATE contactos SET ";
    $sql.= "direccion=".$direccion.", telefono=".$telefono.", celular=".$celular.", activo=".$activo."";
    $sql.= "WHERE nombre=".$nombre;
    mysql_query($sql, $conexion);
    header("location: index.php?p=consulta_contactos");
}
 
$sql = "SELECT * FROM contactos WHERE nombre = ".sqlValue($nombrecontacto, "text");
$queEmp = mysql_query($sql, $conexion);
$result = mysql_fetch_assoc($queEmp);
$total = mysql_num_rows($queEmp);

$sqlVenta = "SELECT nombre_a,cantidad,fecha FROM venta WHERE nombre_c = ".sqlValue($nombrecontacto, "text");
$queEmpVenta = mysql_query($sqlVenta, $conexion);
$resultVenta = mysql_fetch_assoc($queEmpVenta);
//$total = mysql_num_rows($queEmpVenta);




if ($total == 0) {
   header("location: index.php?p=consulta_contactos");
    exit;
}
?>
<html>
<head>
<title>Perfil Contactos</title>
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

<h3>Perfil Contacto</h3>
<form method="post" action="editar_contacto.php?action=edit" >
    <strong>Nombre * :</strong>
    <input type="text" readonly="readonly"  name="nombre" value="<?php echo $result['nombre']; ?>" /> <br>
    <strong>Direccion :</strong>
    <input type="text" name="direccion" value="<?php echo $result['direccion']; ?>" /> <br>
    <strong>Telefono :</strong>
	<input type="text" name="telefono" value="<?php echo $result['telefono']; ?>" /> <br>
    <strong>Celular :</strong>
	<input type="text" name="celular" value="<?php echo $result['celular']; ?>" /> <br> 
    <strong>Activo : </strong>
	<input type="text" name="activo" value="<?php echo $result['activo']; ?>" /> <br>
    <strong>Ultima vez contactada * :</strong>
    <input type="text" readonly="readonly"  name="ultimo_contacto" value="<?php echo $result['ultimo_contacto']; ?>" /> <br>
	<button type="submit">Editar Informacion</button>
    <button type="reset">Limpiar</button><br>
	<h6>Solo los Campos con * no son editables. </h6>
</form>

<h3>Historial de Compras</h3>
	
	<table>
 <tr>
    <td><strong>Articulo</strong> </td>
    <td><strong>Cantidad </strong> </td>
	<td><strong>Fecha </strong></td> 
  </tr>
   <tr></tr>
  <?php while ($resultVenta = mysql_fetch_assoc($queEmpVenta)) { ?> 
  <tr>
    <td><?php echo $resultVenta['nombre_a']; ?></td>
    <td><?php echo $resultVenta['cantidad']; ?></td>
	<td><?php echo $resultVenta['fecha']; ?></td> 
  </tr>
  <?php } ?>
</table>

	<br>
	<br>
<a href="creacion_ventas_f.php">Ir a Ventas/Actividades</a></td>

</div> 
</body>
</html>