<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PassengerApiController extends Controller
{
    public function destroy(string $id)
    {
        $p = Passenger::find($id);

        if($p != null){
            $p->delete();
            return response()->json([
                "message" =>"Ok",
                "data" => $p
            ]); 
        }else{
            return response()->json([
                "message" =>"passenger not deleted",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND); 
        }
    }


    public function update(Request $request, string $id){
        $p = Passenger::find($id);
        if($p != null){
            $p->name= $request->name; 
            $p->surname= $request->surname;
            $p->age= $request->age;
            $p->nationality= $request->nationality;
            $p->update();
            return response()->json([
                "message" =>"ok",
                "data" => $p
            ]); 
        }else{
            return response()->json([
                "message" =>"not update",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);  //404
        }
    }

    public function search(Request $request){
        if(isset($request->age) && isset($request->ageMax)){
            $p = Passenger::where('passengers', '>=', $request->age)->where('passengers', '<=', $request->ageMax)->get();
            return response()->json($p);
        }

    }


}
