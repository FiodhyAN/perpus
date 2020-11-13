<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpus extends Model
{
    Protected  $fillable = ['name', 'year', 'author', 'publisher', 'country'];
    Protected $primaryKey = 'id'; 
}
