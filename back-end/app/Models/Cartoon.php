<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartoon extends Model
{
    protected $table = 'cartoon';

    protected $fillable = [
        'id_code',
        'youtube_link',
        'name',
        'date',
    ];
}
