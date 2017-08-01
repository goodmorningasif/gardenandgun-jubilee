/*
*
* ANCHOR SCROLL
*
* @param hash -> hash from anchor object
* 
* Takes anchor hash and adds it to the window location object
* but adds an animtion in between.
*
*/

var anchorScroll = function(hash){
  $j('html, body').animate({
  	scrollTop: $j(hash).offset().top
  }, 900, function(){
  	window.location.hash = hash;
  });
}