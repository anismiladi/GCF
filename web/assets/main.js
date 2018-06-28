
//====================================
//news letter
//====================================

$('#button_newsletter').click(function () {
    $('.my_newsletter_modal').fadeIn("slow");
    $('.close_my_newsletter_modal').fadeIn();

});

$('.close_my_newsletter_modal').click(function () {
    $('.my_newsletter_modal').fadeOut( );
    $('.close_my_newsletter_modal').fadeOut("slow");
});

$('.close_newsletter').click(function () {
    $('.my_newsletter_modal').fadeOut( );
    $('.close_my_newsletter_modal').fadeOut("slow");
});

$('.my_newsletter_modal .close_popup').click(function () {
    $('.my_newsletter_modal').fadeOut( );
    $('.close_my_newsletter_modal').fadeOut("slow");
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
    $('.gb_page_overlay').fadeIn();
    $('.gb_popup_details_container').fadeIn("slow");
}

function closeGBPopup() {
    $('.gb_page_overlay').fadeOut("slow");

    $('.gb_popup_details_container').fadeOut();
}



//====================================
// script Popup About GCF
//====================================
function  openAbout(){

    $('.overlay__about__gcf').fadeIn();
    $('.popup__about__gcf').fadeIn( "slow" );


    return false;
}
function closeAbout() {
    $('.overlay__about__gcf').fadeOut("slow");
    $('.popup__about__gcf').fadeOut();
}