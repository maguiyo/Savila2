<?php
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reportes.xls");
include ("conexion.php");
include ("funciones.php");
?>
<HTML LANG=”es”>
<title>Bases de Datos.</title>
<TITLE>Titulo de la Página.</TITLE>
</head>
<body>
<?php
$filtro_nombre = $_POST['filtro_nombre'];
$filtro_fecha = $_POST['filtro_fecha'];
$filtro_vendedor = $_POST['filtro_vendedor'];


$query = "SELECT * FROM venta where nombre_c like '%".$filtro_nombre."%' and fecha like '%".$filtro_fecha."%' and vendedor like '%".$filtro_vendedor."%'  ORDER BY nombre_c ASC";


$queEmp = mysql_query($query, $conexion);


?>

<TABLE BORDER=1 align=”center” CELLPADDING=1 CELLSPACING=1>
<TR>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;NOMBRE</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;DIRECCION&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;TELEFONO&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;CELULAR&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;ARTICULO&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;CANTIDAD&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;VENDEDOR&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;FECHA&nbsp;</span></TD>

</TR>
<?php

while($row = mysql_fetch_array($queEmp)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["nombre_c"],$row["direccion_c"],$row["telefono_c"],$row["celular_c"],$row["nombre_a"],$row["cantidad"],$row["vendedor"],$row["fecha"]);
}
mysql_free_result($queEmp);
mysql_close($conexion);  //Cierras la Conexión
?>

</table>
</body>
</html>