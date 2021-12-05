<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LikeMessage extends Pivot
{
    use HasFactory;

    protected $table = 'like_messages';

    protected $fillable = [
        'user_id',
        'message_id'
    ];
}
