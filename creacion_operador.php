
<?php 

	if(($_SESSION["rol"] == "1") or ($_SESSION["rol"] == "2") or ($_SESSION["rol"] == "") ){
	echo"<script>alert('Su usuario no tiene permiso de Administrador para cargar esta pagina, por favor logeese de nuevo');
		window.location.href=\"index.php?p=login\"</script>"; 
	@session_start();
	session_destroy();
	exit();
	}

?>

<html>
	<head>
		<title>
			Creaci&oacute;n Operadores
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
</style>
		
	
       <div align="center" class="contacto">    
      <p class="logo_colour" > Creaci&oacute;n Operadores</p>
       
		<form action ='index.php?p=ingreso_operador.php' method='POST'>
		<input type="hidden" name="p" value ="consulta_operadores" />
		 <p align="center">Login: </p> 
		   <input type = 'text' name='login' size='40'> <br>
		<p align="center" >Nombre :</p> 
        <input type = 'text' name='nombre' size='40' align="left"> <br>
		<p align="center" >Contraseña : </p>
        <input type = 'password' name='password' size='40'> <br>
		<p align="center" >Rol : </p>
		<SELECT id="rol" NAME="rol" >
				<OPTION SELECTED VALUE=1> Operador Standard </option>
                <OPTION VALUE=2> Acceso Reportes </option>  
				<OPTION VALUE=3> Administrador </option>  
            </SELECT>
        
		
		
		<input type = 'submit' value='Crear Operador' align="center" > <br>
		</form>
	</body>
	</html>