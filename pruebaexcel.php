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
$v1 = $_POST['filtro'];



$query = "SELECT * FROM venta where nombre_c like '%".$v1."%'ORDER BY nombre_c ASC";


$queEmp = mysql_query($query, $conexion);


?>

<TABLE BORDER=1 align=”center” CELLPADDING=1 CELLSPACING=1>
<TR>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;NOMBRE CLIENTE</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;dIRECCION&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;TELEFONO CLIENTE&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;NOMBRE A&nbsp;</span></TD>
<TD  bgcolor=”#000000″><span style=”color:#FFFFFF; font-weight:bold;”>&nbsp;CANTIDAD&nbsp;</span></TD>
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
</tr>", $row["nombre_c"],$row["direccion_c"],$row["telefono_c"],$row["nombre_a"],$row["cantidad"],$row["fecha"]);
}
mysql_free_result($queEmp);
mysql_close($conexion);  //Cierras la Conexión
?>

</table>
</body>
</html>