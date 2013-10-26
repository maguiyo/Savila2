<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>



$(document).ready(function(){
  $("#Registro1").change(function(){
		$.ajax({
                data:  {"Registro1":$("#Registro1").val()},
                url:   'registro1.php',
                type:  'post',
                success:  function (response) {
                        $("#divReg1").html(response);
                }
        });
	
  });
  $("#Registro2").change(function(){
		$.ajax({
                data:  {"Registro2":$("#Registro2").val()},
                url:   'registro2.php',
                type:  'post',
                success:  function (response) {
                        $("#divReg2").html(response);
                }
        });
	
  });
  
});
</script>

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
	
	$nombre1=$_POST['nombre_c1'];
	$nombre2=$_POST['nombre_c2'];
	$direccion2=$_POST['direccion2'];
	$telefono2=$_POST['telefono2'];
	$celular2 =$_POST['celular2'];
	$nombre_a2 =$_POST['nombre_a2'];
	$cantidad2 =$_POST['cantidad2'];
	$fecha2 =$_POST['fecha2'];
	$tipo_actividad2 =$_POST['tipo_actividad2'];
	$descripcion2 =$_POST['descripcion2'];
	$direccion1=$_POST['direccion1'];
	$telefono1=$_POST['telefono1'];
	$celular1 =$_POST['celular1'];
	$nombre_a1 =$_POST['nombre_a1'];
	$cantidad1 =$_POST['cantidad1'];
	$fecha1 =$_POST['fecha1'];
	$tipo_actividad1 =$_POST['tipo_actividad1'];
	$descripcion1 =$_POST['descripcion1'];
	$TipoRegistro1 = $_POST['TipoRegistro1']; 
	$TipoRegistro2 = $_POST['TipoRegistro2']; 

?>
	<br>
	<div class="row">  
	<br>
	<form method="post" action="index.php?p=creacion_venta" >
	<SELECT id="Registro1" NAME="TipoRegistro1"> 
	<OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
	<OPTION VALUE=1> Registrar Venta </option>
	<OPTION VALUE=2> Registrar Actividad </option>  
	</SELECT>
	
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />	
		
	 <?php //LOS VALORES DE LOS DEMAS DIVS  
	 include("form2.php");
	 include("form1.php");
	 ?>
	

	
	</form>
	</div>
	
	<div id="divReg1"> 
	</div>
	
	<br>
	<div class="row">  
	<br>
	<form method="post" action="index.php?p=creacion_venta" >
	<SELECT id="Registro2" NAME="TipoRegistro2"> 
	<OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
	<OPTION VALUE=1> Registrar Venta </option>
	<OPTION VALUE=2> Registrar Actividad </option>  
	</SELECT>
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	
	<?php //LOS VALORES DE LOS DEMAS DIVS  
		 include("form1.php");
		 include("form2.php");
		 ?>
	</form>
	
	<div id="divReg2"> 

	</div>

	<?php
	
	$nuevafecha = date('Y-m-d', strtotime($fecha));

	mysql_close($conexion);
		
?>

</body>
	</html>