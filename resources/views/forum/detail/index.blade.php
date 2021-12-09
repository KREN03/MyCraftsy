@extends('layout.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid" style="background-image: url('{{ $forum->thumbnail }}')">
    <div class="container d-flex h-100">
        <div class="mt-auto mb-4">
            <h1 class="display-competition">{{ $forum->name }}</h1>
            <p class="text-white text-opacity-75 sub-text">{{ $forum->description }}</p>
            <p class="text-white text-opacity-75 fw-light sub-sub-text">{{ $forum->anggota->count() }} anggota grup</p>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 pe-lg-4">
            <div class="row align-items-center text-left buat-kiriman p-2">
                <div class="col-md-1">
                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="rounded-circle img-profile d-sm-none d-none d-md-block" alt="">
                </div>
                <div class="col-md-11">
                    <!-- Button trigger modal -->
                    <div class="btn-add-post w-100 text-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="center">
                            Buat Kiriman
                        </span>
                    </div>
                </div>
            </div>
            @foreach ($messages as $message)
            <div class="row mt-50 buat-kiriman p-2">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="rounded-circle img-profile" alt="">
                        <div class="profile-post ms-3">
                            <span class="profile-name-forum d-block">{{ $message->user->name }}</span>
                            <span class="post-date">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <p class="mt-3 post-detail">{{ $message->message }}</p>
                    <div class="d-flex my-4">
                        <input type="hidden" id="message_id" value="{{ $message->id }}">
                        <i class="far fa-comment-dots icon ms-auto" data-bs-toggle="collapse" data-bs-target="#collapseExample-{{ $message->id }}" aria-expanded="false" aria-controls="collapseExample-{{ $message->id }}"></i>
                        <i class="{{ $message->likeChoosed ? 'fas' : 'far' }} fa-thumbs-up icon ms-3" @if ($message->likeChoosed)
                            active="true"
                        @endif id="message-{{ $message->id }}" data-id="{{ $message->id }}"></i> <span class="like_count" id="likes_count-{{ $message->id }}">{{ $message->like_message->count() }}</span>
                    </div>
                    <div class="collapse" id="collapseExample-{{ $message->id }}">
                        @foreach ($message->post_comment as $comment)
                        <div class="card card-body mb-4">
                            <div class="d-flex align-items-center">
                                <img src="{{ $comment->user->avatar }}" class="box-image-comment rounded-circle" alt="">
                                <div class="profile-comment ms-3">
                                    <span class="profile-name-comment d-block">{{ $comment->user->name }}</span>
                                    <span class="post-date-comment">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <p class="text-comment mt-3">
                                {{ $comment->comment }}
                            </p>
                        </div>
                        @endforeach
                        <form action="">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{ Auth()->user()->avatar() }}" alt="" class="box-image rounded-circle">
                                </div>
                                <div class="form-group w-100 ms-2 me-2">
                                    <input type="text" name="" id="" class="form-control" placeholder="Tambahkan Komentar">
                                </div>
                                <i class="far fa-paper-plane"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-4 ps-lg-4 mt-lg-0 mt-md-4 mt-sm-4 mt-4">
            <div class="row sticky-lg-top mt-lg-50">
                <div class="col-md-12 buat-kiriman p-3">
                    <h5 class="fw-bold">Forum Lainnya</h5>
                    <hr class="line-other-forum mb-5">
                    @foreach ($forums as $item)
                    <a href="{{ route('forum.detail', $item->id) }}" class="text-decoration-none">
                        <div class="d-flex align-items-center mb-3">
                            <div class="image">
                                <img src="{{ $item->thumbnail }}" class="rounded-circle img-other-forum" alt="">
                            </div>
                            <div class="profile-post ms-2">
                                <span class="profile-name-forum d-block">{{ $item->name }}</span>
                                <span class="other-forum-desc">{{ $item->description }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('forum.message', $forum->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Buat Kiriman</h5>
                <p>Bagikan kiriman ke forum {{ $forum->name }}</p>
                <div class="mb-3 mt-5">
                    <label for="message" class="form-label fw-bold">Kiriman Anda</label>
                    <textarea class="form-control" name="message" id="message" rows="8" placeholder="Masukkan Kiriman anda"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Buat Kiriman</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{ asset('js/message-like.js') }}"></script>
@endsection
