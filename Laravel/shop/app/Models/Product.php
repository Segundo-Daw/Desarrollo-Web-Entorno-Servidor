<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'price', 'size', 'description'];

    //hasMany order
    public function order(){
        return $this->hasMany(Order::class);
    }


}
