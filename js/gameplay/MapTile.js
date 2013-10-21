/**
* Creates a new map tile.
* @param xIndex The index within the tiles
*/
var MapTile = function (){

	this.occupyingUnit = undefined;
	this.collisionLayer = CollisionLayers.NONE;
};

MapTile.prototype = {

	/**
	* Returns the Unit that is occupying this MapTile
	*/
	getUnit : function(){
		return this.occupyingUnit;
	},
		
	setOccupyingUnit : function(unit){
		this.occupyingUnit = unit;
	},

	isPassable : function(unit){
		console.log("Untested Code: MapTile.isPassable");

		//making sure the operation is safe
		if(unit == undefined){
			console.log("Undefined Unit: MapTile.isPassable");
			return false
		}
		return this.collisionLayer & unit.collisionLayer && this.occupyingUnit.collisionLayer & unit.collisionLayer;
	},

	/**
	* A temporary function for getting started
	*/
	print : function(id){
		$("#"+id).append("x");
	}
};