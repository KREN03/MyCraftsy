@extends('layout.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endsection

@section('content')
<div class="container home">
    <div class="row">
        <div class="col-md-7 mt-5 d-flex align-items-start flex-column">
            <div class="text-forum mb-auto">
                <h2 class="fw-bold">Selamat Datang di Forum Diskusi</h2>
                <p class="subtext">Bergabung dalam forum untuk berdiskusi dengan orang yang memiliki minat yang sama dengan anda!</p>
            </div>
            <div class="button-forum">
                <a type="button" class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i> Buat Forum</a>
                <a href="#find_forum" class="btn btn-outline-primary rounded-pill px-4 ms-3"><i class="fa fa-users me-2" aria-hidden="true"></i> Temukan Forum</a>
            </div>
        </div>
        <div class="col-md-5 mt-5">
            <img src="{{ asset('image/forum_banner.png') }}" class="w-100" alt="">
        </div>
    </div>
    <div class="row mt-100 mb-5" id="find_forum">
        <div class="col-lg-12">
            <h5 class="fw-bold">Temukan Forum</h5>
        </div>
        @forelse ($forums as $forum)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                <div class="card">
                    <img src="{{ $forum->thumbnail }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-center fw-bold">{{ $forum->name }}</h6>
                        <p class="card-text text-center subtext">{{ $forum->description }}</p>
                        <div class="d-flex justify-content-end mt-5">
                            <a href="" class="btn btn-primary ml-auto rounded-pill px-3 py-2">Bergabung</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Tidak Ada Forum</h2>
        @endforelse
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('forum.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Buat Forum Diskusi</h5>
                <p>Mari berdiskusi dengan orang-orang yang memiliki minat yang sama!</p>
                <div class="mb-3 mt-5">
                    <label for="name" class="form-label">Nama Forum</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Forum</label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Buat Forum</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
