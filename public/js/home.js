window.onload = () => {
    var elem = document.querySelector('.grid');
    var msnry = new Masonry(elem, {
        // options
        itemSelector: '.grid-item',
    });
}

$(document).ready(function() {
    $('.type-video').hover(function(){
        $(this).children('#my-video').get(0).play();
        $(this).children('#my-video').get(0).muted = true;
    }, function(){
        $(this).children('#my-video').get(0).pause();
    })
})
