<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FlightApiController extends Controller
{
    public function index(){
        $flights = Flight::all();
        if ($flights != null) {
            return response()->json([
                "message" => "OK",
                "data" => $flights 
            ]);
        } else {
            return response()->json([
                "message" => "no flights",
                "data" => null  
            ], JsonResponse::HTTP_NOT_FOUND);   //404
        }
    }


    public function show(string $id){
        // 1. Busco el flight con ese id
        $f = Flight::find($id);
        if( $f != null){
            // 2. Devuelvo en formato Json
            return response()->json([
                "message" =>"Journalist found",
                "data" => $f
            ]); 
        }else{
            return response()->json([
                "message" =>"flight not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }


    public function store(Request $request)
    {
        try {
            $f = Flight::create($request->all());
            return response()->json([
                "message" => "OK",
                "data" => $f
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "ERROR"/* . $e->getMessage()*/,
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
       
    }

    public function search(Request $request){
        if(isset($request->code)){
            $f = Flight::where('code', $request->code)->get();
        return response()->json($f);

        }
    }





}
