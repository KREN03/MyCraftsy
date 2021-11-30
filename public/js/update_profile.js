$(document).ready(function(){
    $('#image-input').change(function(){
        const file = $(this).get(0).files;
        $('#image-profile').attr('src', URL.createObjectURL(file[0]));
    })
})