<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/style.css" />
		<script type="text/javascript" src="Scripts/script.js" ></script>

	</head>
	
	<body>
		<script language="JavaScript"> 
			<?php
				include("functions.php");
				echo "var tableArray = ". connectMySql() . ";\n";
			?>
		</script>
     
		<?php getHeader(); ?>
     
		<form action="content-edit.php" method="post">
		<div id="box">
			<div class="column">
				<div class="section" id="title">
				<h2>New Graph</h2>
				</div>
		      		
		     	<div class="pane section">
		     		<div class="button_bar">
						<input class="tab" name="tabgrp" id="simple_button" 
						type="button" value="Simple" onclick="activateTab('simple')" target="selected" />
						<input class="tab" id="advanced_button" 
						type="button" name="tabgrp" value="Advanced" onclick="activateTab('advanced')" target="unselected" />
					</div>
						
		      		<div class="panel" id="simple">
						<div class="line">
							<div class="label left">
							Data Type </div>
							<div class="combo right">
							 	<select name="DataComboBox" id="DataComboBox" onchange="UpdateComboBox()">
									 <option>---</option>
								 </select>
							 </div>
						</div>
				
				<div class="line">
						<div class="label left">
							Measure </div>
						<div class="combo right">
							 <select name="MeasureComboBox" id="MeasureComboBox">
								 <option>Select Data type</option>
							 </select>
					</div>
				</div>
				
				<div class="line">
						<div class="label left">
							Dimension </div>
						<div class="combo right">
							 <select name="DimensionComboBox" id="DimensionComboBox">
							 <option>One Hour</option>
							 </select>
					</div>
				</div>
				
				<div class="line" id="graph_chooser">
						<label class="left">
							Select Graph
						</label>
					<div class="right">
					
						<input type="button" name="btngrp1" class="graph_button" id="bar"  />
						<input type="button" name="btngrp1" class="graph_button" id="line" />
						<input type="button" name="btngrp1" class="graph_button" id="pie" />
						<input type="hidden" name="selected_graph" value="NONE"/>
					</div>
				
				</div>
				
				<div class="line">
						<div class="Checkbox">
						Double Graph
							<input type="checkbox" class="right"/>
						
						</div>
				</div>
				<div class="line" name="FavoriteBox">
						<div class="Checkbox">
						Save as Favorite
						<input type="checkbox" class="right"/>
						
					</div>
				</div>
		      		</div>
		      		
		      		<div class="panel" id="advanced">
		      		</div>
		     	</div>
	
	
				<div class="section" id="Bottom">
						<input type="submit" class="button right" value = "Ok" />
						<input type="button" href="google.com" class="button left" value = "Back" />	
				</div>
			</div>
		
		</div>
		</form>
		
		
	
	</body>
	
	<footer>
		<script LANGUAGE="JavaScript"> 
			Initialize();
			eval();
		</script>
	</footer>
</html>
