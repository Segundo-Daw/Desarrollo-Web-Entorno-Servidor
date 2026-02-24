<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected$fillable = ["name", "surname", "age", "nationality", "flight_id"];

    //Un pasajero solo puede tener un vuelo
    public function flight(){
        return $this->belongsTo(Passenger::class);
    }
}
