$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
        },
    });

    $(".input-field").keyup(function () {
        var button = $(this).parent().children(".button-comment");
        var text = $(this).val();
        text === ""
            ? button.css({
                  display: "none",
              })
            : button.css({
                  display: "flex",
              });
    });

    var like = $(".bi-heart-fill");

    $(".bi-heart-fill").click(function () {
        var val = $(this).attr("active") === "true";
        var work_id = $("#work_id").val();
        var like_count = $("#likes_count").html();

        $.ajax({
            method: "POST",
            url: `/like/${work_id}`,
            data: {
                work_id: work_id,
            },
            success: function (hasil) {
                hasil
                    ? $("#likes_count").html(+like_count + 1)
                    : $("#likes_count").html(+like_count - 1);
                if (val) {
                    like.attr("active", "false");
                    like.removeClass("actived");
                    like.css({
                        fill: "#fff",
                    });
                } else {
                    like.css({
                        fill: "#ff1e00",
                    });
                    like.addClass("actived");
                    like.attr("active", "true");
                }
            },
        });
    })

    $('#image-video-like').dblclick(function () {
        var val = $('.bi-heart-fill').attr('active') === 'true';
        var work_id = $('#work_id').val();
        var like_count = $('#likes_count').html();

        if (val) {
            $('.icon-likes').addClass('active');
            setTimeout(() => {
                $('.icon-likes').removeClass('active');
            }, 400)
        } else {
            $('.icon-likes').addClass('active');
            setTimeout(() => {
                $('.icon-likes').removeClass('active');
            }, 400)
            $.ajax({
                method: "POST",
                url: `/like/${work_id}`,
                data: {
                    work_id: work_id,
                },
                success: function (hasil) {
                    hasil ? $('#likes_count').html(+like_count + 1) : $('#likes_count').html(+like_count - 1);
                    if (val) {
                        like.attr('active', 'false');
                        like.removeClass('actived');
                        like.css({
                            fill: '#fff'
                        })
                    } else {
                        like.css({
                            fill: '#ff1e00'
                        })
                        like.addClass('actived');
                        like.attr('active', 'true');
                    }
                },
            });
        }
    })
})
