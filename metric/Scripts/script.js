//Script variables
var btngrp1=Array();
var tabgrp=Array();

function ButtonGroup(name) {
	var buttons=Array(document.getElementsByName(name).length);
		for(i=0; i<document.getElementsByName(name).length; i++){
			buttons[i]=document.getElementsByName(name)[i].id;
			//I know its complicated, but it adds its id to an onclick function
			if(name!="tabgrp"){
			document.getElementsByName(name)[i].setAttribute('onclick', "activateButton('"+document.getElementsByName(name)[i].id+"')");
			document.getElementsByName(name)[i].setAttribute('target','unselected');
			}
			
			}
	return buttons;
}



function Initialize(){	
	
	for(tmp in tableArray){
    	DataComboBox.options[DataComboBox.options.length] = new Option(tmp);
   	}
   btngrp1=ButtonGroup("btngrp1");
   tabgrp=ButtonGroup("tabgrp");
}	
	    	
function UpdateComboBox(){
	    	MeasureComboBox.options.length=0;
	    	var index=document.getElementById("DataComboBox").value;

	    	//document.getElementById("xaxisdata").value="";
	    	for(tmp in tableArray[index]){
		    	MeasureComboBox.options[MeasureComboBox.options.length] = new Option(tableArray[index][tmp]);
		    }
		    
		    DimensionComboBox.options.length=0;
	    	index=document.getElementById("DataComboBox").value;

	    	//document.getElementById("xaxisdata").value="";
	    	DimensionComboBox.options[DimensionComboBox.options.length] = new Option("none");
	    	for(tmp in tableArray[index]){
		    	DimensionComboBox.options[DimensionComboBox.options.length] = new Option(tableArray[index][tmp]);
		    }
		    
		    eval();
		}
		
function activateTab(){

	if(arguments[0]=="simple"){
		document.getElementById("simple").style.display="block";
		document.getElementById("advanced").style.display="none";
		document.getElementById("simple_button").setAttribute('target', 'selected');
		document.getElementById("advanced_button").setAttribute('target', 'unselected');
	}
	if(arguments[0]=="advanced"){
		document.getElementById("simple").style.display="none";
		document.getElementById("advanced").style.display="block";
		document.getElementById("simple_button").setAttribute('target', 'unselected');
		document.getElementById("advanced_button").setAttribute('target', 'selected');
	}

}

function activateButton(id){
	for(i=0;i<btngrp1.length;i++){
		document.getElementById(btngrp1[i]).setAttribute('target', 'unselected');
	}
	document.getElementById(id).setAttribute('target', 'selected');
	//alert(""+getElementsByName("selected_graph").length);
	document.getElementsByName('selected_graph')[0].setAttribute('value',id);
}

/*function activateTab(id){
	for(i=0;i<tabgrp.length;i++){
		document.getElementById(tabgrp[i]).setAttribute('target', 'unselected');
	}
	document.getElementById(id).setAttribute('target', 'selected');

}*/