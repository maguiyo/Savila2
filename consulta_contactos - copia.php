<?php
// creamos la conexión a mysql
	include ("conexion.php");
	include ("funciones.php");
// hacemos la consulta de registros

$filtro_nombre = getParam($_GET["filtro_nombre"], "");
$filtro_telefono = getParam($_GET["filtro_telefono"], "");
$filtro_celular = getParam($_GET["filtro_celular"], "");


if ($filtro_nombre == null)  {
  $filtro_nombre = '';
}
if ($filtro_telefono == null)  {
  $filtro_telefono = '';
}
if ($filtro_celular == null)  {
  $filtro_celular = '';
}

$query = "SELECT * FROM contactos where nombre like '%".$filtro_nombre."%' and  telefono like '%".$filtro_telefono."%' and celular  like '%".$filtro_celular."%'  ORDER BY nombre ASC";

$queEmp = mysql_query($query, $conexion);
?>
<html>
<head>
<title>Listado de Contactos</title>
</head>
<body>
<div align="center" class="contacto">   


Buscar Contactos
<form method="get" action="consulta_contactos.php?filtro_nombre=filtro_nombre&filtro_telefono=filtro_telefono&filtro_celular=filtro_celular">
    <strong>Nombre</strong>
    <input type="text" name="filtro_nombre" />
    <strong>Telefono</strong>
    <input type="text" name="filtro_telefono"/>
    <strong>Celular</strong>
	<input type="text" name="filtro_celular" />
<button type="submit">Buscar</button>
    <button type="reset">Limpiar</button>
</form>



<table>
 <tr>
    <td>Nombre</td>
    <td>Direccion</td>
	<td>Telefono</td> 
	<td>Celular</td>   	
	<td>Activo</td>
	<td>Ultima vez contactada</td>
  </tr>
   <tr></tr>
  <?php while ($result = mysql_fetch_assoc($queEmp)) { ?> 
  <tr>
    <td><?php echo $result['nombre']; ?></td>
    <td><?php echo $result['direccion']; ?></td>
	<td><?php echo $result['telefono']; ?></td>
	<td><?php echo $result['celular']; ?></td>
	<td><?php echo $result['activo']; ?></td>
	<td><?php echo $result['ultimo_contacto']; ?></td>
    <td><a href="editar_contacto.php?nombre=<?php echo $result['nombre']; ?>">Consultar Perfil</a></td>
  </tr>
  <?php } ?>
</table>
 </div>
</body>
</html>