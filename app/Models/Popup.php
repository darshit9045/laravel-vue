<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image',
        'description',
        'show_in',
        'show_once',
        'status',
    ];

}
