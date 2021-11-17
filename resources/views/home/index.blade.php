@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="home container-fluid">
        <div class="row">
            <div class="sidebar col-md-2 p-4 pe-1 border rounded shadow-sm">
                <p class="head_kategori">KATEGORI</p>
                <div class="option">
                    <a href="{{ route('home') }}" class="d-block text-decoration-none mt-2 link-kategori">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                    <a href="{{ route('home', 'id=' . $category->id) }}" class="d-block text-decoration-none mt-2 link-kategori">
                        {{ $category->name }}
                    </a>
                    @endforeach
                    {{-- @for ($i = 0; $i < 7; $i++)
                        <p class="item-option" data-bs-toggle="collapse" href="#collapseExample_{{ $i }}"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            Seni Rupa
                        </p>
                        <div class="collapse child_item" id="collapseExample_{{ $i }}">
                            <p>Lukisan</p>
                            <p>Lukisan</p>
                            <p>Lukisan</p>
                        </div>
                    @endfor --}}
                </div>
            </div>
            <div class="content col-md-10 p-3 pt-0">
                <div class="grid p-0">
                    @foreach ($data as $item)
                        <a class="col-md-3 p-1 overflow-hidden grid-item" href="/karya/1">
                            <div class="position-relative box-image p-0 overflow-hidden type-{{$item->type}}">
                                @if ($item->type == 'video')
                                    <video src="{{ Storage::url('karya/' . $item->file) }}" class="video-js" id="my-video" muted loop></video>
                                @else
                                    <img src="{{ Storage::url('karya/' . $item->file) }}" class="card-img-top">
                                @endif
                                <div class="position-absolute banner-item-post p-3 d-flex m-0">
                                    <p>{{ $item->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection