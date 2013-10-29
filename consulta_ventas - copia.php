<?php
// creamos la conexión a mysql
	include ("conexion.php");
	include ("funciones.php");
	
// hacemos la consulta de registros

$filtro_nombre = getParam($_POST["filtro_nombre"], "");
$filtro_fecha = getParam($_POST["filtro_fecha"], "");



if ($filtro_nombre == null)  {
  $filtro_nombre = '';
}
if ($filtro_fecha == null)  {
  $filtro_fecha = '';
}


$query = "SELECT * FROM venta where nombre_c like '%".$filtro_nombre."%' and  fecha like '%".$filtro_fecha."%' ORDER BY nombre_c ASC";

$queEmp = mysql_query($query, $conexion);
?>

<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
	
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
 	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
    </script>
<title>Listado de Ventas</title>
</head>
<body>
<div align="center" class="contacto">   


Buscar Contactos
<form method="post" action="index.php?p=consulta_ventas">
    <strong>Nombre</strong>
	<input type="hidden" name="p" value ="consulta_ventas" />
    <input type="text" name="filtro_nombre" />
    <strong>Fecha</strong>
    <input type="text"  id="datepicker" readonly="readonly" size="12" name="filtro_fecha"/>
<button type="submit">Buscar</button>
    <button type="reset">Limpiar</button>

	
</form>

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


<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="styleTable.css">


<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
	<thead>
	<tr>
    <th class="asc"><h3>Contacto</h3></th>
    <th class="head"><h3>Direccion</h3></th>
	<th class="head"><h3>Telefono</h3></th> 
	<th class="head"><h3>Articulo</h3></th>   	
	<th class="head"><h3>Cantidad</h3></th>
	<th class="head"><h3>Fecha</h3></th>
  </tr>
   <tr></tr>
   </thead>
   <tbody>
  <?php while ($result = mysql_fetch_assoc($queEmp)) { ?> 
  <tr>
    <td ><?php echo $result['nombre_c']; ?></td>
    <td class=""><?php echo $result['direccion_c']; ?></td>
	<td class=""><?php echo $result['telefono_c']; ?></td>
	<td class=""><?php echo $result['nombre_a']; ?></td>
	<td class=""><?php echo $result['cantidad']; ?></td>
	<td class=""><?php echo $result['fecha']; ?></td>
    
  </tr>
  <?php } ?>
  </tbody>
</table>
	<div id="controls">
		<div id="perpage">
			<select onChange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10">10</option>
				<option value="20" selected="selected">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span>Entradas por pagina</span>
		</div>
		<div id="navigation">
			<img src="images/first.gif" width="16" height="16" alt="First Page" onClick="sorter.move(-1,true)">
			<img src="images/previous.gif" width="16" height="16" alt="First Page" onClick="sorter.move(-1)">
			<img src="images/next.gif" width="16" height="16" alt="First Page" onClick="sorter.move(1)">
			<img src="images/last.gif" width="16" height="16" alt="Last Page" onClick="sorter.move(1,true)">
		</div>
		<div id="text">Pagina <span id="currentpage">1</span> de <span id="pagelimit">3</span></div>
       

	</div>
    <form method="post" action="pruebaexcel.php">
    
    <input type="hidden" name="filtro_nombre" value="<?php echo $filtro_nombre; ?>" />
	<input type="hidden" name="filtro_fecha" value="<?php echo $filtro_fecha; ?>" />

	<button type="submit" >Exportar Excel</button>
</form>

	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",1);
  </script>
  
 </div>
</body>
</html>