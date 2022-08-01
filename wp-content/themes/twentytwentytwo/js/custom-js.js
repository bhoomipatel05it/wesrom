jQuery(document).ready(function($) {
	console.log('Document Ready');

	// Initialize simple slick slider
  $('.simple-slick-slider').slick();	

  // Initialize post slick carousel slider
  $(".post-slick-carousel-slider").slick({
    centerMode: true,
    centerPadding: "50px",
    slidesToShow: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: false,
          centerPadding: "20px",
          slidesToShow: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: false,
          centerPadding: "20px",
          slidesToShow: 1,
          arrows: true,
        }
      }
    ]
  });	
});