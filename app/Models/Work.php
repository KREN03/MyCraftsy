<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_sell',
        'price',
        'file',
        'type'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_works');
    }
}
