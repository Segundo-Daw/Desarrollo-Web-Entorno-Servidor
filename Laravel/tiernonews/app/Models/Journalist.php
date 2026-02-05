<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FinalClassPass;

class Journalist extends Model
{
    /*
    private int $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    */

    //aqui declaramos los atributos del modelo apra que puedan ser rellenados automáticamente al leer de la base de datos
    //Este fillable lo que hace es crear un constructor que recibe un solo parámetro: un array asociativo con las claves los nombre de los atributos
    protected $fillable =["id", "name", "surname", "email", "password"];

    //Un periodista tiene varios articulos (1-n)
    public function articles(){
        return $this->hasMany(Article::class);
    }

    
    
}
