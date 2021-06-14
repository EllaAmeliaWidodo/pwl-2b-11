<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Content as Authenticatabale;


class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'featured_image'
    ];
}
