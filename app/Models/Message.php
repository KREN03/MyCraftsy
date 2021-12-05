<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'forum_id',
        'message',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function like_message()
    {
        return $this->belongsToMany(User::class, 'like_messages')->withTimestamps()->using(LikeMessage::class);
    }

    public function likeChoosed()
    {
        return Auth::check() ? $this->hasOne(LikeMessage::class, 'message_id', 'id')->where('user_id', Auth::user()->id) : $this->hasOne(LikeMessage::class, 'message_id', 'id')->where('user_id', -1000);
    }
}
