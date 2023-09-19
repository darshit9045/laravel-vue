setTimeout(function() {
    var currentUrl = window.location.pathname;
    $(".nav-item").each(function(){
    if($(this).hasClass('home')){
        if(currentUrl == '/'){
            $(this).addClass('active');
        }
    }
    if($(this).hasClass('about-us')){
        if(currentUrl == '/about-us'){
            $(this).addClass('active');
        }
    }
    if($(this).hasClass('contact-us')){
        if(currentUrl == '/contact-us'){
            $(this).addClass('active');
        }
    }
    if($(this).hasClass('residential-projects')){
        if(currentUrl == '/residential-projects'){
            $(this).addClass('active');
        }
    }
})
}, 500);