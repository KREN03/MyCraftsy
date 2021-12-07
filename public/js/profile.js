window.onload = () => {
    var elem = document.querySelector('#grid-profile');
    var msnry = new Masonry(elem, {
        // options
        itemSelector: '.grid-item',
        gutter: 10
    });
}

$(document).ready(function(){
    $('#button-profile').click(function(){
        
    })
    $('.button-banner-menu').click(function(){
        $(this).children('.modal-menu').toggle();
    })
})