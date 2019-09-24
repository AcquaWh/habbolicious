$( function() {
    $( "#slider" ).slider();
    $('[data-toggle="tooltip"]').tooltip();
} );
$('.owl-carousel').owlCarousel({
     autoplay:true,
     responsive:{
         0:{
             items:1
         },
         600:{
             items:1
         },
         1000:{
             items:1
         }
     }
 })