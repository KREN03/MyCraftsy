<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function competition ()
    {
        $competitions = Competition::all();

        return view('admin.competition.index', compact('competitions'));
    }

    public function competition_detail (Competition $competition)
    {
        $categories = Category::all();
        return view('admin.competition.Edit.index', compact('competition', 'categories'));
    }

    public function competition_edit (Request $request, Competition $competition)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'lokasi' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        if($request->has('thumbnail')) {
            Storage::delete('public/competition/thumbnail/' .$competition->thumbnail);

            $thumbnail = $request->thumbnail;
            $file_name = time() . "." . $thumbnail->getClientOriginalExtension();

            $thumbnail->storeAs("public/competition/thumbnail", $file_name);

            $competition->update([
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $file_name,
                'lokasi' => $request->lokasi,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'link_website' => $request->link_website,
                'category_id' => $request->category_id,
                'buku_panduan' => $request->buku_panduan,
                'slug' => Str::slug($request->title)
            ]);
        } else {
            $competition->update([
                'title' => $request->title,
                'description' => $request->description,
                'lokasi' => $request->lokasi,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'link_website' => $request->link_website,
                'category_id' => $request->category_id,
                'buku_panduan' => $request->buku_panduan,
                'slug' => Str::slug($request->title)
            ]);
        }

        return redirect()->route('competition.admin');
    }

    public function competition_add ()
    {
        $categories = Category::all();
        return view('admin.competition.Add.index', compact('categories'));
    }

    public function competition_store (Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'lokasi' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'category_id' => 'required'
        ]);

        $thumbnail = $request->thumbnail;
        $file_name = time() . "." . $thumbnail->getClientOriginalExtension();

        $thumbnail->storeAs("public/competition/thumbnail", $file_name);

        Competition::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $file_name,
            'lokasi' => $request->lokasi,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'link_website' => $request->link_website,
            'category_id' => $request->category_id,
            'buku_panduan' => $request->buku_panduan,
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('competition.admin')->with('sukses', 'Berhasil Menambahkan Kompetisi');
    }

    public function competition_destroy (Competition $competition)
    {
        $competition->delete();

        return back()->with('sukses', 'Berhasil Menghapus Kompetisi');
    }
}
