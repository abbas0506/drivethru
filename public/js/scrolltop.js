//Get the button
var scrollbutton = document.getElementById("scrollup_btn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    var scroll_pos = 100;
    if (document.body.scrollTop > scroll_pos || document.documentElement.scrollTop > scroll_pos) {
        scrollbutton.style.visibility = 'visible'
    } else {
        scrollbutton.style.visibility = 'hidden'
    }
};

//Click event to scroll to top
function scrolltop() {
    $('html, body').animate({
        scrollTop: 0
    }, 360);
    return false;

}