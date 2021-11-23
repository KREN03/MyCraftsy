$(document).ready(function() {

    $('#input-field').keyup(function (){
        var button = $('#button-comment');
        var text = $(this).val();
        text === "" ?  button.css({
            'display' : 'none',
        }) : button.css({
            'display' : 'flex',
        });
    })
})