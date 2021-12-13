<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function informasi(){
        return view('transaksi.informasi.index');
    }

    public function keranjang(){
        return view('transaksi.keranjang.index');
    }

    public function pembayaran(){
        return view('transaksi.pembayaran.index');
    }
}
