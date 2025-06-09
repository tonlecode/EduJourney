<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buddha extends Model
{
    protected $table = 'buddha';

protected $fillable = [
    'id_code',
    'youtube_link',
    'name',
    'date',
];

}
