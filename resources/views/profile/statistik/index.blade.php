@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile_statistik.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="profile">
                <x-header-profile />
                <div class="post-profile col-md-12 my-5">
                    <p class="title">Statistik</p>
                    <div class="row">
                        <div class="col-md-12 chart">
                            <p class="mt-4">Likes & Comments</p>
                            <canvas id="myChart" height="130"></canvas>
                        </div>
                        <p class="mt-5 mb-3">Postingan Populer</p>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Judul</td>
                                        <td>Like</td>
                                        <td>Comment</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($works as $item)
                                        <tr>
                                            <td><a href="{{ route('detail_karya', $item->id) }}">
                                                {{ $item->title }}</a></td>
                                            <td class="text-center">{{ $item->likes->count() }}</td>
                                            <td class="text-center">{{ $item->comments->count() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="row stats_total justify-content-start">
                                <div class="col-md-5 border p-3 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                    <p class="stats_title">LIKES</p>
                                    <p class="total">{{ $like }}</p>
                                </div>
                                <div class="col-md-5 border p-3 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                    </svg>
                                    <p class="stats_title">Comment</p>
                                    <p class="total">{{ $comment }}</p>
                                </div>
                                <div class="col-md-5 border p-3 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                    <p class="stats_title">POSTS</p>
                                    <p class="total">{{ Auth::user()->works->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script src="{{ asset('js/profile_stats.js') }}"></script>
@endsection
