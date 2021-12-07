@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail_karya.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="col-12 col-md-6 position-relative">
                <div class="image-and-video rounded border">
                    @if ($data->type == 'video')
                        <video src="{{ Storage::url('karya/' . $data->file) }}" class="video-js" id="my-video" muted
                            loop></video>
                    @else
                        <img src="{{ Storage::url('karya/' . $data->file) }}" class="image-js rounded">
                    @endif
                    <div class="position-absolute bottom-0 d-flex p-3 info-work">
                        <input type="hidden" id="work_id" value="{{ $data->id }}">
                        <div class="like d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart-fill @if ($data->likesChoosed)
                                actived
                            @endif"
                                @if ($data->likesChoosed)
                                active="true"
                                @endif viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                            </svg>
                            <p class="font-14 text-light" id="likes_count">{{ $data->likes->count() }}</p>
                        </div>
                        <div class="comment-icon d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                                <path
                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                            </svg>
                            @php
                                $count = $data->comments->count();
                                foreach ($data->comments as $key) {
                                    $count += $key->child->count();
                                }
                            @endphp
                            <p class="font-14 text-light">{{ $count }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 detail-karya">
                <div class="menu-option d-flex mb-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <p class="title">{{ $data->title }}</p>
                <p class="mt-2 mb-1 text-capitalize font-14">{{ date('d F Y', strtotime($data->users->created_at)) }}</p>
                @if ($data->is_sell)
                    <p class="price mt-2">Rp. {{ $data->price }}</p>
                @endif
                <div class="profile d-flex align-items-center justify-content-between my-3">
                    <div class="account d-flex align-items-center">
                        <div class="box-image rounded-circle">
                            <img src="{{ $data->users->avatar() }}" alt="" class="">
                        </div>
                        <p class="ms-3 text-capitalize">{{ $data->users->name }}</p>
                    </div>
                    @auth
                        @if (!(Auth::user()->id == $data->users->id))
                        @if (Auth::user()->isFollowers($data->users))
                        <div class="follow">
                            <form action="{{ route('follow_profile') }}" method="post">
                                @csrf
                                <input type="hidden" name="following_id" value="{{ $data->users->id }}">
                                <button class="px-3 py-1 rounded-pill" type="submit">Ikuti</button>
                            </form>
                        </div>
                        @endif
                        @endif
                    @endauth
                </div>
                <div class="description mb-3">
                    {{ $data->description }}
                </div>
                @if ($data->is_sell)
                    <button class="buy px-4 py-2 rounded-pill mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-plus-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                        </svg>
                        Beli Karya
                    </button>
                @endif
                <p class="title-comment">Komentar</p>
                <p class="info-comment">Berikan masukan, ajukan pertanyaan, atau ucapkan selamat</p>
                @forelse ($data->comments as $comment)
                    <div class="comment my-3 border p-3 rounded">
                        <div class="top-head-comment d-flex align-items-center">
                            <div class="box-image rounded-circle">
                                <img src="{{ $data->users->avatar() }}" alt="" class="">
                            </div>
                            <p class="ms-2">{{ $comment->name }}</p>
                            <p class="ms-2 time">5 Hari lalu</p>
                        </div>
                        <div class="desc-comment pt-3">
                            <p>{{ $comment->comment }}</p>
                            <span class="reply-comment-button" data-bs-toggle="collapse"
                                href="#collapseExample{{ $comment->id }}" role="button" aria-expanded="false"
                                aria-controls="collapseExample">reply</span>
                        </div>
                    </div>
                    @if ($comment->child->count() > 0)
                        <div class="collapse" id="collapseExample{{ $comment->id }}">
                            @foreach ($comment->child as $item_child)
                                <div class="comment my-3 border p-3 rounded ms-5">
                                    <div class="top-head-comment d-flex align-items-center">
                                        <div class="box-image rounded-circle">
                                            <img src="{{ $data->users->avatar() }}" alt="" class="">
                                        </div>
                                        <p class="ms-2">{{ $item_child->name }}</p>
                                        <p class="ms-2 time">5 Hari lalu</p>
                                    </div>
                                    <div class="desc-comment pt-3">
                                        <p>{{ $item_child->comment }}</p>
                                        <span class="reply-comment-button">reply</span>
                                    </div>
                                </div>
                            @endforeach
                            @if (Auth::check())
                                <form action="{{ route('comment_add', $data->id) }}" method="post"
                                    class="ms-5">
                                    @csrf
                                    <input type="hidden" name="parent_id" value={{ $comment->id }}>
                                    <div class="input-comments d-flex align-items-center">
                                        <div class="box-image rounded-circle">
                                            <img src="{{ $data->users->avatar() }}" alt="" class="">
                                        </div>
                                        <input type="text" placeholder="Tambah komentar" name="comment"
                                            class="ms-3 me-3 px-3 py-2 w-100 input-field" id="input-field">
                                        <button class="button-send rounded-circle button-comment" id="" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-send-fill send-icon" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M15.964.686a.5.5 0 0 0-.65-.65l-.095.038L.767 5.854l-.001.001-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.563 2.903.432.275.275.432 2.903 4.563.002.002.26.41a.5.5 0 0 0 .886-.083l.181-.453L15.926.78l.038-.095Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @else
                                <p class="font-14 text-danger fst-italic">Anda harus login terlebih dahulu</p>
                            @endif
                        </div>
                    @else
                        <div class="collapse" id="collapseExample{{ $comment->id }}">
                            @if (Auth::check())
                                <form action="{{ route('comment_add', $data->id) }}" method="post"
                                    class="">
                                    @csrf
                                    <input type="hidden" name="parent_id" value={{ $comment->id }}>
                                    <div class="input-comments d-flex align-items-center">
                                        <div class="box-image rounded-circle">
                                            <img src="{{ $data->users->avatar() }}" alt="" class="">
                                        </div>
                                        <input type="text" placeholder="Tambah komentar" name="comment"
                                            class="ms-3 me-3 px-3 py-2 w-100 input-field" id="input-field">
                                        <button class="button-send rounded-circle button-comment" id="" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-send-fill send-icon" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M15.964.686a.5.5 0 0 0-.65-.65l-.095.038L.767 5.854l-.001.001-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.563 2.903.432.275.275.432 2.903 4.563.002.002.26.41a.5.5 0 0 0 .886-.083l.181-.453L15.926.78l.038-.095Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @else
                                <p class="font-14 text-danger fst-italic">Anda harus login terlebih dahulu</p>
                            @endif
                        </div>
                    @endif
                @empty
                    <div class="border p-2 my-3 rounded">
                        <p class="font-14 text-danger fst-italic">Tidak ada komentar</p>
                    </div>
                @endforelse
                @if (Auth::check())
                    <form action="{{ route('comment_add', $data->id) }}" method="post" class="mt-5">
                        @csrf
                        <div class="input-comments d-flex align-items-center">
                            <div class="box-image rounded-circle">
                                <img src="{{ $data->users->avatar() }}" alt="" class="">
                            </div>
                            <input type="text" placeholder="Tambah komentar" name="comment"
                                class="ms-3 me-3 px-3 py-2 w-100 input-field" id="input-field">
                            <button class="button-send rounded-circle button-comment" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-send-fill send-icon" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15.964.686a.5.5 0 0 0-.65-.65l-.095.038L.767 5.854l-.001.001-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.563 2.903.432.275.275.432 2.903 4.563.002.002.26.41a.5.5 0 0 0 .886-.083l.181-.453L15.926.78l.038-.095Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/detail-karya.js') }}"></script>
@endsection
