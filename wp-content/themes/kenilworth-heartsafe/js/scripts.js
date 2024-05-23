// Passive event listeners
jQuery.event.special.touchstart = {
  setup: function( _, ns, handle ) {
      this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
  }
};
jQuery.event.special.touchmove = {
  setup: function( _, ns, handle ) {
      this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
  }
};


//== Mobile Nav toggle
function mobileNavToggle() {
  let openNavEl = document.querySelector('.js-open-nav');
  let closeNavEl = document.querySelector('.js-close-nav');
  let header = document.querySelector('.site-header');

  openNavEl.addEventListener('click', function(){
    header.classList.add('site-header--nav-open');
  });

  closeNavEl.addEventListener('click', function(){
    header.classList.remove('site-header--nav-open');
  });

};


//== Supporters Carousel

$(".supporters .owl-carousel").owlCarousel({
  // animateOut: 'fadeOut',
  items: 2,
  autoplay: true,
  // lazyLoad: true,
  mouseDrag: true,
  touchDrag: true,
  margin: 20,
  autoplayTimeout: 4000,
  loop: true,
  nav: false,
  dots: true,
  responsive : {
    480 : {
      items: 3
    },
    768 : {      
      items: 4,
      margin: 20      
    },
    992 : {
      items: 4,
      nav: true 
    },
    1200 : {
      items: 5,
      nav: true
    },
    1920 : {
      items: 7,
      margin: 30,
      nav: true
    }
}
});


//== On Document Load
document.addEventListener("DOMContentLoaded", function() {
  mobileNavToggle();
});