@extends('layout.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/competition.css') }}">
@endsection

@section('content')
<div class="home container mb-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center title-competition mb-4">{{ $competition->title }}</h1>
            <img src="{{ asset('image/competition.png') }}" class="image-competition" alt="">
            <div class="ms-4">
                <p class="fw-bold category-competition">{{ $competition->category->name }}</p>
                <div class="d-flex  mt-4">
                    <div class="icon-div">
                        <i class="fa fa-calendar-alt icon" aria-hidden="true"></i>
                    </div>
                    <div class="date-text">
                        <p class="sub-text">{{ $competition->date_start->format('d F Y') }} - {{ $competition->date_end->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="icon-div">
                        <i class="fas fa-map-marker-alt icon" aria-hidden="true"></i>
                    </div>
                    <div class="date-text">
                        <p class="sub-text">{{ $competition->lokasi }}</p>
                    </div>
                </div>
                <p class="mt-4 text-content">
                    {{ $competition->description }}
                </p>
                <h4 class="fw-bold mt-4 mb-3">Lampiran</h4>
                <a href="" class="btn btn-primary rounded-pill px-4">Buku Panduan Kompetisi</a>
                <a href="" class="btn btn-primary rounded-pill px-4 ms-3">Website Kompetisi</a>
            </div>
        </div>
    </div>
</div>
@endsection
