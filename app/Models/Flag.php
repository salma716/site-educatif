<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
      
      protected $table = '_flags';
      protected $fillable = ['name', 'image_path', 'sound_path'];
}
