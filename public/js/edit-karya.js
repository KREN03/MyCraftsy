let data = [];

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
        },
    });

    first();
    load_data();

    function element(
        id,
        name,
        version,
        isClose = true
    ) {
        var element = isClose ? `<div class="${version} p-2 px-3 border rounded" data-id="${id}"> <p class="font-14">${name}</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-x ms-2 close-category" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" /> </svg> </div>` : `<div class="${version} p-2 px-3 border rounded" data-id="${id}">
        <p class="font-14" data-id="${id}">${name}</p>
    </div>`;

        return element;
    }

    function first() {
        var category = JSON.parse($('#kategori_list_input').val()).map(({
            id,
            name
        }) => {
            data.push(id);
            $(".current-category").append(element(id, name, 'item-category'));
        });

        $("#kategori_list_input").val(data.join(","));
    }


    $("#exampleModal").on('keyup', '#input_category', function () {
        load_data($(this).val());
    })


    function load_data(keyword = "") {
        $("#add-list-category").children().remove();
        $.ajax({
            method: "POST",
            url: `/getCategory`,
            data: {
                keyword: keyword,
                data: data,
            },
            success: function (hasil) {
                $("#add-list-category").children().remove();
                hasil.map((item) => {
                    const {
                        id,
                        name
                    } = item;


                    var element = `<div class="item-category-v2 p-2 px-3 border rounded" data-id="${id}">
                                        <p class="font-14" data-id="${id}">${name}</p>
                                    </div>`;
                    $("#add-list-category").append(element);
                })
            },
        });
    }

    var input = document.getElementById("input-file");
    var image = document.getElementById("image-input");
    var video = document.getElementById("my-video");
    input.onchange = (evt) => {
        const [file] = input.files;
        if (file) {
            const type = file.type.split("/")[0];
            if (type === "image") {
                video.style.display = "none";
                image.style.display = "flex";
                image.src = URL.createObjectURL(file);
            }
            if (type === "video") {
                image.style.display = "none";
                video.style.display = "flex";
                video.src = URL.createObjectURL(file);
                video.style.width = "100%";
                video.style.height = "500px";
                video.style.top = "0";
                // video.play();
            }
        }
    };

    $("#add-list-category").on("click", ".item-category-v2", function (el) {
        const name = el.target.innerText;
        const id = $(this).data("id");
        data.push(id);
        $(".current-category").append(element(id, name, 'item-category'));
        $(this).remove();
        $("#kategori_list_input").val(data.join(","));
    });

    $(".current-category").on("click", ".close-category", function (el) {
        const parentName = $(this).parent().parent().attr("id");
        const name = $(this).parent().children(".font-14")[0].innerText;
        const id = $(this).parent().data('id');

        if (parentName === "list-category-modal") {
            $("#list-category-page .item-category .font-14")
                .get()
                .map((el) => {
                    if (name === el.innerText) {
                        el.parentElement.remove();
                    }
                });
        }

        if (parentName === "list-category-page") {
            $("#list-category-modal .item-category .font-14")
                .get()
                .map((el) => {
                    if (name === el.innerText) {
                        el.parentElement.remove();
                    }
                });
        }

        $(this).parent().remove();

        $("#add-list-category").append(element(id, name, 'item-category-v2', false));

        data = data.filter((el) => el !== id);

        // console.log(text);

        $("#kategori_list_input").val(data.join(","));
    });
    $("#is_sell").val() == 'true' ? $("#pembayaran").show() : $("#pembayaran").hide();
    
    $(".sold-art").change(function (params) {
        var check = params.target.checked;
        check ? $("#pembayaran").show() : $("#pembayaran").hide();
        check ? $("#is_sell").val(true) : $("#is_sell").val(false);
    });
});
