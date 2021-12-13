@extends('layout.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi_pembayaran.css') }}">
@endsection

@section('content')
    <div class="home container">
        <div class="row py-4 mb-5">
            <div class="pembayaran">
                <p class="text-center head-title">Pembayaran</p>
                <p class="text-center child-title mt-3">Lukisan XX</p>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-4 info-pembayaran">
                        <p class="title">Transfer Pembayaran</p>
                        <p class="total my-3">Total : &nbsp;&nbsp;&nbsp;Rp. 100.000,00</p>
                        <div class="bank">
                            <img src="https://dplk.bni.co.id/theme/front/images/logo/BNI-logo.png" alt=""
                                class="">
                            <p class="mt-2">Bank Negara Indonesia</p>
                            <p>2978 0562</p>
                            <p>Jerry Andrianto Pangaribuan</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Bukti Pembayaran</label>
                            <div class="input-pembayaran rounded px-3 py-2 position-relative">
                                <input type="file" class="position-absolute" name="file">
                                <p class="font-14">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-2" viewBox="0 0 16 16">
                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                                      </svg>
                                    Upload Bukti Pembayaran
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Asal Bank</label>
                            <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label font-14">Nama Pengirim</label>
                            <input type="email" class="form-control font-14" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="primary-button font-14 d-flex align-items-center mt-3">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/profile.js') }}"></script> --}}
@endsection
