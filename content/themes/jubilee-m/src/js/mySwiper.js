var interleaveOffset = -.5;

var interleaveEffect = {
  
  onProgress: function(swiper, progress){
        
    for (var i = 0; i < swiper.slides.length; i++){
      
      var slide = swiper.slides[i];
      var translate, innerTranslate;
      progress = slide.progress;
            
      if (progress > 0) {
        translate = progress * swiper.width;
        innerTranslate = translate * interleaveOffset;        
      }
      else {        
        innerTranslate = Math.abs( progress * swiper.width ) * interleaveOffset;
        translate = 0;
      }
      if (i == 0) {
          console.log(progress + ' <- progress');
      }

      $j(slide).css({
        transform: 'translate3d(' + translate + 'px,0,0)'
      });

      $j(slide).find('.slider').css({
        transform: 'translate3d(' + innerTranslate + 'px,0,0)'
      });
    }
  },

  onTouchStart: function(swiper){
    for (var i = 0; i < swiper.slides.length; i++){
      $j(swiper.slides[i]).css({ transition: '' });
    }
  },

  onSetTransition: function(swiper, speed) {
    for (var i = 0; i < swiper.slides.length; i++){
      $j(swiper.slides[i])
        .find('.slider')
        .andSelf()
        .css({ transition: speed + 'ms' });
    }
  }
};

var swiperOptions = {
  loop: true,
  speed: 1000,
  grabCursor: true,
  watchSlidesProgress: true,
  mousewheelControl: true,
  keyboardControl: true,
  nextButton: '.next',
  prevButton: '.prev',
};
 

swiperOptions = $j.extend(swiperOptions, interleaveEffect);


// var swiper = new Swiper('.swiper-container', swiperOptions);



