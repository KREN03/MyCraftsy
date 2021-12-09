<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'message_id',
        'user_id'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function message ()
    {
        return $this->belongsTo(Message::class);
    }
}
