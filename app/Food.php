<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'nama', 'foto1', 'foto2', 'foto3', 'exp', 'user_id',
    ];
}
