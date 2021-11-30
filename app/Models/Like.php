<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'user_id'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
