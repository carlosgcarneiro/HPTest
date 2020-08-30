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

    public function role(){
        return $this->hasOne(Role::class, 'id','role_id');
    }

    public function house(){
        return $this->hasOne(House::class,'id','house_id');
    }

    public function patronus(){
        return $this->hasOne(Patronus::class,'id','patronus_id');
    }
}
