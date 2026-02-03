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
        //Para acceder a los campos del formulario, simplemente $request->nombre-del-input
        //equivalente a $request->input(nombre-del-input)
        //Log::channel('stderr')->debug("Variable request: ", [$request->all()]);
        
        $j = new Journalist($request->all());
        Log::channel('stderr')->debug("Variable request: ", [$j->email]);
        //Con la siguiente orden se guarda en la BD:
        $j->save();
        //Para crear el index, tengo qye buscar todos los periodistas en la BD
        $journalists = Journalist::all();
        return view('journalist.index', compact("journalists"));


    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 1. Busco en la BD a ese periodista
        $journalist = Journalist::find($id);

        // 2. Devuelvo una vista con la información del periodista

        return view('journalist.show', compact("journalist"));
    }

    /**
     * Show the form for editing the journalist.
     * Va a devolver una vista con un formulario rellenado con los datos del periodista en cuestión, y un botón de Actualizar.
     */
    public function edit(string $id)
    {
        // 1. Busco el preiodista en la BD
        $journalist = Journalist::find($id);
        // 2. Devuelvo la vista con el formulario de edición
        return view('journalist.edit', compact("journalist"));
        
    }

    /**
     * Update the specified resource in storage.
     * recibe en la petición POST (o PUT) los datos del periodista que queremos editar y lo lleva a la bd
     */
    public function update(Request $request, string $id)
    {
        // Voy a actulizar todo menos la contraseña
        // 1. nusco en la BD el journalist con ese id
        $journalist = Journalist::find($id);
        // 2. Actualizo los campos correspondientes
        $journalist->name= $request->name; //aqui está lo rellenado en el input name
        $journalist->surname= $request->surname;
        $journalist->email= $request->email;

        // 3. Hago el update
        $journalist->update();

        //4. Devuelvo al show
        return view('journalist.show', compact("journalist"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Busco el journalist que voy a eliminar
        $j = Journalist::find($id);
        if($j == null){
            $message = "El periodista no existe";
        }else{
            // 2. Eliminamos
            Journalist::destroy($id);
            $message = "Periodista " . $j->name . "eliminado";
        }
    
        // 3. devolvemos al index con un mensajito
        $journalists = Journalist::all();
        return  redirect()->route('journalist')->with('deleted', $message);
    }

    public function sayName($name){
        return "hola $name";
    }
}
