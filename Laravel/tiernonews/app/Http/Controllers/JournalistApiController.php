<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        $j = new Journalist($request->all());
        $j->save();
        return response()->json($j);
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
}
