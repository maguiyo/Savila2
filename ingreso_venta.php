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
	
	$nombre_c1 =$_POST[nombre_c1];
	$direccion1=$_POST[direccion1];
	$telefono1=$_POST[telefono1];
	$celular1 =$_POST[celular1];
	$nombre_a1 =$_POST[nombre_a1];
	$cantidad1 =$_POST[cantidad1];
	$fecha1 =$_POST[fecha1];
	$tipo_actividad1 =$_POST[tipo_actividad1];
	$descripcion1 =$_POST[descripcion1];	
	
	
	$fecha1=$_POST[fecha1];
	$nuevafecha1 = date('Y-m-d', strtotime($fecha1));
	
	$fecha2=$_POST[fecha2];
	$nuevafecha2 = date('Y-m-d', strtotime($fecha2));
	
	
	$vendedor = $_POST[vendedor];
	$TipoRegistro1=$_POST[TipoRegistro1];
	$TipoRegistro2=$_POST[TipoRegistro2];
	
	$nombre_c1=$_POST[nombre_c1];
	
	
	//$sql="INSERT INTO CONTACTOS (nombre,direccion,telefono) VALUES ('$var1',$var2',$var3')";
	if (isset($nombre_c1) and $TipoRegistro1 == 1)
	{$sql="INSERT INTO venta (nombre_c,direccion_c,telefono_c,celular_c,nombre_a,cantidad,fecha,vendedor) 
	VALUES ('$_POST[nombre_c1]','$_POST[direccion_c1]','$_POST[telefono_c1]','$_POST[celular_c1]','$_POST[nombre_a1]','$_POST[cantidad1]','$nuevafecha1','$vendedor')";
	
	$result= mysql_query($sql);
	mysql_close();
	
	?>
	<h5>Se ha Registrado en el sistema con exito . </h5>
	<?php

	
	}

	
   ?>
	</form>
	</body>