<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'feature_image',
        'categories',
        'tags',
        'meta_key',
        'meta_title',
        'meta_description',
        'created_by',
        'views',
        'status'
    ];
}
