<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID dls4O4tC-kszIo-vGn4X8E5TTjWtDpjQjhZDqoNwgUQ'
        ])->get('https://api.unsplash.com/photos');

        $id = $request->input('id');
        $categories = Category::all();

        if ($id != null) {
            $data = Category::find($id);
            return view('home.index', ['response' => json_decode($response), 'data' => $data->work, 'categories' => $categories]);
        }

        $data = Work::all();
        return view('home.index', ['response' => json_decode($response), 'data' => $data, 'categories' => $categories]);
    }

    public function getCategories(Request $request)
    {
        $id_data = $request->data;
        if ($id_data === null) {
            $id_data = ['5000'];
        }
        $data = DB::table('categories')
            ->where('name', 'like', '%' . $request->keyword . '%')
            ->whereNotIn('id', $id_data)
            ->get();
        return response()->json($data);
    }
}
