/**
*
* A is for Airplane
*
*/

var $j = jQuery.noConflict();

$j(document).ready(function(){

  // handle menu toggling
	$j('.hamburger').on('click', function(){
		if( $j('nav').hasClass('toggle-nav') ){
			$j('nav').removeClass('toggle-nav');
			$j('nav').find('.main').removeClass('triggerSub');
			$j('nav').find('.sub').removeClass('triggerSub');
		} else {
      $j('nav').addClass('toggle-nav');
      $j('nav').find('.main').addClass('triggerSub');
      $j('nav').find('.sub').addClass('triggerSub');
		}
	});

	// initiate swiperjs
	var totalSlides = $j('.swiper-wrapper').children().length
	if(totalSlides > 1) {
		var swiper = new Swiper('.swiper-container', swiperOptions);
    $j('.prev').addClass('toggle-opacity');
    $j('.next').addClass('toggle-opacity');
	}

  // Add smooth scrollling to hash links
  $j('div.calendar-headers a').on('click', function(e){
  	var hash = this.hash;
  	if (hash !== "") {
	  	e.preventDefault();
	    anchorScroll(hash);
	    $j(this).closest('.calendar-headers').find('.header').removeClass('toggle-anchor');
	    $j(this).closest('.header').addClass('toggle-anchor');
  	}
  });


});