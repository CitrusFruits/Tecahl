var MapTile = function (xPos, yPos){

	this.occupyingUnit = undefined;
	this.collisionLayer = CollisionLayers.NONE;

	this.xPos = xPos;
	this.yPos = yPos;
};

MapTile.prototype = {
		
	setOccupyingUnit : function(unit){
		console.log("Untested Code: MapTile.setOccupyingUnit");
		this.occupyingUnit = unit;
		this.occupyingUnit;
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