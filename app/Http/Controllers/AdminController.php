<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function competition ()
    {
        $competitions = Competition::all();

        return view('admin.competition.index');
    }
}
