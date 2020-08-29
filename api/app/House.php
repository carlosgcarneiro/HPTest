<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'potterapi_id',
        'name',
        'school_id',
    ];
}
