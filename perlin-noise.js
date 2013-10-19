var CustomRandom = function(nseed) {    
  
  var seed,    
    constant = Math.pow(2, 13)+1,    
    prime = 1987,    
//any prime number, needed for calculations, 1987 is my favorite:)  
    maximum = 1000;    
//maximum number needed for calculation the float precision of the numbers (10^n where n is number of digits after dot)  
    if (nseed) {    
      seed = nseed;    
    }    
    
    if (seed == null) {    
//before you will correct me in this comparison, read Andrea Giammarchi's text about coercion http://goo.gl/N4jCB  
      
      seed = (new Date()).getTime();   
//if there is no seed, use timestamp     
    }     
    
    return {    
      next : function(min, max) {    
        seed *= constant;    
        seed += prime;    
           
      
        return min && max ? min+seed%maximum/maximum*(max-min) : seed%maximum/maximum;  
// if 'min' and 'max' are not provided, return random number between 0 & 1  
      }    
    }    
}  

function Noise(x, y){
	n = x + y*103 + BASE_SEED;
	var rng = CustomRandom(n);
	return rng.next(0, 1);
	
}

function Noise1( x,  y){
    var n = x + y * 57;
    var n = (n<<13) ^ n;
    return ( 1.0 - ( (n * (n * n * 15731 + 789221) + 1376312589) & 0x7fffffff) / 1073741824.0);    
}

  function SmoothedNoise1(x, y){
	var  corners = ( Noise(x-1, y-1)+Noise(x+1, y-1)+Noise(x-1, y+1)+Noise(x+1, y+1) ) / 16;
    var sides   = ( Noise(x-1, y)  +Noise(x+1, y)  +Noise(x, y-1)  +Noise(x, y+1) ) /  8;
    var center  =  Noise(x, y) / 4;
    return corners + sides + center
  }

  function InterpolatedNoise_1(x, y){

      var integer_X    = Math.floor(x);
      var fractional_X = x - integer_X;	

      var integer_Y    = Math.floor(y);
      var fractional_Y = y - integer_Y;

      var v1 = SmoothedNoise1(integer_X,     integer_Y);
      var v2 = SmoothedNoise1(integer_X + 1, integer_Y);
      var v3 = SmoothedNoise1(integer_X,     integer_Y + 1);
      var v4 = SmoothedNoise1(integer_X + 1, integer_Y + 1);

      var i1 = Cosine_Interpolate(v1 , v2 , fractional_X);
      var i2 = Cosine_Interpolate(v3 , v4 , fractional_X);

      return Cosine_Interpolate(i1 , i2 , fractional_Y);

  }


  function PerlinNoise_2D(x, y){

      var total = 0;
      var p = persistence;
      var n = Number_Of_Octaves - 1;

	  for(var i = 0; i < n; i++){

          var frequency = Math.pow(2, i);
          var amplitude = Math.pow(p, i);

          var total = total + InterpolatedNoise_1(x * frequency, y * frequency) * amplitude;

      }

      return total;
	}
	
	function Cosine_Interpolate(a, b, x){
		var ft = x * 3.1415927;
		var f = (1 - Math.cos(ft)) * .5;

		return  a*(1-f) + b*f;
	}