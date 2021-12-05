$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
        },
    });

    $(".fa-thumbs-up").click(function () {
        var message_id = $(this).data("id");
        var val = $(this).attr("active") === "true";
        console.log(val);
        var like_count = $(`#likes_count-${message_id}`).html();
        console.log(like_count);

        var message_choosed = $(`#message-${message_id}`);

        $.ajax({
            method: "POST",
            url: `/like_message/${message_id}`,
            data: {
                message_id: message_id,
            },
            success: function (hasil) {
                hasil
                    ? $(`#likes_count-${message_id}`).html(+like_count + 1)
                    : $(`#likes_count-${message_id}`).html(+like_count - 1);
                if (val) {
                    message_choosed.attr("active", "false");
                    message_choosed.removeClass("fas");
                    message_choosed.addClass("far");
                } else {
                    message_choosed.removeClass("far");
                    message_choosed.addClass("fas");
                    message_choosed.attr("active", "true");
                }
            },
        });
    });
});
