<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["id", "name", "surname", "address"];

    //Un cliente puede tener varias ordenes
    public function orders(){
        return $this->hasMany(Order::class);
    }
}



