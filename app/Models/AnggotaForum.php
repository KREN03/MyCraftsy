<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AnggotaForum extends Pivot
{
    use HasFactory;

    protected $table = 'anggota_forums';

    protected $fillable = [
        'user_id',
        'forum_id'
    ];
}
