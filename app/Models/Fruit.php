<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
      
      protected $table = '_fruits';
      protected $fillable = ['name', 'image_path', 'sound_path'];
}
