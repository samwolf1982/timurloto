$(function () {
    console.log('Scrool to');

    // parse url top
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#tope100").offset().top
    }, 800);


})
