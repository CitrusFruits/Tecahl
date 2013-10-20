/**
 * Creates a new map, with dimensions width x height
 */
var Map = function(width, height){
	

	/**
	* The width and height of the map grid. 
	* NOT the pixel width & height.
	*/
	this.width = width;
	this.height = height;

	/**
	* A 2d array of tiles
	*/
	this.tiles = [];

	//initialize the 2d array
	for(var x = 0; x < this.width; x++){
		this.tiles[x] = [];
	}
};

Map.prototype = {

	/**
	* Returns the occupying the specified index.
	*/
	getUnit : function(x, y){
		console.log("Untested Code: Map.getUnit");

	},

	/**
	* Returns all available adjacent map tiles, starting
	* at the top, going clockwise. If used on an edge/corner
	* piece, it will not return tiles off the map
	*/
	getAvailableAdjacentMapTiles: function(x, y){
		console.log("Untested Code: Map.getAvailableAdjacentMapTiles");
	},

	/**
	* Returns all available paths for the given
	* Unit.
	*/
	getAvailablePaths : function(unit){
		console.log("Untested Code: Map.getAvailablePaths");
	},

	/**
	* Returns the map tile at the specified index.
	*/
	getMapTile : function(x, y){
		console.log("Untested Code: Map.getMapTile");
	},

	/**
	* Set's the map tile at the specified index
	* to be the given mapTile.
	*/
	setMapTile : function(x, y, mapTile){
		//console.log("Untested Code: Map.setMapTile");
		//console.log(mapTile);
		this.tiles[x][y] = mapTile;
		//console.log(this.tiles[x][y]);
	},

	/**
	* Returns whether or not the mapTile at the given
	* index is passable, for the given unit
	*/
	isPassable : function(x, y, unit){
		//making sure the operation is safe
		if(this.tiles[x] == undefined || this.tiles[x][y] == undefined){
			console.log("Undefined Tile: Map.isPassable");
			return false;
		}				
		return(this.tiles[x][y].isPassable(unit));
	},

	/**
	* Moves the given unit to the specified index
	* on the map.
	*/
	moveUnit : function(unit, x, y){
		console.log("Untested Code: Map.moveUnit");
	},

	/**
	* A temporary function for getting started
	*/
	print : function(id){
		for(var y = 0; y < this.height; y++){
			for(var x = 0; x < this.width; x++){
			//	console.log(x + " " + y);
				//console.log(this.tiles[x][y]);
				this.tiles[x][y].print(id);
			}
		console.log("Break");
		$("#"+id).append("<br/>");
		}
	}

};