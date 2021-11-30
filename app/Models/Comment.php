<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'comment',
        'work_id',
        'parent_id'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
