<?php
// creamos la conexión a mysql
	include ("conexion.php");
	include ("funciones.php");
// hacemos la consulta de registros
$query = "SELECT * FROM venta ORDER BY nombre_c  ASC";
$queEmp = mysql_query($query, $conexion);
?>
<html>
<head>
<title>Listado de Ventas</title>
</head>
<body>
<table>
  <?php while ($result = mysql_fetch_assoc($queEmp)) { ?>
  <tr>
    <td><?php echo $result['nombre_c']; ?></td>
    <td><?php echo $result['direccion_c']; ?></td>
	<td><?php echo $result['telefono_c']; ?></td>
	<td><?php echo $result['nombre_a']; ?></td>
	<td><?php echo $result['cantidad']; ?></td>
	<td><?php echo $result['fecha']; ?></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>