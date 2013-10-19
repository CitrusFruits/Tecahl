<html>
<header>
	<title>Charts</title>
	<link rel="stylesheet" type="text/css" href="CSS/header.css" />
	<link rel="stylesheet" type="text/css" href="CSS/style.css" />
		<link rel="stylesheet" type="text/css" href="CSS/display_graph.css" />
		<?php>include("config.php");?>
		<?php include("functions.php");?>
		<?php include("highChartsHelper.php");?>
		<?php getHeader();?>
	<style type="text/css"></style>
</header>
<?php
echo("<div id='charts'>");
$mysqli = new mysqli(host, username, password, database);
$query = "SELECT priority, graph_label, j_label, table_name, x_data, y_data, graph_type, series_label, x_label, y_label FROM graphs ORDER BY priority;";
$result_array = array();
$jlabels = array();
/*
 * 0	priority		6	graph_type
 * 1	graph_label		7	series_label
 * 2	j_label			8	x_label
 * 3	tabel_name		9	y_label
 * 4	x_data
 * 5	y_data
 * */
 $chartArray = array();
 $counter = 0;
if ($q_result = $mysqli->query($query)) {//if the query was succesful
    while ($row = $q_result->fetch_row()) {//keep going through each of the graphs
		if($row[6] == "digit")
			{
				$query2 = "SELECT * FROM $row[3];"; //getting count of the current table
				if ($q_result2 = $mysqli->query($query2))
				{
					$result_array2=getColumn($q_result2, 0);
					$chartArray[$counter] = array($row[1], count($result_array2));
					$jlabels[$counter]=$row[2];
					//print_r($chartArray[$counter]);
				}
			}
		else
		{
			$query2 = "SELECT $row[4] FROM $row[3];"; //selecting xdata from the current table
			$query3 = "SELECT $row[5] FROM $row[3];"; //selecting ydata from the current table
			if ($q_result2 = $mysqli->query($query2))
			{
				if($q_result3 = $mysqli->query($query3)) 
				{
					$result_array2 = getColumn($q_result2, 0);
					$result_array3 = getColumn($q_result3, 0);
					//print_r($result_array2);
					//echo("<br/>");
					//print_r($result_array3);
					contentsToFloat($result_array2);
					contentsToFloat($result_array3);
					$tempSeries = makeSeries($result_array2, $result_array3, $row[7]);
					$chartArray[$counter] = makeChart($row[6], $row[1], $row[2], $row[8], $row[9]);
					$chartArray[$counter]->addSeries($tempSeries);
				}
				$jlabels[$counter]=$row[2];
			}
		}
		$counter++;	
	}
}?>
	<script src="scripts/jquery-1.6.1.min.js"></script>
	<script src="scripts/jquery-ui-1.8.22.min.js"></script>
	<script>
	$(function() {
		$( ".sortable" ).sortable();
		$( ".sortable" ).disableSelection();
		$( ".sortable" ).sortable({
			update: function(event, ui)
			{
				var result = $('.sortable').sortable('toArray');
				var mail = "";
				for(x = 0; x < result.length; x++)
				{
					mail = mail+x+"="+result[x];
					if(x+1!=result.length)
						mail = mail+"&";
				}
				mail = "size="+result.length+"&"+mail;
				mail = "function=updatePriority&"+mail;
				$.ajax({
					type: "POST", 
					url: "ajax.php", 
					data: mail,
					success: function(msg){
						//alert(msg);  
					}
					});
			}
		});
	});
	$(function(){
	$( '.digit' ).each(function ( i, box ) {

		var width = $( box ).width(),
			html = '<span style="white-space:nowrap">',
			line = $( box ).wrapInner( html ).children()[ 0 ],
			n = 200;
		$( box ).css( 'font-size', n );

		while ( $( line ).width() > width ) {
			$( box ).css( 'font-size', --n );};
		$( box ).text( $( line ).text() );

	});
	});
	</script>
<?php
echo HighRoller::setHighChartsLocation("HighRoller/highcharts/highcharts.js");
echo HighRoller::setHighChartsThemeLocation("HighRoller/highcharts/themes/gray.js");  
  echo("<ul class=\"sortable\" style='z-index: bottom'>");
	for($x=0; $x<count($jlabels); $x++)
	{
		if(is_array($chartArray[$x]))
		{
			$temp=$chartArray[$x];
			echo ("<li id=\"$jlabels[$x]\"class='digitbox'><br/>$temp[0]");
			echo("<table style=\"color: white; height:95%x; width:95%\">
				  <tr valign=\"middle\">
					<th><span><div class='digit'>
						$temp[1]
					</div></span></th>
				  </tr>
				</table></li>");
		}
		else
		{
			echo ("<li id=\"$jlabels[$x]\">");
			echo "<script type=\"text/javascript\">";
			echo $chartArray[$x]->renderChart();
			echo "</script></li>";
		}
	}
	echo("</div></ul>");
  ?>
  <script type='text/javascript'> 
</script>
</div>
</html>
