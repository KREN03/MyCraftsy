<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $request->validate([
            'work_id' => 'required'
        ]);
        $data = Like::where([
            ['work_id', '=', $request->work_id],
            ['user_id', '=', Auth::user()->id],
        ])->get();
        
        if (!empty($data[0]->work_id)) {
            Like::destroy($data[0]->id);
            return response()->json(false);
        } else {
            Like::create([
                'work_id' => $request->work_id,
                'user_id' => Auth::user()->id
            ]);
            return response()->json(true);
        }
    }
}
