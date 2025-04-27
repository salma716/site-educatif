<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class season extends Model
{
      protected $table = 'seasons';
      protected $fillable = ['name', 'image_path', 'sound_path'];
}
