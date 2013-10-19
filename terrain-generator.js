var DECAY = .55;
var SEED = 26;
var THRESHOLD = .05;
var random = new CustomRandom(SEED);

function createMountain(x, y, height, level){
	//console.log("height: " + height);
	//base case
	if(height < THRESHOLD || level[x] == undefined || level[x][y] == undefined)
		return;
	level[x][y].height += height;
	
	for(var i = x-1; i <= x+1; i++){
		for(var j = y-1; j <= y+1; j++){
			if(i < level.length && i >=0 && j < level[i].length && j >= 0){
				var tile = level[i][j];
				if(tile != undefined && !(i == x && j == y)){
					var number = random.next(0,height)*height*DECAY;
					createMountain(i, j, number, level);
				}
			}
		}
	}
}

function drawWater(x0, y0, x1, y1, level){
	
   var dx = Math.abs(x1-x0);
   var dy = Math.abs(y1-y0);
   var sx = (x0 < x1) ? 1 : -1;
   var sy = (y0 < y1) ? 1 : -1;
   var err = dx-dy;

   while(true){
	   if(x0>=0 && y0 >= 0  && x0 < level.length && y0 < level[x0].length){
			level[x0][y0].label = "water";// Do what you need to for this
			}

		 if ((x0==x1) && (y0==y1)) break;
		 var e2 = 2*err;
		 if (e2 >-dy){ err -= dy; x0  += sx; }
		 if (e2 < dx){ err += dx; y0  += sy; }
   }
}

function getLine(x0, y0, x1, y1, level){
   var dx = Math.abs(x1-x0);
   var dy = Math.abs(y1-y0);
   var sx = (x0 < x1) ? 1 : -1;
   var sy = (y0 < y1) ? 1 : -1;
   var err = dx-dy;
   var lassie = new Array();	//lassie always returns home

   while(true){
	lassie.push(level[x0][y0]);

     if ((x0==x1) && (y0==y1)) break;
     var e2 = 2*err;
     if (e2 >-dy){ err -= dy; x0  += sx; }
     if (e2 < dx){ err += dx; y0  += sy; }
   }
   return lassie;
}

var RIVER_NOISE_AMP = 19;
var RIVER_STEP_SIZE = 4;

function createRiver(startX, startY, endX, endY, level){
	var x0 = startX;
	var y0 = startY;
	var x1 = startX;
	var y1 = startY;
	
	var baseLine = getLine(startX, startY, endX, endY, level);
	
	//get the velocities
	var xVel = endX-startX;
	var yVel = endY-startY;
	//normalize the velocities
	var temp = Math.sqrt(xVel*xVel+ yVel*yVel);
	xVel = xVel/temp;
	yVel = yVel/temp
	console.log(xVel + " " + yVel);

	for(var i = 0; i < endY; i+=RIVER_STEP_SIZE){
		x0 = x1;
		y0 = y1;
		console.log(i);
		x1 = baseLine[i].x + Math.floor(random.next(0,1)*RIVER_NOISE_AMP*yVel);
		y1 = baseLine[i].y + Math.floor(random.next(0,1)*RIVER_NOISE_AMP*xVel);
		drawWater(x0, y0, x1, y1, level);
	}
	drawWater(x0, y0, endX, endY, level);
}
	

//a recursive helper algorithm for create river
function createLake(x, y){
	var myTile = level[x][y];
		if(myTile.label == "water")
			return
		else
			myTile.label = "water";
	var candidates = new Array();
	var candidateHeight = 50000;
	//console.log("start");
	for(var i = x-1; i <= x+1; i++){
		for(var j = y-1; j <= y+1; j++){
			//make sure we're in bounds
			if(i < level.length && i >=0 && j < level[i].length && j >= 0){
				var otherTile = level[i][j];
				//make sure the tile is valid, and not self
				if(otherTile  != undefined && !(i == x && j == y)){
					//if its lower than this tile
					if(otherTile.height <= myTile.height+.1){
						if(otherTile.label != "water"){
							//see the elevation is less
							if(otherTile.height < candidateHeight){
								//console.log("Different height " + otherTile.height + " " + candidateHeight);
								candidates = new Array();
								candidateHeight = otherTile.height
								candidates.push(otherTile);
							}
							//see if the other elevation is the same as other candidates
							else{
								//console.log("Same height\t" + x +","+y);
								cadidateHeight = otherTile.height
								candidates.push(otherTile);
								}
						}
				//		console.log("problem \t" + "label");
					}
		//			console.log("problem \t" + "height\t" + otherTile.height + ">" + myTile.height);
				}
				else{
			//		console.log("problem \t" + "not a valid option");
				}
			}
		}
	}
//	console.log(candidates.length + " candidates\t" + x +","+y);
	if(candidates.length == 0){
		myTile.label = "end";
		return;
	}
	var index = Math.floor(candidates.length*random.next());
	createLake(candidates[index].x, candidates[index].y);
}