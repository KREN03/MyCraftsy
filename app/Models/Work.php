<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_sell',
        'price',
        'file',
        'type',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_works');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'work_id', 'id')->whereNull('parent_id');
    }
    
    public function likes(){
        return $this->hasMany(Like::class, 'work_id', 'id');
    }

    public function likesChoosed(){
        return Auth::check() ? $this->hasOne(Like::class, 'work_id', 'id')->where('user_id', Auth::user()->id) : $this->hasOne(Like::class, 'work_id', 'id')->where('user_id', -1000);
    }
}
