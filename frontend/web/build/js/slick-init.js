$('.top-carousel').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite:true,
    arrows: true,
    dots: false,
    appendArrows:$('#top-game'),
    autoplay: true,
    autoplaySpeed: 20000,
    prevArrow:'<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
    nextArrow:'<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
    responsive: [
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },{
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.rev-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    rows:2,
    infinite:false,
    appendArrows:$('.arrow-review'),
    prevArrow:'<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
    nextArrow:'<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
    responsive: [
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.wins-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    infinite:false,
    dots: true,
    dotsClass: 'slick-dots winner-dots',
    appendArrows:$('#winner-nav .slider-navigation-inner'),
    appendDots:$('#winner-nav .slider-navigation-inner'),
    prevArrow:'<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
    nextArrow:'<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});
$('.top-bet-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    infinite:true,
    arrows: true,
    dots: false,
    appendArrows:$('#pro-bet'),
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow:'<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
    nextArrow:'<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
    responsive: [
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.bets-slider').slick({
    slidesToShow: 9,
    slidesToScroll: 9,
    infinite:false,
    dots: true,
    dotsClass: 'slick-dots winner-dots',
    appendArrows:$('#bets-nav .slider-navigation-inner'),
    appendDots:$('#bets-nav .slider-navigation-inner'),
    prevArrow:'<button type="button" class="slick-prev"><span class="icon-arrow_left-small"></span></button>',
    nextArrow:'<button type="button" class="slick-next"><span class="icon-arrow_right-small"></span></button>',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 7,
                slidesToScroll: 7
            }
        },
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }
    ]
});