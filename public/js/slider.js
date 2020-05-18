$(document).ready(function(){
    
    $('.items-slide').slick({
        centerMode: false,
        centerPadding: '10px',
        slidesToShow: 7,
        slidesToScroll: 3,
        infinite: true,
        prevArrow: $('.prev1'),
        nextArrow: $('.next1'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });


      $('.items-slide2').slick({
        centerMode: false,
        centerPadding: '90px',
        slidesToShow: 7,
        slidesToScroll: 3,
        infinite: true,
        prevArrow: $('.prev2'),
        nextArrow: $('.next2'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });

      $('.items-slide3').slick({
        centerMode: false,
        centerPadding: '90px',
        slidesToShow: 7,
        slidesToScroll: 3,
        infinite: true,
        prevArrow: $('.prev3'),
        nextArrow: $('.next3'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });

      $('.items-slide4').slick({
        centerMode: false,
        centerPadding: '90px',
        slidesToShow: 7,
        slidesToScroll: 3,
        infinite: true,
        prevArrow: $('.prev4'),
        nextArrow: $('.next4'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: false,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: false,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });


  });


  