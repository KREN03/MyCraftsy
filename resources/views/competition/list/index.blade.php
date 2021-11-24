@extends('layout.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/competition.css') }}">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-competition">Kompetisi</h1>
        <p class="text-white text-opacity-75 mt-3">Cari Kompetisi yang sesuai dengan minat mu, <br>Kesuksesan menantimu!!!</p>
    </div>
</div>
<ul class="nav justify-content-center">
    @foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link" href="#">{{ $category->name }}</a>
    </li>
    @endforeach
</ul>
<hr class="mt-0">
<div class="container mb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($competitions as $competition)
        <div class="col">
            <div class="card">
                <img src="{{ asset('image/drawing.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title mb-0">{{ $competition->title }}</h6>
                    <p class="text-gray-500 sub-text">{{ $competition->category->name }}</p>
                    <div class="d-flex  mt-4">
                        <div class="icon-div">
                            <i class="fa fa-calendar-alt icon" aria-hidden="true"></i>
                        </div>
                        <div class="date-text">
                            <p class="sub-text">29 November 2020</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="icon-div">
                            <i class="fas fa-map-marker-alt icon" aria-hidden="true"></i>
                        </div>
                        <div class="date-text">
                            <p class="sub-text">Bandung, Jawa Barat</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('competition.detail', $competition->slug) }}" class="btn btn-primary mt-4 ml-auto rounded-pill px-5 py-2">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Tidak ada Kompetisi</h1>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
