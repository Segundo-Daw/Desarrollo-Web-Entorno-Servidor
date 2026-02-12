<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Log;

class JournalistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

   

    /**
     * Store a newly created resource in storage.
     * Devuelve JSON con el journalist creado
     * $request contiene el JSON de la petición POST
     */
    public function store(Request $request)
    {
        $errors = false;

        //validaciones
        if(!isset($request->name)){
            $errors=true;
        }else if(!isset($request->password)){
            $errors=true;
        }

        if(!$errors){
            $j = new Journalist($request->all());
            //ver si esta mal
            $j->save();
            return response()->json($j);
        }else{
            return response()->json([
                "message" => "error",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
       
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 1. Busco el journalist cone se id
        $j = Journalist::find($id);
        if( $j != null){
            // 2. Devuelvo en formato Json
            return response()->json([
                "message" =>"Journalist found",
                "data" => $j
            ]); //código 200
        }else{
            return response()->json([
                "message" =>"not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $j = Journalist::find($id);
        if($j != null){
            $j->name= $request->name; 
            $j->surname= $request->surname;
            $j->email= $request->email;
            $j->update();
            return response()->json([
                "message" =>"Update",
                "data" => $j
            ]); //200 ok
        }else{
            return response()->json([
                "message" =>"not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }

    /**
     * Remove the specified resource from storage.
     * Cuando lo elimino , devuelvo codigo 200 y el json con el preiodista eliminado
     * Si no existe ese id, error 404
     */
    public function destroy(string $id)
    {
        $j = Journalist::find($id);

        if($j != null){
            $j->delete();
            return response()->json([
                "message" =>"Deleted",
                "data" => $j
            ]); //200 ok
        }else{
            return response()->json([
                "message" =>"not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }


    //Para las búsquedas
    public function search(Request $request){
        Log::channel('stderr')->debug("VARIBLES DE BÚSQUEDA", [$request->name]);
        
        //Buscar por nombre en la base de datos
        //SELECT * from journalists WHERE name = ?
        /*
        if(isset($request->name)){
            $journalists = Journalist::where('name', $request->name)->get();
            return response()->json($journalists);
        }

        //buscar por email
        if(isset($request->email)){
            $journalists = Journalist::where('email', $request->email)->get();
            return response()->json($journalists);
        }*/

        if(isset($request->minreaders) && isset($request->maxreaders)){
            $articles = Article::where('readers', '>=', $request->minreaders)->where('readers', '<=', $request->maxreaders)->get();
            return response()->json($articles);
        }

        if(isset($request->minreaders)){
            //Quiero devovler los artículos que tengan más de minReader readers
            $articles = Article::where('readers', '>=', $request->minreaders)->get();
            return response()->json($articles);
        }

        //buscar periodistas por nombre y por email
        //.../search?name=XXXXX&email=YYYYY
        if(isset($request->name)&& isset($request->email)){
            $journalists = Journalist::where('name', $request->name)
            ->where('email', $request->email)
            ->get();
            return response()->json($journalists);
        }

        //buscar periodistas por nombre o por email (->orwhere)
        //.../search?name=XXXXX&email=YYYYY
        if(isset($request->name)&& isset($request->surname)){
            $journalists = Journalist::where('name', $request->name)
            ->orwhere('surname', $request->surname)
            ->get();
            return response()->json($journalists);
        }
                
    }
}
