/**
*
* A is for Airplane
*
*/

var $j = jQuery.noConflict();

$j(document).ready(function(){

	$j('.hamburger').on('click', function(){
		console.log('clicked');
		if( $j('nav').hasClass('toggle-nav') ){
			$j('nav').removeClass('toggle-nav');
		} else {
      $j('nav').addClass('toggle-nav');
		}
	});

});