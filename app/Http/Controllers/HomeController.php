<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID dls4O4tC-kszIo-vGn4X8E5TTjWtDpjQjhZDqoNwgUQ'
        ])->get('https://api.unsplash.com/photos');

        $data = Work::all();
        // return json_decode($response);
        return view('home.index', ['response' => json_decode($response), 'data' => $data]);
    }
}
