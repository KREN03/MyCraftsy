$(document).ready(function () {
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
    let data = [];

    $("#add-list-category").on("click", ".item-category-v2", function (el) {
        const text = el.target.innerText;
        data.push(text);
        const element = ` <div class="item-category p-2 px-3 border rounded"> <p class="font-14">${text}</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-x ms-2 close-category" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" /> </svg> </div> `;
        $(".current-category").append(element);
        $(this).remove();

        $("#kategori_list_input").val(data.join(","));
    });

    $(".current-category").on("click", ".close-category", function (el) {
        const parentName = $(this).parent().parent().attr("id");
        const text = $(this).parent().children(".font-14")[0].innerText;

        if (parentName === "list-category-modal") {
            $("#list-category-page .item-category .font-14")
                .get()
                .map((el) => {
                    if (text === el.innerText) {
                        el.parentElement.remove();
                    }
                });
        }

        if (parentName === "list-category-page") {
            $("#list-category-modal .item-category .font-14")
                .get()
                .map((el) => {
                    if (text === el.innerText) {
                        el.parentElement.remove();
                    }
                });
        }

        $(this).parent().remove();

        const element = ` <div class="item-category-v2 p-2 px-3 border rounded"> <p class="font-14">${text}</p> </div> `;
        $("#add-list-category").append(element);

        data = data.filter((el) => el !== text);

        $("#kategori_list_input").val(data.join(","));
    });
    $(".sold-art")[0].checked = false;
    $(".sold-art").change(function (params) {
        var check = params.target.checked;
        check ? $("#pembayaran").show() : $("#pembayaran").hide();
        check ? $("#is_sell").val(true) : $("#is_sell").val(false);
    });
});
