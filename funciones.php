<?php

	include("pChart/pData.class.php");
	include("pChart/pDraw.class.php");
	include("pChart/pPie.class.php");
	include("pChart/pImage.class.php");


function getParam($param, $default) {
$result = $default;
if (isset($param)) {
$result = (get_magic_quotes_gpc()) ? $param : addslashes($param);
}
return $result;
}

function sqlValue($value, $type) {
  $value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
  $value = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($value) : mysql_escape_string($value);
  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  return $value;
}


function GraficoxBarras($nombre_archivo, $datos, $etiquetas, $nombres, $meta=0, $min=0, $max=100)
	{
		/* Create and populate the pData object */
		$MyData = new pData();
				
		for($i=0; $i<count($datos); $i++)
		{
			$MyData->addPoints($datos[$i],$etiquetas[$i]);
		}
		
		$MyData->setAxisName(0,"");
		$MyData->addPoints($nombres,"Months");
		$MyData->setSerieDescription("Months","Month");
		$MyData->setAbscissa("Months");

		/* Create the floating 0 data serie */
		$MyData->addPoints(array(0,0,0),"Floating 0");
		$MyData->setSerieDrawable("Floating 0",FALSE);
		
		/* Custom colors */
		/*$serieSettings = array("R"=>166,"G"=>190,"B"=>39,"Alpha"=>90);
		$MyData->setPalette($etiquetas[0],$serieSettings);
		
		$serieSettings2 = array("R"=>6,"G"=>145,"B"=>178,"Alpha"=>90);
		$MyData->setPalette($etiquetas[1],$serieSettings2);*/
		
		/* Create the pChart object */
		$myPicture = new pImage(1024,500,$MyData);
		$myPicture->drawGradientArea(0,0,1024,500,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>900));
		$myPicture->drawGradientArea(0,0,1024,500,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
		$myPicture->setFontProperties(array("FontName"=>"fonts/calibri.ttf","FontSize"=>14));

		/* Draw the scale  */
		$myPicture->setGraphArea(50,30,1000,460);

		$AxisBoundaries = array(0=>array("Min"=>$min,"Max"=>$max));
		
		if($min == 0 && $max == 100)
			$ScaleSettings  = array("Mode"=>SCALE_MODE_START0,"CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		else
			$ScaleSettings  = array("Mode"=>SCALE_MODE_MANUAL,"CycleBackground"=>TRUE,"ManualScale"=>$AxisBoundaries,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		
		$myPicture->drawScale($ScaleSettings);

		/* Turn on shadow computing */ 
		$myPicture->setShadow(TRUE,array("X"=>10,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));

		/* Draw the chart */
		$settings = array("Draw0Line"=>FALSE,"Rounded"=>TRUE,"Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE, "DisplayPos"=>LABEL_POS_INSIDE, "DisplayOrintation"=>ORIENTATION_HORIZONTAL,"DisplayValues"=>FALSE, "DisplayR"=>0, "DisplayG"=>0,"DisplayB"=>0,"Surrounding"=>10);
		$myPicture->drawBarChart($settings);
		
		/* if($meta > 0)
		{
			$puntos = array();
			for($i=0; $i<count($datos); $i++)
			{
				$puntos[$i] = $meta;
			}	
			
			$MyData->addPoints($puntos,"Meta ".$meta."%");
			$serieSettings = array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>100);
			$MyData->setPalette("Meta ".$meta."%",$serieSettings);
			$myPicture->drawLineChart();
		} */

		/* Write the chart legend */
		//$myPicture->drawLegend(860,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

		 /* Render the picture (choose the best way) */
		$nombre_archivo = "images/graphics/$nombre_archivo.png";
		$myPicture->Render($nombre_archivo);	
	}
	
	
	
	function GraficoTorta($nombre_archivo, $datos, $etiquetas, $radio=200)
	{
		/* pData object creation */
		$MyData = new pData();   

		/* Data definition */
		$MyData->addPoints($datos,"Value");  

		/* Labels definition */
		$MyData->addPoints($etiquetas,"Legend");
		$MyData->setAbscissa("Legend");
		
		/* Create the pChart object */
		$myPicture = new pImage(700,400,$MyData);

		/* Draw a gradient background */
		$myPicture->drawGradientArea(0,0,700,400,DIRECTION_HORIZONTAL,array("StartR"=>245,"StartG"=>245,"StartB"=>245,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>70));

		/* Create the pPie object */ 
		$PieChart = new pPie($myPicture,$MyData);
		
		/* Define the slice color */
		$PieChart->setSliceColor(0,array("R"=>166,"G"=>190,"B"=>39,"Alpha"=>90));
		$PieChart->setSliceColor(1,array("R"=>6,"G"=>145,"B"=>178,"Alpha"=>90));
		//$PieChart->setSliceColor(2,array("R"=>97,"G"=>113,"B"=>63));
		
		/* Enable shadow computing */ 
		$myPicture->setShadow(FALSE);

		/* Set the default font properties */ 
		$myPicture->setFontProperties(array("FontName"=>"fonts/tahoma.ttf","FontSize"=>14,"R"=>0,"G"=>0,"B"=>0));

		/* Draw a splitted pie chart */ 
		$PieChart->draw3DPie(420,270,array("WriteValues"=>TRUE,"Radius"=>$radio,"DrawLabels"=>FALSE,"DataGapAngle"=>7,"DataGapRadius"=>5,"Border"=>TRUE,"SliceHeight"=>50,"ValueR"=>0,"ValueG"=>0,"ValueB"=>0,"LabelStacked"=>TRUE,"FontSize"=>12));
		$PieChart->drawPieLegend(10,12,array("Style"=>LEGEND_ROUND,"FontSize"=>14,"Alpha"=>50));
		
		/* Render the picture (choose the best way) */
		$nombre_archivo = "images/graphics/$nombre_archivo.png";
		$myPicture->Render($nombre_archivo);	
	}
	
	function GraficoBarras($nombre_archivo, $datos, $etiqueta, $meses, $meta=0, $min=0, $max=100)
	{
		$nombres = $meses;

		/* Create and populate the pData object */
		$MyData = new pData();  
		$MyData->addPoints($datos,$etiqueta);
		$MyData->setAxisName(0,"");
		$MyData->addPoints($nombres,"Months");
		$MyData->setSerieDescription("Months","Month");
		$MyData->setAbscissa("Months");

		/* Create the floating 0 data serie */
		$MyData->addPoints(array(0,0,0),"Floating 0");
		$MyData->setSerieDrawable("Floating 0",FALSE);

		/* Custom colors */
		$serieSettings = array("R"=>166,"G"=>190,"B"=>39,"Alpha"=>90);
		$MyData->setPalette($etiqueta,$serieSettings);
		
		/* Create the pChart object */
		$myPicture = new pImage(700,400,$MyData);
		$myPicture->drawGradientArea(0,0,700,400,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>900));
		$myPicture->drawGradientArea(0,0,700,400,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
		$myPicture->setFontProperties(array("FontName"=>"fonts/calibri.ttf","FontSize"=>14,"R"=>0,"G"=>0,"B"=>0));

		/* Draw the scale  */
		$myPicture->setGraphArea(50,30,680,360);

		$AxisBoundaries = array(0=>array("Min"=>$min,"Max"=>$max));
		
		if($min == 0 && $max == 100)
			$ScaleSettings  = array("Mode"=>SCALE_MODE_START0,"CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		else
			$ScaleSettings  = array("Mode"=>SCALE_MODE_MANUAL,"CycleBackground"=>TRUE,"ManualScale"=>$AxisBoundaries,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		
		$myPicture->drawScale($ScaleSettings);

		/* Turn on shadow computing */ 
		$myPicture->setShadow(TRUE,array("X"=>10,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));

		/* Create the per bar palette */
		/*$Palette = array("0"=>array("R"=>6,"G"=>145,"B"=>178,"Alpha"=>90),
						 "1"=>array("R"=>255,"G"=>247,"B"=>49,"Alpha"=>90),
						 "2"=>array("R"=>165,"G"=>192,"B"=>25,"Alpha"=>90),
						 "3"=>array("R"=>241,"G"=>107,"B"=>46,"Alpha"=>90),
						 "4"=>array("R"=>46,"G"=>151,"B"=>224,"Alpha"=>90),
						 "5"=>array("R"=>176,"G"=>46,"B"=>224,"Alpha"=>90),
						 "6"=>array("R"=>224,"G"=>46,"B"=>117,"Alpha"=>90),
						 "7"=>array("R"=>92,"G"=>224,"B"=>46,"Alpha"=>90),
						 "8"=>array("R"=>224,"G"=>176,"B"=>46,"Alpha"=>90));*/
						 
		/*$Palette = array("0"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "1"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "2"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "3"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "4"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "5"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "6"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "7"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "8"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "9"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95),
						 "10"=>array("R"=>47,"G"=>166,"B"=>227,"Alpha"=>95));*/

		/* Draw the chart */
		//$settings = array("Draw0Line"=>FALSE,"Rounded"=>TRUE,"Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE, "DisplayPos"=>LABEL_POS_OUTSIDE, "DisplayOrintation"=>ORIENTATION_HORIZONTAL,"DisplayValues"=>TRUE, "DisplayR"=>0, "DisplayG"=>0,"DisplayB"=>0,"Surrounding"=>10,"OverrideColors"=>$Palette);
		$settings = array("Draw0Line"=>FALSE,"Rounded"=>TRUE,"Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE, "DisplayPos"=>LABEL_POS_OUTSIDE, "DisplayOrintation"=>ORIENTATION_HORIZONTAL,"DisplayValues"=>TRUE, "DisplayR"=>0, "DisplayG"=>0,"DisplayB"=>0,"Surrounding"=>10);
		$myPicture->drawBarChart($settings);
		
		if($meta > 0)
		{
			$puntos = array();
			for($i=0; $i<count($datos); $i++)
			{
				$puntos[$i] = $meta;
			}	
			
			$MyData->addPoints($puntos,"Meta ".$meta."%");
			$serieSettings = array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>100);
			$MyData->setPalette("Meta ".$meta."%",$serieSettings);
			$myPicture->drawLineChart();
		}

		/* Write the chart legend */
		$myPicture->drawLegend(510,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

		 /* Render the picture (choose the best way) */
		$nombre_archivo = "images/graphics/$nombre_archivo.png";
		$myPicture->Render($nombre_archivo);	
	}
	
	//Genera una imagen con nombre $nombre_archivo que contiene un gráfico de barras en la carpeta ./images/graphics/
	function Grafico2Barras($nombre_archivo, $datos, $etiqueta, $datos2, $etiqueta2, $meses, $meta=0, $min=0, $max=100)
	{
		$nombres = $meses;
		
		/* Create and populate the pData object */
		$MyData = new pData();  
		$MyData->addPoints($datos,$etiqueta);
		$MyData->addPoints($datos2,$etiqueta2);
		$MyData->setAxisName(0,"");
		$MyData->addPoints($nombres,"Months");
		$MyData->setSerieDescription("Months","Month");
		$MyData->setAbscissa("Months");

		/* Create the floating 0 data serie */
		$MyData->addPoints(array(0,0,0),"Floating 0");
		$MyData->setSerieDrawable("Floating 0",FALSE);
		
		/* Custom colors */
		$serieSettings = array("R"=>166,"G"=>190,"B"=>39,"Alpha"=>90);
		$MyData->setPalette($etiqueta,$serieSettings);
		
		$serieSettings2 = array("R"=>6,"G"=>145,"B"=>178,"Alpha"=>90);
		$MyData->setPalette($etiqueta2,$serieSettings2);
		
		/* Create the pChart object */
		$myPicture = new pImage(700,400,$MyData);
		$myPicture->drawGradientArea(0,0,700,400,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>900));
		$myPicture->drawGradientArea(0,0,700,400,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
		$myPicture->setFontProperties(array("FontName"=>"fonts/calibri.ttf","FontSize"=>8));

		/* Draw the scale  */
		$myPicture->setGraphArea(50,30,680,360);
		//$myPicture->setGraphArea(100,60,1240,60);

		$AxisBoundaries = array(0=>array("Min"=>$min,"Max"=>$max));
		
		if($min == 0 && $max == 100)
			$ScaleSettings  = array("Mode"=>SCALE_MODE_START0,"CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		else
			$ScaleSettings  = array("Mode"=>SCALE_MODE_MANUAL,"CycleBackground"=>TRUE,"ManualScale"=>$AxisBoundaries,"DrawSubTicks"=>TRUE,"DrawArrows"=>TRUE,"ArrowSize"=>6);
		
		$myPicture->drawScale($ScaleSettings);

		/* Turn on shadow computing */ 
		$myPicture->setShadow(TRUE,array("X"=>10,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));

		/* Draw the chart */
		$settings = array("Draw0Line"=>FALSE,"Rounded"=>TRUE,"Floating0Serie"=>"Floating 0","Draw0Line"=>TRUE,"Gradient"=>TRUE, "DisplayPos"=>LABEL_POS_OUTSIDE, "DisplayOrintation"=>ORIENTATION_HORIZONTAL,"DisplayValues"=>TRUE, "DisplayR"=>0, "DisplayG"=>0,"DisplayB"=>0,"Surrounding"=>10);
		$myPicture->drawBarChart($settings);
		
		if($meta > 0)
		{
			$puntos = array();
			for($i=0; $i<count($datos); $i++)
			{
				$puntos[$i] = $meta;
			}	
			
			$MyData->addPoints($puntos,"Meta ".$meta."%");
			$serieSettings = array("R"=>255,"G"=>0,"B"=>0,"Alpha"=>100);
			$MyData->setPalette("Meta ".$meta."%",$serieSettings);
			$myPicture->drawLineChart();
		}

		/* Write the chart legend */
		$myPicture->drawLegend(360,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

		 /* Render the picture (choose the best way) */
		$nombre_archivo = "images/graphics/$nombre_archivo.png";
		$myPicture->Render($nombre_archivo);	
	}
	
	
	function Tabla($encabezados, $datos, $utf=0, $suma=0)
	{
		$tabla = '<table style=\'width:100%;\'>';
		$tabla .= '<thead>';
		$tabla .= '<tr>';
		
		for($i=0;$i<count($encabezados);$i++)
		{
			$tabla .= '<th>'.utf8_encode($encabezados[$i]).'</th>';
		}
		
		if($suma)
		{
			$tabla .= '<th>Total</th>';			
		}
		
		$tabla .= '</tr>';
		$tabla .= '</thead>';
		$tabla .= '<tbody>';
		
		$cant = count($encabezados);
		
		for($i=0;$i<count($datos);$i++)
		{
			$tabla .= '<tr>';
			
			for($j=0;$j<$cant;$j++)
			{
				if(($suma == 1)&& ($j == $cant-1))
				{
					if(isset($datos[$i][$j]))
					{
						if(!$utf)
						{
							if($encabezados[$j] == '#')
								$tabla .= '<td>'.($i+1).'</td>';
							else
								$tabla .= '<td>'.htmlspecialchars($datos[$i][$j]).'</td>';
						}
						else
						{
							$tabla .= '<td>'.utf8_encode($datos[$i][$j]).'</td>';
						}
					}
					else
					{
						$tabla .= '<td>&nbsp;</td>';
					}
					$tabla .= '<td>'.($datos[$i][$j])+($datos[$i][$j-1]).'</td>';
				}
				else
				{
					if(isset($datos[$i][$j]))
					{
						if(!$utf)
						{
							if($encabezados[$j] == '#')
								$tabla .= '<td>'.($i+1).'</td>';
							else
								$tabla .= '<td>'.htmlspecialchars($datos[$i][$j]).'</td>';
						}
						else
						{
							$tabla .= '<td>'.utf8_encode($datos[$i][$j]).'</td>';
						}
					}
					else
					{
						$tabla .= '<td>&nbsp;</td>';
					}
				}
			}
			
			$tabla .= '</tr>';
		}
		$tabla .= '</tbody>';
		$tabla .= '</table>';
		
		return $tabla;
	}
	
	

?>