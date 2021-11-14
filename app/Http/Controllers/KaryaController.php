<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'is_sell' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $file_name = time() . "." . $file->getClientOriginalExtension();

        $file->storeAs("public/karya", $file_name);
        // $file->move('karya/', $file_name);

        if ($request->is_sell == "true") {
            Work::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_sell' => true,
                'price' => $request->price,
                'file' => $file_name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        } else if($request->is_sell == "false"){
            Work::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_sell' => false,
                'price' => 0,
                'file' => $file_name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        }

        return back();
    }
}
