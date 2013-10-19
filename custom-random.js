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
           
		return Math.random();
        return min && max ? min+seed%maximum/maximum*(max-min) : seed%maximum/maximum;  
// if 'min' and 'max' are not provided, return random number between 0 & 1  
      }    
    }    
}  