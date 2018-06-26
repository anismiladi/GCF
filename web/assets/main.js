
//====================================
//news letter
//====================================

$('#button_newsletter').click(function () {
    $('.my_newsletter_modal').css('display', 'block' );
    $('.close_my_newsletter_modal').css('display', 'block' );

});

$('.close_my_newsletter_modal').click(function () {
    $('.my_newsletter_modal').css('display', 'none' );
    $('.close_my_newsletter_modal').css('display', 'none' );
});

$('.close_newsletter').click(function () {
    $('.my_newsletter_modal').css('display', 'none' );
    $('.close_my_newsletter_modal').css('display', 'none' );
});

$('.my_newsletter_modal .close_popup').click(function () {
    $('.my_newsletter_modal').css('display', 'none' );
    $('.close_my_newsletter_modal').css('display', 'none' );
});


//===================================================================================
// When the user scrolls down 20px from the top of the document, show the button
//===================================================================================
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("button_go_top").style.display = "block";
    } else {
        document.getElementById("button_go_top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    var body = $("html, body");

    body.stop().animate({scrollTop:0}, 1000, 'swing');
}

//====================================
//Green Blogger popup
//====================================
function showGBpopup(){

    $('.gb_page_overlay').show(500);
    $('.gb_popup_details_container').show(499);

}

function closeGBPopup() {

    $('.gb_page_overlay').hide(499);

    $('.gb_popup_details_container').hide(500);

}



//====================================
// script Popup About GCF
//====================================
function  openAbout(){

    $('.overlay__about__gcf').show(499);
    $('.popup__about__gcf').show( 500 );


    return false;
}
function closeAbout() {
    $('.overlay__about__gcf').hide(500);
    $('.popup__about__gcf').hide( 499 );
}