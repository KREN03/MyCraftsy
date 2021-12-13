<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'thumbnail'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anggota()
    {
        return $this->belongsToMany(User::class, 'anggota_forums')->withTimestamps()->using(AnggotaForum::class);
    }
}
