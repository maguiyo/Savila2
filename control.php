<?php
	include ("conexion.php");
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
    // $conexion = mysql_connect("localhost","root","");
    // mysql_select_db("mg1", $conexion);
	
	
     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función 
     htmlentities para evitar inyecciones SQL. */
	 $sentencia = "select login from operadores where login =  '".htmlentities($_POST["login"])."' ";
								 
     $myusuario = mysql_query($sentencia,$conexion);
     $nmyusuario = mysql_num_rows($myusuario);

	 
     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
		
          $sql = "select login,rol
               from operadores
               where activo = 1 
			   and login = '".htmlentities($_POST["login"])."' 
			   and password = '".md5(htmlentities($_POST["password"]))."'";
          $myclave = mysql_query($sql,$conexion);
          $nmyclave = mysql_num_rows($myclave);

          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = 'SIP';
			   
               $_SESSION["usuarioactual"] = mysql_result($myclave,0,0); //nombre del usuario logueado.
			   $_SESSION["rol"] = mysql_result($myclave,0,1); 
			   
			   
			   
               //Direccionamos a nuestra página principal del sistema.
               header ("Location: index.php?");
          }
          else{
               echo"<script>alert('El password del usuario no es correcta o esta inactivo.');
               window.location.href=\"index.php?p=login\"</script>"; 
          }
     }else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"index.php?p=login\"</script>";
     }
     mysql_close($conexion);
?>