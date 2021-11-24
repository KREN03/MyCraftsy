<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function work()
    {
        return $this->belongsToMany(Work::class, 'category_works');
    }

    public function competition()
    {
        return $this->hasMany(Competition::class);
    }
}
