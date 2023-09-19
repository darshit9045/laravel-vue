<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'id',
        'category_id',
        'page_id',
        'name',
        'location',
        'image',
        'description',
        'type',
        'status',
        'project_status'
    ];
}
