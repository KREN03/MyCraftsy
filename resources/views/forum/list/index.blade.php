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
            <div>
                <a type="button" class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i> Buat Forum</a>
                <a href="#find_forum" class="btn btn-outline-primary rounded-pill px-4"><i class="fa fa-users me-2" aria-hidden="true"></i> Temukan Forum</a>
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
                            @auth
                                @if (Auth()->user()->id == $forum->user_id || $forum->anggota->contains(Auth()->user()->id))
                                <a href="{{ route('forum.detail', $forum->id) }}" class="btn btn-primary ml-auto rounded-pill px-3 py-2">Masuk</a>
                                @else
                                <form action="{{ route('forum.join', $forum->id) }}" id="forum-{{ $forum->id }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-primary ml-auto rounded-pill px-3 py-2 gabung" data-name="{{ $forum->name }}" data-id="{{ $forum->id }}">Bergabung</button>
                                </form>
                                @endif
                                @else
                                <a href="{{ route('forum.detail', $forum->id) }}" class="btn btn-primary ml-auto rounded-pill px-3 py-2">Bergabung</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Tidak Ada Forum</h2>
        @endforelse
    </div>
</div>
  p
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.gabung').click(function(e) {
        var name = $(this).data('name');
        var id = $(this).data('id');
        var id_forum = e.target.dataset.id;

        Swal.fire({
            title: ``,
            text: `Ingin bergabung dengan forum ${name} ?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
                $(`#forum-${id_forum}`).submit();
            }
        })
    })

</script>
@endsection
