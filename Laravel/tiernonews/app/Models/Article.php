<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $filllable=["id", "title", "content", "readers"];

    //relación 1-n con Journalist
    public function journalist(){
        return $this->belongsTo(Journalist::class);
        
    }

}
