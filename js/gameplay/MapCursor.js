/**
* Creates a new cursor.
* @param map The map this cursor will be hovering.
* @param game The current game.
*/
var MapCursor = function(map, game){

	this.xWorld = 0;
	this.yWorld = 0;

	this.xScreen = 0;
	this.yScreen = 0;

	this.map = map;
	this.game = game;
	this.scrollLock = false;

	this.PADDING = 100;
	this.SCROLL_SPEED = 15;
}

MapCursor.prototype = {

	update : function(){

		//call scroll
		this.scroll(this.xScreen, this.yScreen);
	},

	/**
	* Updates the location of the cursor
	* @param xScreen The x position of the cursor, with respect to the screen
	* @param yScreen The y position of the cursor, with respect to the screen
	* @param xOffset The x offset of the camera
	* @param yOffset The y offset of the camera
	*/
	setLocation : function(xScreen, yScreen, xOffset, yOffset){
		//default values
		if(typeof(xOffset) == "undefined") xOffset = 0;
		if(typeof(yOffset) == "undefined") yOffset = 0;

		this.xScreen = xScreen;
		this.yScreen = yScreen;

		this.xWorld = xScreen + xOffset;
		this.yWorld = yScreen + yOffset;
	},

	/**
	* Scrolls the screen when the cursor is at the edge of
	* the screen. Typically will not be called
	* @param xSceen The x position of the cursor, with respect to the screen
	*/
	scroll : function (){
		if(this.scrollLock)
			return;
		if(this.xScreen < this.PADDING){
		this.game.camera.x -= this.SCROLL_SPEED;
		}
		else if(this.xScreen > this.game.width-this.PADDING){
			this.game.camera.x +=this.SCROLL_SPEED;
		}
		if(this.yScreen < this.PADDING){
				this.game.camera.y -= this.SCROLL_SPEED;
		}
		else if(this.yScreen > this.game.height-this.PADDING){
			this.game.camera.y +=this.SCROLL_SPEED;
		}
		
		
        if (this.game.input.keyboard.isDown(Phaser.Keyboard.LEFT))
        {
            this.game.camera.x -= this.SCROLL_SPEED;
        }
        else if (this.game.input.keyboard.isDown(Phaser.Keyboard.RIGHT))
        {
            this.game.camera.x += this.SCROLL_SPEED;
        }

        if (this.game.input.keyboard.isDown(Phaser.Keyboard.UP))
        {
            this.game.camera.y -= this.SCROLL_SPEED;
        }
        else if (this.game.input.keyboard.isDown(Phaser.Keyboard.DOWN))
        {
            this.game.camera.y += this.SCROLL_SPEED;
        }
	},

	/**
	* Returns the unit at the current location of the cursor.
	* Returns undefined if there is no such unit, or if the cursr
	* is out of bounds.
	*/
	getUnit : function(){
		var xIndex = Math.floor(this.xWorld/this.map.tileWidth);
		if(xIndex > this.map.width)
			return undefined;
		var yIndex = Math.floor(this.yWorld/this.map.tileHeight);
		if(yIndex > this.map.width)
			return undefined;
		return this.map.getUnit(xIndex, yIndex);
	}
}