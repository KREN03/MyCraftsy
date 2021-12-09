<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
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
     * @param  \App\Models\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
        //
    }

    public function comment(Request $request, Message $message)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        PostComment::create([
            'comment' => $request->comment,
            'message_id' => $message->id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('sukses', 'Berhasil Mengirim Komentar');
    }

    public function reply_comment (Request $request, Message $message, PostComment $parent)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        PostComment::create([
            'comment' => $request->comment,
            'message_id' => $message->id,
            'parent_id' => $parent->id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('sukses', 'Berhasil Membalas Komentar');
    }
}
