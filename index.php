<?php
    $title = "Test Title";
    require('php/head.php');
	require('php/js-gameplay.php');
?>
<style>
	canvas {
		margin:auto;
	}
	#printOutput{
		font-family: "Courier New";
		line-height: .65;
	}
</style>

<div id="holder"></div>

<div style="font-size:30px; color:white" id="output">(0,0)</div>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/phaser/build/phaser.min.js"></script>
<script type="text/javascript">

(function () {

    var game = new Phaser.Game(1280, 720, Phaser.AUTO, 'holder', { preload: preload, create: create, update: update, render: render });
	
	var cursor;
	var map;

    function preload() {

        game.load.tilemap('map-prototype', 'assets/images/tilesets/basic.png', 'assets/maps/test1.json', null, Phaser.Tilemap.JSON);

    }

    function create() {

        game.stage.backgroundColor = '#787878';

        game.add.tilemap(0, 0, 'map-prototype');
        

        //Andrew's code starts here

        var width = 20;	//arbitrary at the moment, need to learn how to properly read from a "Tiled" json map format
        var height = 20;
        map = new Map(width, height, 48, 48);

        for(var y = 0; y < height; y++){
			for(var x = 0; x < width; x++){
				var temp = new MapTile();
				temp.setOccupyingUnit("(" + x + "," + y+")");
				map.setMapTile(x, y, temp);
			}
		}

		//create the cursor
        cursor = new MapCursor(map, game);
		
		//Event for when the mouse is moved
		game.input.mouse.onMouseMove = function(e){
			cursor.setLocation(e.clientX-e.target.offsetLeft, e.clientY - e.target.offsetTop, game.camera.x, game.camera.y);
		};

		//Event for when the mouse is clicked
		game.input.mouse.onMouseDown = function(e){
			switch(e.button){
			//left click
			case 0:
				//console.log(cursor.screenX);
				console.log(game);
				$("#output").html(cursor.getUnit());
				break;
			}
		}
    }
	
    function update() {
		cursor.update();
    }

    function render() {
    }

})();
</script>