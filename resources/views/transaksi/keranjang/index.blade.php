@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi_keranjang.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="keranjang">
                <p class="title">Keranjang Anda</p>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk / Karya</th>
                                <th>Harga</th>
                                <th>Pemilik</th>
                                <th>Batas Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td class="w-25">
                                        <img src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&w=1000&q=80"
                                            alt="" class="img-fluid">
                                        <p class="my-2">Hello Wolrd</p>
                                    </td>
                                    <td>Rp. 100.000</td>
                                    <td>Otto</td>
                                    <td>17-03-2002</td>
                                    <td>
                                        <button class="primary-button">Bayar</button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/profile.js') }}"></script> --}}
@endsection
