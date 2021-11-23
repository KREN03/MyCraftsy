@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail_karya.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="col-12 col-md-6 position-relative">
                <div class="image-and-video rounded border">
                    @if ($data->type == 'video')
                        <video src="{{ Storage::url('karya/' . $data->file) }}" class="video-js" id="my-video" muted
                            loop></video>
                    @else
                        <img src="{{ Storage::url('karya/' . $data->file) }}" class="image-js rounded">
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 detail-karya">
                <div class="menu-option d-flex mb-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <p class="title">Profil dan Biografi Jendral Sudirman - Tokoh Pahlawan Nasional</p>
                <p class="price mt-2    ">Rp. 100.000</p>
                <div class="profile d-flex align-items-center justify-content-between my-3">
                    <div class="account d-flex align-items-center">
                        <div class="box-image rounded-circle">
                            <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/10/05/1258955827.jpg"
                                alt="" class="">
                        </div>
                        <p class="ms-3">Zico Andreas Aritonang</p>
                    </div>
                    <div class="follow">
                        <button class="px-3 py-1 rounded-pill">Ikuti</button>
                    </div>
                </div>
                <div class="description mb-3">
                    PROFIL BIOGRAFI BIODATA JENDRAL SUDIRMAN Profil Jendral Sudirman Jendral Sudirman Tokoh Pahlawan
                    Nasional Nama Lahir Raden Soedirman Nama Lain Jendral Sudirman
                </div>
                <button class="buy px-4 py-2 rounded-pill mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart-plus-fill me-2" viewBox="0 0 16 16">
                        <path
                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                    </svg>
                    Beli Karya
                </button>
                <p class="title-comment">Komentar</p>
                <p class="info-comment">Berikan masukan, ajukan pertanyaan, atau ucapkan selamat</p>
                <div class="comment my-3">
                    <div class="top-head-comment d-flex align-items-center">
                        <div class="box-image rounded-circle">
                            <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/10/05/1258955827.jpg"
                                alt="" class="">
                        </div>
                        <p class="ms-2">Cuexx</p>
                        <p class="ms-2 time">5 Hari lalu</p>
                    </div>
                    <div class="desc-comment py-3">
                        <p>Berikan masukan, ajukan pertanyaan, atau ucapkan selamat</p>
                        <a href="">reply</a>
                    </div>
                </div>
                <div class="input-comments d-flex align-items-center">
                    <div class="box-image rounded-circle">
                        <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/10/05/1258955827.jpg" alt=""
                            class="">
                    </div>
                    <input type="text" placeholder="Tambah komentar" class="ms-3 me-3 px-3 py-2 w-100 input-field"
                        id="input-field">
                    <button class="button-send rounded-circle" id="button-comment">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-send-fill send-icon" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.964.686a.5.5 0 0 0-.65-.65l-.095.038L.767 5.854l-.001.001-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.563 2.903.432.275.275.432 2.903 4.563.002.002.26.41a.5.5 0 0 0 .886-.083l.181-.453L15.926.78l.038-.095Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/detail-karya.js') }}"></script>
@endsection
