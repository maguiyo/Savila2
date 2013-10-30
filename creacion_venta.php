<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
include("autocompleta.php");
?>

<script>
var id_combo=3;
function insertar_combo(){
	combo="<div id='"+id_combo+"'><SELECT id='Registro"+id_combo+"' NAME='TipoRegistro"+id_combo+"'><OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option><OPTION VALUE=1> Registrar Venta </option><OPTION VALUE=2> Registrar Actividad </option></select> <div id='divReg"+id_combo+"'></div></div>";
	
	$("#allRegistro").append(combo);
	
	$("#Registro"+id_combo).attr("onChange","cargar_registro($(this).attr('id'),$(this).next().attr('id'), $(this).parent().attr('id'));");
	
	id_combo=id_combo+1;
	
};

function cargar_registro(registro_id, divReg_id, id_total){
	$.ajax({
                data:  {
							"Registro1"	:$("#"+registro_id).val(),
							"divReg_id"	:divReg_id,
							"id_total"	:id_total
						},
                url:   'registro1.php',
                type:  'post',
                success:  function (response) {
                        $("#"+divReg_id).html(response);
                }
        });
};
</script>


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
	
	</div>

	
    <div id="allRegistro">
		<div id="0">
            <SELECT id="Registro0" NAME="TipoRegistro0" onChange="cargar_registro($(this).attr('id'),$(this).next().attr('id'), $(this).parent().attr('id'));"> 
                <OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
                <OPTION VALUE=1> Registrar Venta </option>
                <OPTION VALUE=2> Registrar Actividad </option>  
            </SELECT>
            <div id="divReg0">
            	
            </div>
    	</div>
        
        <div id="1">
            <SELECT id="Registro1" NAME="TipoRegistro1" onChange="cargar_registro($(this).attr('id'),$(this).next().attr('id'), $(this).parent().attr('id'));" > 
                <OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
                <OPTION VALUE=1> Registrar Venta </option>
                <OPTION VALUE=2> Registrar Actividad </option>  
            </SELECT>	
            <div id="divReg1">
                        
            </div>
        </div>

        <div id="2">
            <SELECT id="Registro2" NAME="TipoRegistro2" onChange="cargar_registro($(this).attr('id'),$(this).next().attr('id'), $(this).parent().attr('id'));"> 
                <OPTION SELECTED VALUE=0> Escoga un Tipo Registro </option>
                <OPTION VALUE=1> Registrar Venta </option>
                <OPTION VALUE=2> Registrar Actividad </option>  
            </SELECT>
            <div id="divReg2">
                        
            </div>
        </div>

    </div>
	<button id="addRegistro" nombre="addRegistro" value="Nuevo Registro" onClick="insertar_combo()">Nuevo Registro</button>
	<?php
	
	$nuevafecha = date('Y-m-d', strtotime($fecha));

	mysql_close($conexion);
		
?>

</body>
	</html>