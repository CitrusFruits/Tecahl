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

<div id="printOutput"></div>
<div id="holder"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

        var width = 20;
        var height = 20;
        var m = new Map(width, height);

        for(var y = 0; y < height; y++){
			for(var x = 0; x < width; x++){
				var temp = new MapTile(x, y);
				m.setMapTile(x, y, temp);
			}
		}

        m.print("printOutput");


/*(function () {

    var game = new Phaser.Game(1280, 720, Phaser.AUTO, 'holder', { preload: preload, create: create, update: update, render: render });
	
	var mousePos = {x:0, y:0};

    function preload() {

        game.load.tilemap('mario', 'assets/images/tilesets/basic.png', 'assets/maps/test1.json', null, Phaser.Tilemap.JSON);

    }

    function create() {

        game.stage.backgroundColor = '#787878';

        game.add.tilemap(0, 0, 'mario');
        
		
		game.input.mouse.onMouseMove = function(e){
			mousePos.x = e.offsetX;
			mousePos.y = e.offsetY;
		}

    }

	var x = 0;
	
	var PADDING = 100;
	
    function update() {
		x++
		//if(x<500)
			//console.log(game.input.mouse);
	
		if(mousePos.x < PADDING){
				game.camera.x -= 8;
		}
		else if(mousePos.x > game.width-PADDING){
			game.camera.x +=8;
		}
		//console.log("y: "+mousePos.y + " x: " + mousePos.x);
		if(mousePos.y < PADDING){
				game.camera.y -= 8;
		}
		else if(mousePos.y > game.height-PADDING){
			game.camera.y +=8;
		}
		
		
        if (game.input.keyboard.isDown(Phaser.Keyboard.LEFT))
        {
            game.camera.x -= 8;
        }
        else if (game.input.keyboard.isDown(Phaser.Keyboard.RIGHT))
        {
            game.camera.x += 8;
        }

        if (game.input.keyboard.isDown(Phaser.Keyboard.UP))
        {
            game.camera.y -= 8;
        }
        else if (game.input.keyboard.isDown(Phaser.Keyboard.DOWN))
        {
            game.camera.y += 8;
        }

    }

    function render() {
    }

})();*/
</script>

<?php
    require('php/foot.php');
?>