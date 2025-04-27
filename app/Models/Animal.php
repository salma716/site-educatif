<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    protected $table = '_animals';
    protected $fillable = ['name', 'image_path', 'sound_path'];
}
