<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ["id", "code", "origin", "destination", "planeModel", "date"];

    //Un vuelo puede tener varios parajeros
    public function passengers(){
        return $this->hasMany(Passenger::class);
    }
}
