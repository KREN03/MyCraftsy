<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    public function index($id)
    {
        $data = Work::find($id);
        return view('karya.detail.index', compact('data'));
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
            'category' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $file_name = time() . "." . $file->getClientOriginalExtension();

        $file->storeAs("public/karya", $file_name);

        $category = explode(',', $request->category);

        if ($request->is_sell == "true") {
            $data = Work::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_sell' => true,
                'price' => $request->price,
                'file' => $file_name,
                'type' => explode('/', $request->file->getMimeType())[0],
                'user_id' => Auth::user()->id,
            ]);

            foreach ($category as $key) {
                $data->category()->attach($key);
            }

        } else if($request->is_sell == "false"){
            $data = Work::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_sell' => false,
                'price' => 0,
                'file' => $file_name,
                'type' => explode('/', $request->file->getMimeType())[0],
                'user_id' => Auth::user()->id,
            ]);

            foreach ($category as $key) {
                $data->category()->attach($key);
            }
        }

        return back();
    }
}
