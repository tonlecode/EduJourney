<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

protected $fillable = [
        'id_code',
        'title',
        'author',
        'description',
        'file_path',
        'cover_image',
        'page_count',
        'language',
        'image_path'
    ];

}
