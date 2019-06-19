



/**
 * Generate random string
 */
function random_string(string_length){
	var text = "";
	var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	for(var i = 0; i < string_length; i++)
		text += possible.charAt(Math.floor(Math.random() * possible.length));

	return text;
}

//--------------------------------------------------------------------------------------------------------------------

/**
 *  Display div element slowly then hide after 5 sec
 *  @param  divElement: div element to be showed
 			location: redirect location after displaying div, 
 					  pass false if no redirect needed
 */
function dismissible_msg( divElement , location ){
	  $j(divElement).show("slow", function(){
			setTimeout(function(){
				$j(divElement).hide("slow"); 
				if (location){
					window.location.href = location;
				}
			}, 5000);
		});		
}
