// register the callback when a pointerlock event occurs
document.addEventListener('pointerlockchange', changeCallback, false);
document.addEventListener('mozpointerlockchange', changeCallback, false);
document.addEventListener('webkitpointerlockchange', changeCallback, false);    

console.log($("#holder"));
 // when element is clicked, we're going to request a
        // pointerlock
        $("#holder").click(function () {
            var canvas = $("#holder").get()[0];
            canvas.requestPointerLock = canvas.requestPointerLock ||
                    canvas.mozRequestPointerLock ||
                    canvas.webkitRequestPointerLock;
 
            // Ask the browser to lock the pointer)
            canvas.requestPointerLock();
        });
		  // called when the pointer lock has changed. Here we check whether the
    // pointerlock was initiated on the element we want.
    function changeCallback(e) {
        var canvas = $("#holder").get()[0];
		console.log(canvas);
        if (document.pointerLockElement === canvas ||
                document.mozPointerLockElement === canvas ||
                document.webkitPointerLockElement === canvas) {
 
            // we've got a pointerlock for our element, add a mouselistener
         //  document.addEventListener("mousemove", moveCallback, false);
        } else {
 
            // pointer lock is no longer active, remove the callback
           // document.removeEventListener("mousemove", moveCallback, false);
 
            // and reset the entry coordinates
            entryCoordinates = {x:-1, y:-1};
        }
    };
	
	 // handles an event on the canvas for the pointerlock example
    var entryCoordinates = {x:-1, y:-1};
    function moveCallback(e) {
 
        var canvas = $("#holder").get()[0];
        var ctx = canvas.getContext('2d');
 
        // if we enter this for the first time, get the initial position
        if (entryCoordinates.x == -1) {
            entryCoordinates = getPosition(canvas, e);
        }
 
 
        //get a reference to the canvas
        var movementX = e.movementX ||
                e.mozMovementX ||
                e.webkitMovementX ||
                0;
 
        var movementY = e.movementY ||
                e.mozMovementY ||
                e.webkitMovementY ||
                0;
 
 
        // calculate the new coordinates where we should draw the ship
        entryCoordinates.x = entryCoordinates.x + movementX;
        entryCoordinates.y = entryCoordinates.y + movementY;
 
        if (entryCoordinates.x > $('#pointerLock').width() -65) {
            entryCoordinates.x = $('#pointerLock').width()-65;
        } else if (entryCoordinates.x < 0) {
            entryCoordinates.x = 0;
        }
 
        if (entryCoordinates.y > $('#pointerLock').height() - 85) {
            entryCoordinates.y = $('#pointerLock').height() - 85;
        } else if (entryCoordinates.y < 0) {
            entryCoordinates.y = 0;
        }
 
 
        // determine the direction
        var direction = 0;
        if (movementX > 0) {
            direction = 1;
        } else if (movementX < 0) {
            direction = -1;
        }
    }