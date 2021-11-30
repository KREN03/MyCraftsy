@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="profile">
                <x-header-profile />
                <div class="post-profile col-md-12 mt-5">
                    <div class="grid p-1 pl-2" id="grid-profile">
                        @foreach ($data as $item)
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
                        @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
