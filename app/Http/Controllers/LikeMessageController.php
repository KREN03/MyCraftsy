<?php

namespace App\Http\Controllers;

use App\Models\LikeMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LikeMessage  $likeMessage
     * @return \Illuminate\Http\Response
     */
    public function show(LikeMessage $likeMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LikeMessage  $likeMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(LikeMessage $likeMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LikeMessage  $likeMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikeMessage $likeMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LikeMessage  $likeMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikeMessage $likeMessage)
    {
        //
    }

    public function like (Request $request)
    {
        $request->validate([
            'message_id' => 'required'
        ]);

        $data = LikeMessage::where([
            ['message_id', '=', $request->message_id],
            ['user_id', '=', Auth::user()->id]
        ])->get();

        if (!empty($data[0]->message_id)) {
            LikeMessage::destroy($data[0]->id);
            return response()->json(false);
        } else {
            LikeMessage::create([
                'message_id' => $request->message_id,
                'user_id' => Auth::user()->id
            ]);
            return response()->json(true);
        }
    }
}
