(function() {
  
	'use strict';
	  
	// find the desired selectors
	var btn = document.getElementById('request');
	var bio = document.getElementById('bio');
	
	// set up a request
	var request = new XMLHttpRequest();
	
	// keep track of the request
	request.onreadystatechange = function() {
	  // check if the response data send back to us 
	  if(request.readyState === 4) {
		// add a border
		bio.style.border = '1px solid #e8e8e8';
		// uncomment the line below to see the request
		// console.log(request);
		// check if the request is successful
		if(request.status === 200) {
		  // update the HTML of the element
		  bio.innerHTML = request.responseText;        
		} else {
		  // otherwise display an error message
		  bio.innerHTML = 'An error occurred during your request: ' +  request.status + ' ' + request.statusText;
		}
	  }
	}
  
	// specify the type of request
	request.open('Get', 'data.txt');
  
	// register an event
	btn.addEventListener('click', function() {
	  // hide the button
	  this.style.display = 'none';
	  // send the request
	  request.send();
	});
	
  })();