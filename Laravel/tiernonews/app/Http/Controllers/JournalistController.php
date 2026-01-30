<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Buscar todos los Journalist de la bd
        $journalists = Journalist::all();
        //return $journalist;

        // 2. Devolver una vista que los contenga
        //para transofrmar en un array asociativo los journalist usamos COMPACT
        return view('journalist.index', compact("journalists"));


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //devuelve una vista con un formulario de creación
        return view('journalist.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return "Ahora te lo guardo";
        Log::channel('stderr')->debug("Variable request: ", [$request->name,$request->password]);
        $j = new Journalist();
        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "no está hecho";
    }

    /**
     * Show the form for editing the journalist.
     * Va a devolver una vista con un formulario rellenado con los datos del periodista en cuestión, y un botón de Actualizar.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     * recibe en la petición POST (o PUT) los datos del periodista que queremos editar y lo lleva a la bd
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sayName($name){
        return "hola $name";
    }
}
