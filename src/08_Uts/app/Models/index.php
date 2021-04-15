<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class index extends Model
{
    protected $table = "posts";
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
    ];
}
