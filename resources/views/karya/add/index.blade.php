@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/add_karya.css') }}">
@endsection

@section('content')
    <div class="home container">
        <form action="{{ route('add_karya') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center py-3">
                <div class="col-12 col-md-9 p-0">
                    <div class="input-image-video rounded">
                        <img src="{{ asset('image/input-karya.png') }}" alt="" srcset="" id="image-input"
                            class="image-input">
                        <video src="" frameborder="0" class="video-js" id="my-video" controls preload="auto"></video>
                    </div>
                    <div class="my-3">
                        <div class="input-image-video-input rounded px-3 py-2 border font-15 position-relative col-md-4">
                            <p class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-upload me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                </svg>
                                Pilih Gambar atau Video
                            </p>
                            <input type="file" id="input-file" accept="image/, video/" name="file">
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="input_judul" class="form-label font-15 fw-bold">Judul Karya</label>
                        <input type="text" class="form-control font-14" id="input_judul" placeholder="" name="title">
                    </div>
                    <div class="my-3">
                        <label for="" class="form-label font-15 fw-bold">Kategori</label>
                        <div class="list-category current-category" id="list-category-page">
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
                        <input type="hidden" name="category" id="kategori_list_input">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_input" class="form-label font-15 fw-bold">Deskripsi</label>
                        <textarea class="form-control font-14" id="deskripsi_input" rows="3" name="description"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="font-15 fw-bold">Apakah karya dijual ?</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label class="form-check-label me-2 font-15" for="">Tidak</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input sold-art" type="checkbox" id="flexSwitchCheckChecked"
                                    checked>
                                <input type="hidden" name="is_sell" id="is_sell" value="false">
                            </div>
                            <label class="form-check-label font-15" for="">Ya</label>
                        </div>
                    </div>
                    <div class="my-3" id="pembayaran">
                        <div class="my-3">
                            <label for="harga_jual" class="form-label font-15 fw-bold">Harga Jual</label>
                            <div class="d-flex align-items-center col-md-3">
                                <p class="font-14 me-2">Rp</p>
                                <input type="text" class="form-control font-14" id="input_judul" placeholder="" name="price">
                            </div>
                        </div>
                        <label for="penyaluran_karya" class="form-label font-15 fw-bold">Penyaluran Karya</label>
                        <div class="d-flex">
                            <div class="form-check me-2">
                                <input class="form-check-input" type="radio" name="penyaluran_karya" id="flexRadioDefault2"
                                    checked value="download">
                                <label class="form-check-label font-14" for="flexRadioDefault2">
                                    Download
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penyaluran_karya" id="flexRadioDefault1" value="jasa_pengiriman">
                                <label class="form-check-label font-14" for="flexRadioDefault1">
                                    Jasa Pengiriman
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="button-tambah-karya my-3" type="submit">Tambah</button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Semua Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="font-14">Kategori yang digunakan</p>
                        <div class="current-category list-category py-2" id="list-category-modal">
                        </div>
                        <div class="all-category">
                            <p class="font-14 my-2">Semua Kategori</p>
                            <input type="text" class="form-control font-14 mb-2" id="input_judul"
                                placeholder="Cari Kategori">
                            <p class="font-13 my-2 fst-italic text-danger">Klik untuk menambahkan kategori</p>
                            <div class="list-category" id="add-list-category">
                                <div class="item-category-v2 p-2 px-3 border rounded" data="AC">
                                    <p class="font-14">Teknologi</p>
                                </div>
                                <div class="item-category-v2 p-2 px-3 border rounded" data="AC">
                                    <p class="font-14">Sains</p>
                                </div>
                                <div class="item-category-v2 p-2 px-3 border rounded" data="AC">
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
    <script src="{{ asset('js/add-karya.js') }}"></script>
@endsection
