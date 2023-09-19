<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realestate extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'title',
        'project_type',
        'type',
        'status',
        'location',
        'description',
        'amenities',
        'layout',
        'specification',
        'surrounding',
        'video_iframe',
        'map_iframe',
        'feature_image',
        'banner_images',
        'gallery'
    ];
}
