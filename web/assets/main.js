
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

    $('.gb_page_overlay').css('display', 'block');
    $('.gb_popup_details_container').css('display', 'block');

}

function closeGBPopup() {

    $('.gb_page_overlay').css('display', 'none');

    $('.gb_popup_details_container').css('display', 'none');

}
