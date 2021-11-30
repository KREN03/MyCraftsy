@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update_profile.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('update_profile_db') }}" method="post" enctype="multipart/form-data"
                class="d-flex justify-content-center">
                @csrf
                <div class="profile row">
                    <div class="col-12 col-md-12 d-flex justify-content-center" style="height: 257px">
                        <div class="position-relative image">
                            <img src="{{ Auth::user()->avatar() }}"
                                alt="" class="rounded-circle border" id="image-profile">
                            <div class="position-absolute edit_image rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-camera-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                </svg>
                                <p class="text-center">Tambahkan<br>foto profile</p>
                            </div>
                            <input type="file" name="image" id="image-input" class="image-input rounded-circle">
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="my-3">
                            <label for="input_judul" class="form-label font-15 fw-bold">Nama</label>
                            <input type="text" class="form-control font-14" id="input_judul" placeholder="" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="my-3">
                            <label for="input_judul" class="form-label font-15 fw-bold">Username atau email</label>
                            <input type="text" class="form-control font-14" id="input_judul" placeholder="" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="my-3">
                            <label for="input_judul" class="form-label font-15 fw-bold">No Telepon</label>
                            <input type="text" class="form-control font-14" id="input_judul" placeholder=""
                                name="phone_number" value="{{ Auth::user()->phone_number }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="primary-button">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/update_profile.js') }}"></script>
@endsection
