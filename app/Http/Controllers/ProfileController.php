<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index(){
        $data = Work::all();
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID dls4O4tC-kszIo-vGn4X8E5TTjWtDpjQjhZDqoNwgUQ'
        ])->get('https://api.unsplash.com/photos');
        return view('profile.index', ['response' => json_decode($response), 'data' => $data]);
    
    }
}
