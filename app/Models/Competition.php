<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'lokasi',
        'thumbnail',
        'link_website',
        'buku_panduan',
        'date_start',
        'date_end',
    ];
}
