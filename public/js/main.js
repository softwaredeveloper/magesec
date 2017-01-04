
$(window).load(function() {
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider',
    touch: true
  });
 
  $('#slider').flexslider({
    animationLoop: false,
    animation: "slide",
    controlNav: false,
    slideshow: true,
    sync: "#carousel",
    //animationSpeed: 2000,
    //slideshowSpeed: 2000,
    touch: true,

    
  });
});