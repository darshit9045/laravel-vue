/* Cookie Popup*/
var $ = jQuery;
$(document).ready(function() {
    // Check if the user has already accepted cookies
    if (localStorage.getItem('cookiesAccepted') == null) {
        $('.cookie-popup').addClass('show-cookie-popup');
    }

    // When the user clicks the "accept" button
    $('#accept-cookies').on('click', function() {
        localStorage.setItem('cookiesAccepted', true);
        $('.cookie-popup').removeClass('show-cookie-popup');
    });

});
