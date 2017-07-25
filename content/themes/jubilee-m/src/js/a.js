/**
*
* A is for Airplane
*
*/

var $j = jQuery.noConflict();

$j(document).ready(function(){

  // handle menu toggling
	$j('.hamburger').on('click', function(){
		console.log('clicked');
		if( $j('nav').hasClass('toggle-nav') ){
			$j('nav').removeClass('toggle-nav');
		} else {
      $j('nav').addClass('toggle-nav');
		}
	});

	// initiate swiperjs
	var totalSlides = $j('.swiper-wrapper').children().length
	if(totalSlides > 1) {
		var swiper = new Swiper('.swiper-container', swiperOptions);
    $j('.prev').addClass('toggle-opacity');
    $j('.next').addClass('toggle-opacity');
	}





});