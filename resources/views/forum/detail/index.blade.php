@extends('layout.template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid" style="background-image: url('{{ $forum->thumbnail }}')">
    <div class="container d-flex h-100">
        <div class="mt-auto">
            <h1 class="display-competition">Kompetisi</h1>
            <p class="text-white text-opacity-75 sub-text">Forum ini bertujuan berbagi pengetahuan dan bertanya seputar karya lukis</p>
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
                    <div class="d-flex mt-4">
                        <i class="far fa-comment-dots icon ms-auto"></i>
                        <i class="far fa-thumbs-up icon ms-3"></i>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row mt-50 buat-kiriman p-2">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="rounded-circle img-profile" alt="">
                        <div class="profile-post ms-3">
                            <span class="profile-name-forum d-block">Jerry Andrianto Pangaribuan</span>
                            <span class="post-date">22 Oktober 2021</span>
                        </div>
                    </div>
                    <p class="mt-3 post-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit iusto pariatur delectus provident quae quo, ab obcaecati voluptate magnam atque iure! Explicabo quisquam accusamus consectetur ut natus aliquam impedit omnis odit voluptatibus commodi. Odio doloribus sit, deleniti provident illo tempora, incidunt nihil eligendi fugit asperiores nulla! Quas aut minima laboriosam.</p>
                    <div class="d-flex mt-4">
                        <i class="far fa-comment-dots icon ms-auto"></i>
                        <i class="far fa-thumbs-up icon ms-3"></i>
                    </div>
                </div>
            </div>
            <div class="row mt-50 buat-kiriman p-2">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="rounded-circle img-profile" alt="">
                        <div class="profile-post ms-3">
                            <span class="profile-name-forum d-block">Jerry Andrianto Pangaribuan</span>
                            <span class="post-date">22 Oktober 2021</span>
                        </div>
                    </div>
                    <p class="mt-3 post-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit iusto pariatur delectus provident quae quo, ab obcaecati voluptate magnam atque iure! Explicabo quisquam accusamus consectetur ut natus aliquam impedit omnis odit voluptatibus commodi. Odio doloribus sit, deleniti provident illo tempora, incidunt nihil eligendi fugit asperiores nulla! Quas aut minima laboriosam.</p>
                    <div class="d-flex mt-4">
                        <i class="far fa-comment-dots icon ms-auto"></i>
                        <i class="far fa-thumbs-up icon ms-3"></i>
                    </div>
                </div>
            </div>
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
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
@endsection
