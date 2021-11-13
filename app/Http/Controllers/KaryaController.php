<?php

namespace App\Http\Controllers;

use App\Models\Work;
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

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_sell' => 'requ ired',
            'price' => 'required',
            'file' => 'required',
            'type' => 'required',
        ]);


        $file = $request->file;
        $file_name = time() . "." . $file->getClientOriginalExtension();

        $file->move('karya', $file_name);

        if ($request->is_sell) {
            Work::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_sell' => $request->is_sell,
                'price' => $request->price,
                'file' => $file_name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        } else {
        }
    }
}
