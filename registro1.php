<?php 
@session_start();
	//echo "cargo session || ";
	include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
	//echo "cargo conexion || ";
	include("autocompleta.php");
	//echo "autocompleta || ";
	$TipoRegistro1=$_POST['Registro1'];
	//echo $TipoRegistro1." = tipo registro ||";
	$nombre1=$_POST['nombre_c1'];
	//echo $nombre1." = nombre ||";
	$id_total=$_POST['id_total'];
	//echo $id_total."= id total";
	
	
?>
<script>
function consulta_ventas<?php echo $id_total ?>(nombre_c1,TipoRegistro1){
	$.ajax({
			data:  {"nombre_c1":nombre_c1, "Registro1":TipoRegistro1, "id_total"	:<?php echo $id_total ?>},
			url:   'registro1.php',
			type:  'post',
			success:  function (response) {$("#divReg<?php echo $id_total ?>").html(response);}
	});
};

function registrar_venta<?php echo $id_total ?>(id_form){
	var dato={};
	$("#"+id_form+" :input").each(function() {
		if ($(this).attr('type') == 'checkbox'){
			if ($(this).is(':checked')){
				dato[$(this).attr("name")] = "1";
			}
			else{
				dato[$(this).attr("name")] = "0";
			}
		}
		else{
			dato[$(this).attr("name")] = $(this).val();
		}
		
    });
	$.ajax({
			data:  dato,
			url:   'ingreso_venta.php',
			type:  'post',
			success:  function (response) {$("#divReg<?php echo $id_total ?>").html(response);}
	});
	console.log(dato);
};


$("#tagsA"+<?php echo $id_total ?>).bind( "autocompletechange", function( event, ui ) {
	if(parseInt(dicElementos[$("#tagsA"+<?php echo $id_total ?>).val()])){
		$("#promocionCheck"+<?php echo $id_total ?>).attr("checked","checked")
	}
	else{
		$("#promocionCheck"+<?php echo $id_total ?>).removeAttr("checked")
	}
});

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
	var d = new Date();
	$(".fecha_c1").val(String(d.getFullYear())+"-"+String(d.getMonth())+"-"+String(d.getDate()))
	$(".datepicker").datepicker({
		showOn: 'both',
		buttonImage: 'images/calendar.png',
		buttonImageOnly: true,
		changeYear: true,
		numberOfMonths: 2,
		defaultDate: new Date(d.getFullYear(),d.getMonth(),d.getDate())
	});
});
    </script>

<?php

	
	
	//Realizar una consulta MySQL
	if($nombre1){
		$query = "SELECT nombre,direccion,telefono,celular FROM contactos where nombre like '%$nombre1%'  ";
		//$query = "SELECT direccion,telefono FROM contactos where nombre like '%Mago%' ";
		// $query = "SELECT direccion,telefono FROM contactos";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		if( $row = mysql_fetch_array ( $result )) {
		   $telefono1	= $row [ "telefono" ];
		   $direccion1	= $row [ "direccion" ];
		   $nombre_c1	= $row [ "nombre" ];
		   $celular1	= $row [ "celular" ];
	   	}
   		mysql_free_result($result);	
   	}
	
	if($TipoRegistro1 == '1'){
?>
	<div id="Venta<?php echo $id_total ?>" >   
    <p align="center" > Registro de Venta  </p>
	<strong>Nombre Contacto:</strong>   <input id="tagsC<?php echo $id_total ?>" class="tagsC" name="nombre_c1"  value="<?php echo $nombre_c1 ?>" >
	<input type="hidden" id="TipoRegistro1<?php echo $id_total ?>" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />

	
    <input id="consulta_venta<?php echo $id_total ?>" name="Buscar" type="submit"  value="Consulta" onclick="consulta_ventas<?php echo $id_total ?>($('#tagsC<?php echo $id_total ?>').val(),$('#TipoRegistro1<?php echo $id_total ?>').val())"/>
	
	
	<div id="form_venta<?php echo $id_total ?>">
        <input type ="hidden"  name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
        <input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
        <input type ="hidden"  name="ConfirmacionBoton1" value="1" >
        <input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
        <strong>Direcci&oacuten del Contacto:</strong>   
        <input type = 'text' class="nobord" name='direccion_c1' size='30' border ='0' readonly="readonly" value="<?php echo $direccion1 ?>"> 
        <strong>Telefono:</strong>  
        <input type = 'text' class="nobord" name='telefono_c1' size='30'   readonly="readonly" value="<?php echo $telefono1 ?>">  
        <strong>Celular:</strong> 
        <input type = 'text' class="nobord" name='celular_c1' size='30'   readonly="readonly" value="<?php echo $celular1 ?>">  
        <strong>Art&iacuteculo: </strong>  
        <input id="tagsA<?php echo $id_total ?>" class="tagsA" name="nombre_a1" value="<?php echo $nombre_a1 ?>" > 
        <strong>Promoción: </strong>
        <input id="promocionCheck<?php echo $id_total ?>" class="promocionCheck" type="checkbox" name="promocion_a1"  />
        <strong> Cantidad: </strong>  
        <input type = 'text' name='cantidad1' size='10' value="<?php echo $cantidad1 ?>"> 
        <strong>Fecha : </strong> 
        <input type="text" class="datepicker fecha_c1" name="fecha1" value="<?php echo $fecha1 ?>"> 
        <input id="registrar_venta<?php echo $id_total ?>" name="Registrar" type="submit"  value="Registrar"  onclick="registrar_venta<?php echo $id_total ?>($(this).parent().attr('id'))"/>
	</div>
	</div>
	
<?php 
} 
	if($TipoRegistro1 == '2'){
?>
	
	<div id="Actividad<?php echo $id_total ?>" >   
    <p align="center" > Registro de Actividades  </p>
    
	<strong>Nombre Contacto: </strong>  
    <input id="tagsC<?php echo $id_total ?>" class="tagsC" name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
	<input type="hidden" id="TipoRegistro1<?php echo $id_total ?>" name="TipoRegistro1<?php echo $id_total ?>" value="<?php echo $TipoRegistro1 ?>" />
	
    <input id="consulta_venta<?php echo $id_total ?>" name="Buscar" type="submit"  value="Consulta" onclick="consulta_ventas<?php echo $id_total ?>($('#tagsC<?php echo $id_total ?>').val(),$('#TipoRegistro1<?php echo $id_total ?>').val())"/>
    
    <div id="form_venta<?php echo $id_total ?>">    
        <input type ="hidden"  name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" >
        <input type ="hidden"  name="nombre_c1" value="<?php echo $nombre_c1 ?>" >
        <input type ="hidden"  name="vendedor" value="<?php echo $_SESSION["usuarioactual"] ?>" >
        <strong>Direcci&oacuten del Contacto:</strong>   
        <input type = 'text' class="nobord" name='direccion_c1' size='30' border ='0' readonly="readonly" value="<?php echo $direccion1 ?>"/> 
        <strong>Telefono:</strong>  
        <input type = 'text' class="nobord" name='telefono_c1' size='30'   readonly="readonly" value="<?php echo $telefono1 ?>"/>  
        <strong>Celular:</strong> 
        <input type = 'text' class="nobord" name='celular_c1' size='30'   readonly="readonly" value="<?php echo $celular1 ?>"/>  
        <strong>Tipo Actividad:  </strong> 
            <SELECT NAME="tipo_actividad1"> 
                <OPTION SELECTED VALUE=0> Escoga un Tipo Actividad </option>
                <OPTION VALUE=1> No se pudo contactar con el usuario </option>
                <OPTION VALUE=2> El usuario contesto pero no estuvo interesado en la compra </option>
                <OPTION VALUE=3> El usuario contesto y estuvo interesado en la compra </option>
                <OPTION VALUE=4> Otras razones </option>
            </SELECT>
        
        <strong> Descripcion: </strong>  <textarea id="descripcion" name="descripcion1" rows="5" cols="50"></textarea>
        <strong> Fecha: </strong> <input type="text" class="datepicker fecha_c1" name="fecha1" value="<?php echo $fecha1 ?>"> 
        <input id="registrar_venta<?php echo $id_total ?>" name="Registrar" type="submit"  value="Registrar"  onclick="registrar_venta<?php echo $id_total ?>($(this).parent().attr('id'))"/>
        </div>
    </div>
	
<?php  
} 
?>
	