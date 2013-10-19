<?php
  require_once('HighRoller/HighRoller/HighRoller.php');
  require_once('HighRoller/HighRoller/HighRollerSeriesData.php');
  require_once('HighRoller/HighRoller/HighRollerBarChart.php');
  require_once('HighRoller/HighRoller/HighRollerPieChart.php');
  require_once('HighRoller/HighRoller/HighRollerLineChart.php');
  require_once('HighRoller/HighRoller/HighRollerColumnChart.php');
  require_once('HighRoller/HighRoller/HighRollerLineChart.php');
  require_once('HighRoller/HighRoller/HighRollerSplineChart.php');
  require_once('HighRoller/HighRoller/HighRollerAreaChart.php');
  require_once('HighRoller/HighRoller/HighRollerAreaSplineChart.php');
  require_once('HighRoller/HighRoller/HighRollerScatterChart.php');
  function makeSeries($xData, $yData=null, $seriesName=null)
  {
	$series = new HighRollerSeriesData();
	if($yData==null)
	{
		$series->addData($xData);
	}
	else
	{
		$array=make2dArray($xData, $yData);
		$series->addData($array);
	}
	if($seriesName!=null)
		$series->addName($seriesName);
	return $series;
  }
  //jname can not have any special characters (spaces, _, etc.)
  function makeChart($graphType, $name, $jname, $xLabel, $yLabel)
  {
	$chart = null;
	switch ($graphType) 
	{
    case "pie":
        $chart = new HighRollerPieChart();
        break;
	case "line":
        $chart = new HighRollerLineChart();
        break;
    case "column":
        $chart = new HighRollerColumnChart();
        break;
    case "spline":
        $chart = new HighRollerSplineChart();
        break;
    case "area":
        $chart = new HighRollerAreaChart();
        break;
    case "areaSpline":
        $chart = new HighRollerAreaSplineChart();
        break;
    case "scatter":
        $chart = new HighRollerScatterChart();
        break;
    case "bar":
        $chart = new HighRollerBarChart();
        break;
  }

  if($chart==null)
  {
	  error_log("Put in a valid chart type");
  }
  $chart->chart->renderTo = $jname;
  $chart->title->text = $name;
  $chart->xAxis->title->text = $xLabel;
  $chart->yAxis->title->text = $yLabel;
  $chart->chart->height = 300;
  return $chart;
}
function getColumn($queryResult, $columnNumber) 
{	
	$result_array= null;
	while($myrow = $queryResult->fetch_row())
			{
				$temp=$myrow[$columnNumber];
				$result_array[]=$temp;
			}
	return $result_array;
}
function contentsToFloat(&$array)
{
	foreach ($array as &$value)
	{
		settype($value, "float");
	}
}
function make2dArray($array1, $array2)
{
	if (count($array1)!=count($array2))
	{
		error_log("Arrays must be the same length!");
		return;
	}
	$count = count($array1);
	$lassie = array(array());//lassie goes home
	for ($i = 0; $i < $count ; $i++)
	{
		$lassie[$i]=array($array1[$i], $array2[$i]);
	}
	return $lassie;
}
?>
