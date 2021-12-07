<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
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

    public function edit($id)
    {
        $data = Work::find($id);
        return view('karya.edit.index', compact('data'));
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
        } else if ($request->is_sell == "false") {
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


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_sell' => 'required',
            'category' => 'required',
        ]);
        $work = Work::find($id);
        $this->categoryEdit($request, $work);

        $work->title = $request->title;
        $work->description = $request->description;
        $work->is_sell = ($request->is_sell == "true");
        $work->price = $request->price;

        if ($request->hasFile('file')) {
            Storage::delete('public/karya/' . $work->file);
                $file = $request->file;
                $file_name = time() . "." . $file->getClientOriginalExtension();
                $file->storeAs("public/karya", $file_name);
                $work->type = explode('/', $request->file->getMimeType())[0];
                $work->file = $file_name;
        }

        $work->save();

        return back();
    }

    public function categoryEdit(Request $request, Work $work)
    {
        $category_db = array();
        $category_request = explode(',', $request->category);
        foreach ($work->category as $key => $value) {
            array_push($category_db,  strval($value->id));
        }
        sort($category_db);
        sort($category_request);

        if (!($category_db == $category_request)) {
            foreach ($category_db as $category) {
                $work->category()->detach($category);
            }
            foreach ($category_request as $category) {
                $work->category()->attach($category);
            }
        }
    }
}
