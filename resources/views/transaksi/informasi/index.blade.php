@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi_informasi.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="informasi">
                <p class="text-center title-informasi">Informasi Pembelian Karya</p>
                <div class="row py-5">
                    <div class="col-md-7 image">
                        <img src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&w=1000&q=80"
                            alt="" class="img-fluid">
                        <p class="mt-2">Image Title Lorem Ipsum</p>
                    </div>
                    <div class="col-md-5 form-informasi">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Nama Lengkap</label>
                            <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            {{-- <div id="emailHelp" class="form-text font-14">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Email</label>
                            <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text font-14">We'll never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Alamat</label>
                            <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            {{-- <div id="emailHelp" class="form-text font-14">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">No. Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text font-14" id="basic-addon1">+62</span>
                                <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            {{-- <div id="emailHelp" class="form-text font-14">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="primary-button font-14 d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-plus-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                </svg>
                                Masuk Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/profile.js') }}"></script> --}}
@endsection
