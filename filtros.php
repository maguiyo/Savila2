<?php
	include ("conexion.php");
	//Retorna un arreglo con los datos del archivo especificado en $nombre_archivo (debe estar ubicado en la carpeta ./datos)
	function EscribirOpciones($nombre_archivo, $seleccionado='')
	{
		$filas = file("filtros/".$nombre_archivo);
		$i = 0;
		$opciones = "";
			
		foreach($filas as $linea)
		{
			if(utf8_encode(trim($linea)) == utf8_decode(trim($seleccionado)))
				$opciones .= "<option value='".utf8_decode(trim($seleccionado))."' SELECTED>".utf8_decode(trim($seleccionado))."</option>";
			else
				$opciones .= "<option value='".utf8_encode(trim($linea))."'>".utf8_encode(trim($linea))."</option>";
			$i++;
		}		
		echo $opciones;
	}
	
	$query = "SELECT login FROM operadores where login != 'Soporte' ORDER BY login ASC;";

$resultado = mysql_query($query, $conexion);

?>


						<table>
						
							
							<form method="get" action="index.php?p=reportes.php&anio=anio&mes=mes&operador=operador">
							<input type="hidden" name="p" value ="reportes" />
								<td valign="middle">
									<select name="anio">
										<!--id="customDropdown"-->
										<option value="all">A&ntilde;o</option>
										<?php
											for($i=2013; $i-1<=date("Y"); $i++)
											{
										?>
										  <option <?php if($anio == $i){ ?>SELECTED<?php } ?>><?php echo $i?></option>
										  
										<?php
										echo $i;
											}
										?>
									</select>
								</td>
								<td>
									<select name="mes">
										<option value="all">Mes</option>
										<option value="1" <?php if($mes == 1){ ?>SELECTED<?php } ?>>Enero</option>
										<option value="2" <?php if($mes == 2){ ?>SELECTED<?php } ?>>Febrero</option>
										<option value="3" <?php if($mes == 3){ ?>SELECTED<?php } ?>>Marzo</option>
										<option value="4" <?php if($mes == 4){ ?>SELECTED<?php } ?>>Abril</option>
										<option value="5" <?php if($mes == 5){ ?>SELECTED<?php } ?>>Mayo</option>
										<option value="6" <?php if($mes == 6){ ?>SELECTED<?php } ?>>Junio</option>
										<option value="7" <?php if($mes == 7){ ?>SELECTED<?php } ?>>Julio</option>
										<option value="8" <?php if($mes == 8){ ?>SELECTED<?php } ?>>Agosto</option>
										<option value="9" <?php if($mes == 9){ ?>SELECTED<?php } ?>>Septiembre</option>
										<option value="10" <?php if($mes == 10){ ?>SELECTED<?php } ?>>Octubre</option>
										<option value="11" <?php if($mes == 11){ ?>SELECTED<?php } ?>>Noviembre</option>
										<option value="12" <?php if($mes == 12){ ?>SELECTED<?php } ?>>Diciembre</option>
									</select>
								</td>
								
								<td>
									<select name="operador" style="width:130px;">
										<option value="all">Operador</option>
										<?php while( $fila = mysql_fetch_array($resultado) ){
												$lista[] = $fila;
										}
										mysql_free_result( $resultado );
										if(count($lista)) {
										foreach($lista as $datos){
										
										?> 
												
											  	<option value="<?php echo $datos['login']; ?>"><?php echo $datos['login']; ?></option> 
										<?php }} ?>

									</select>
								</td>							
								<td>
		
								<button type="submit">Actualizar</button>
								</td>	
	
							</tr>
							</form>
						</table>
