@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/add_karya.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="d-flex justify-content-center py-3">
            <div class="col-12 col-md-9 p-0">
                <div class="input-image-video rounded">
                    <img src="{{ asset('image/input-karya.png') }}" alt="" srcset="" id="image-input"
                        class="image-input">
                    <video src="" frameborder="0" class="video-input" id="video-input"></video>
                    <input type="file" id="input-file" accept="image/, video/">
                </div>
                <div class="my-3">
                    <label for="input_judul" class="form-label font-15 fw-bold">Judul Karya</label>
                    <input type="text" class="form-control font-14" id="input_judul" placeholder="">
                </div>
                <div class="my-3">
                    <label for="" class="form-label font-15 fw-bold">Kategori</label>
                    <div class="list-category" id="list-category">
                        <div class="add-category" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            <p class="font-14 button-add">Tambah Kategori</p>
                        </div>
                    </div>
                    <input type="hidden" name="kategori">
                </div>
                <div class="mb-3">
                    <label for="deskripsi_input" class="form-label font-15 fw-bold">Deskripsi</label>
                    <textarea class="form-control font-14" id="deskripsi_input" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="font-15 fw-bold">Apakah karya dijual ?</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label me-2 font-15" for="">Tidak</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        </div>
                        <label class="form-check-label font-15" for="">Ya</label>
                    </div>
                </div>
                <div class="my-3">
                    <label for="harga_jual" class="form-label font-15 fw-bold">Harga Jual</label>
                    <div class="d-flex align-items-center col-md-3">
                        <p class="font-14 me-2">Rp</p>
                        <input type="text" class="form-control font-14" id="input_judul" placeholder="">
                    </div>
                </div>
                <div class="my-3">
                    <label for="penyaluran_karya" class="form-label font-15 fw-bold">Penyaluran Karya</label>
                    <div class="d-flex">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label font-14" for="flexRadioDefault2">
                                Download
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label font-14" for="flexRadioDefault1">
                                Jasa Pengiriman
                            </label>
                        </div>
                    </div>
                </div>
                <button class="button-tambah-karya">Tambah</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Semua Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="font-14">Kategori yang digunakan</p>
                        <div class="current-category list-category py-2">
                            <div class="item-category p-2 px-3 border rounded">
                                <p class="font-14">Teknologi</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-x ms-2" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                            <div class="item-category p-2 px-3 border rounded">
                                <p class="font-14">Sains</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-x ms-2" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                            <div class="item-category p-2 px-3 border rounded">
                                <p class="font-14">Seni Rupa</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-x ms-2" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                            <div class="item-category p-2 px-3 border rounded">
                                <p class="font-14">UI/UX</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor"
                                    class="bi bi-x ms-2" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                        <div class="all-category">
                            <p class="font-14 my-2">Semua Kategori</p>
                            <input type="text" class="form-control font-14 mb-2" id="input_judul" placeholder="Cari Karya">
                            <p class="font-13 my-2 fst-italic text-danger">Klik untuk menambahkan kategori</p>
                            <div class="list-category">
                                <div class="item-category-v2 p-2 px-3 border rounded">
                                    <p class="font-14">Teknologi</p>
                                </div>
                                <div class="item-category-v2 p-2 px-3 border rounded">
                                    <p class="font-14">Sains</p>
                                </div>
                                <div class="item-category-v2 p-2 px-3 border rounded">
                                    <p class="font-14">Seni Rupa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-14" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-14">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var input = document.getElementById("input-file");
            var image = document.getElementById("image-input");
            var video = document.getElementById("video-input");
            input.onchange = evt => {
                const [file] = input.files;
                if (file) {
                    const type = file.type.split('/')[0];
                    if (type === "image") {
                        image.src = URL.createObjectURL(file);
                    }
                    if (type === "video") {
                        image.style.display = "none"
                        video.src = URL.createObjectURL(file);
                        video.style.width = "100%";
                        video.style.height = "500px";
                        video.style.top = "0";
                    }
                }
            }
            function onTest(params) {
                console.log("DAMN");
            }

            const data = ["Teknologi", "Sains", "UI/UX"];
            data.map(el => {
                const element = `
                        <div class="item-category p-2 px-3 border rounded" onclick="${() => onTest()}">
                            <p class="font-14">${el}</p>
                        </div>
                `;
                $("#list-category").append(element);
            });


        });
    </script>
@endsection
