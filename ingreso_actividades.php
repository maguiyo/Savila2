<?php
	include ("conexion.php");
	?>
		<script language=javascript>
		function frmSubmit(){
		document.myform.submit();
	}
	</script>
	<?php

	mysql_connect("$host","$usuario", "$contrasena") or die ("No se puedo realizar la conexion");
	mysql_select_db("$db_name") or die ("No se puedo escoger la base de datos"); ;
	
	$nombre_c2 =$_POST[nombre_c2];
	$direccion2=$_POST[direccion2];
	$telefono2=$_POST[telefono2];
	$celular2 =$_POST[celular2];
	$nombre_a2 =$_POST[nombre_a2];
	$cantidad2 =$_POST[cantidad2];
	$fecha2 =$_POST[fecha2];
	$tipo_actividad2 =$_POST[tipo_actividad2];
	$descripcion2 =$_POST[descripcion2];
	
	
	$nombre_c1 =$_POST[nombre_c1];
	$direccion1=$_POST[direccion1];
	$telefono1=$_POST[telefono1];
	$celular1 =$_POST[celular1];
	$nombre_a1 =$_POST[nombre_a1];
	$cantidad1 =$_POST[cantidad1];
	$fecha1 =$_POST[fecha1];
	$tipo_actividad1 =$_POST[tipo_actividad1];
	$descripcion1 =$_POST[descripcion1];
	
	
	
	$ConfirmacionBoton1 =$_POST[ConfirmacionBoton1];
	$ConfirmacionBoton2 =$_POST[ConfirmacionBoton2];
	
	
	
	
	$fecha1=$_POST[fecha1];
	$nuevafecha1 = date('Y-m-d', strtotime($fecha1));
	
	$fecha2=$_POST[fecha2];
	$nuevafecha2 = date('Y-m-d', strtotime($fecha2));
	
	
	$vendedor = $_POST[vendedor];
	$TipoRegistro1=$_POST[TipoRegistro1];
	$TipoRegistro2=$_POST[TipoRegistro2];
	
	$nombre_c1=$_POST[nombre_c1];
	
	
	//$sql="INSERT INTO CONTACTOS (nombre,direccion,telefono) VALUES ('$var1',$var2',$var3')";
	if (isset($nombre_c1) and $TipoRegistro1 == 2 and $ConfirmacionBoton1 == 1)
	{$sql="INSERT INTO actividades (nombre_c,direccion_c,telefono_c,celular_c,tipo_actividad,descripcion,fecha,vendedor) 
	VALUES ('$_POST[nombre_c1]','$_POST[direccion_c1]','$_POST[telefono_c1]','$_POST[celular_c1]','$_POST[tipo_actividad1]','$_POST[descripcion1]','$nuevafecha1','$vendedor')";
	
	$result= mysql_query($sql);
	mysql_close();
	$TipoRegistro1 = '3';
	$ConfirmacionBoton1 = '0';
	?>
	<body onload="frmSubmit();">
	<form name="myform" method="post" action="index.php?p=creacion_venta">
	<input type="hidden" name="ConfirmacionBoton1" value="<?php echo $ConfirmacionBoton1 ?>" />
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	 <?php
	include ("form2.php");
	//echo "<meta http-equiv='Refresh' content='1;URL=index.php?p=creacion_venta'/>"; 
	//header("Location: index.php?p=creacion_venta");
   ?>
	</form>
	</body>

	
	<?php

	
	}

	if (isset($nombre_c2) and $TipoRegistro2 == 2 and $ConfirmacionBoton2 == 1)
	{$sql="INSERT INTO actividades (nombre_c,direccion_c,telefono_c,celular_c,tipo_actividad,descripcion,fecha,vendedor) 
	VALUES ('$_POST[nombre_c2]','$_POST[direccion_c2]','$_POST[telefono_c2]','$_POST[celular_c2]','$_POST[tipo_actividad2]','$_POST[descripcion2]','$nuevafecha2','$vendedor')";
	$result= mysql_query($sql);
	mysql_close();
	$TipoRegistro2 = '3';
	$ConfirmacionBoton2 = '0';
	?>
	<body onload="frmSubmit();">
	<form name="myform" method="post" action="index.php?p=creacion_venta">
	<input type="hidden" name="ConfirmacionBoton2" value="<?php echo $ConfirmacionBoton2 ?>" />
	<input type="hidden" name="TipoRegistro1" value="<?php echo $TipoRegistro1 ?>" />
	<input type="hidden" name="TipoRegistro2" value="<?php echo $TipoRegistro2 ?>" />
	 <?php
	include ("form1.php");
	//echo "<meta http-equiv='Refresh' content='1;URL=index.php?p=creacion_venta'/>"; 
	//header("Location: index.php?p=creacion_venta");
	}
   ?>
	</form>
	</body>