<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryaController extends Controller
{
    public function index()
    {
        return view('karya.detail.index');
    }

    public function add()
    {
        return view('karya.add.index');
    }
}
