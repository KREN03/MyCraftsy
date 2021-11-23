@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="profile">
                <div class="bio-profile row p-3 ps-1 justify-content-center">
                    <div class="image col-md-2">
                        <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/10/18/2674832980.jpeg" alt="" class="rounded-circle">
                    </div>
                    <div class="user-profile col-md-4">
                        <div class="name d-flex align-items-center">
                            <p>Jerry Andrianto Pangaribuan</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                              </svg>
                        </div>
                        <p class="font-14">@jerryandriantopunkrib</p>
                        <div class="info d-flex justify-content-between font-14 mt-5">
                            <p>41 karya</p>
                            <p>1080 Pengikut</p>
                            <p>200 Mengikuti</p>
                        </div>
                    </div>
                </div>
                <div class="post-profile col-md-12 mt-5">
                    <div class="grid p-1 pl-2" id="grid-profile">
                        @foreach ($response as $item)
                            <a class="col-md-3 p-1 overflow-hidden grid-item" href="/karya/1">
                                <div class="position-relative box-image p-0 overflow-hidden">
                                    <img src="{{ $item->urls->small }}" class="card-img-top" alt="...">
                                    <div class="position-absolute banner-item-post p-3 d-flex m-0">
                                        <p>Laptop on brown wooden table</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        {{-- @foreach ($data as $item)
                            <a class="col-md-3 p-1 overflow-hidden grid-item" href="/karya/{{ $item->id }}">
                                <div class="position-relative box-image p-0 overflow-hidden type-{{$item->type}} @if($item->type == 'video') 'grid-item--width2' @endif">
                                    @if ($item->type == 'video')
                                        <video src="{{ Storage::url('karya/' . $item->file) }}" class="video-js" id="my-video" muted loop></video>
                                    @else
                                        <img src="{{ Storage::url('karya/' . $item->file) }}" class="card-img-top image-js">
                                    @endif
                                    <div class="position-absolute banner-item-post p-3 d-flex m-0">
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
