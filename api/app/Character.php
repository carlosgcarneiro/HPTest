<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'role_id',
        'house_id',
        'patronus_id',
    ];
}
