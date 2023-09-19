<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'short_title',
        'short_description',
        'description',
        'price',
        'purchase_url',
        'product_image',
        'product_gallery',
        'keyword',
        'seo_title',
        'meta_description'
    ];
}
