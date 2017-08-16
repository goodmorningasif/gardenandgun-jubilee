/**
*
* emma-ajax
*
*/

var emmaAJAX = function(myData, output){
	console.log(myData, 'outputs myData');
	$j.ajax({
		url: "content/themes/jubilee-m/myEmma.php",
		type: "POST",
		data: myData,
		success: function(data){
      console.log('Emma Fetch Success', data);
      $j(output).empty();
      var message = eval(data);
      for(var i=0; i<message.length;i++){
	      $j(output).append('<h3>' + message[i] + '</h3>');
      	
      }
		},
		error: function(err){
			console.log('Emma Fetch Fail', err);
			$j(output).empty();
			$j(output).append('<h3>There was an error with your submission. Please try again.</h3>');
		}
	});
}