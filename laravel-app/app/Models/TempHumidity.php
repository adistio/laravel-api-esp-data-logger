<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempHumidity extends Model
{
  use HasFactory;

    protected $table = 'temphumidity';

    protected $fillable = [
        'temperature',
        'humidity',
    ];
}
