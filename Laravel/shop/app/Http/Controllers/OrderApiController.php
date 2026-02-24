<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if ($orders != null) {
            return response()->json([
                "message" => "OK",
                "data" => $orders
            ]);
        } else {
            return response()->json([
                "message" => "ERROR",
                "data" => $orders   //es null
            ], JsonResponse::HTTP_NOT_FOUND);   //404
        }
    }


    public function store(Request $request)
    {
        //Si no tiene el campo "date" la pongo al momento actual
        $date = Carbon::now();
        if (!$request->exists('date')) {
            $date = $request->date;
        }
        try {
            $order = Order::create($request->all());
            return response()->json([
                "message" => "OK",
                "data" => $order
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "ERROR"/* . $e->getMessage()*/,
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }


    public function storeNoFillable(Request $request)
    {
        //Si no tiene el campo "date" la pongo al momento actual
        $client = Client::find($request->client_id);
        $product = Product::find($request->product_id);
        $date = Carbon::now();
        if (!$request->exists('date')) {
            $date = $request->date;
        }
        try {
            $order = new Order();
            $order->date = $date;
            $order->client_id = $client->id;
            $order->product_id = $product->id;
            Log::channel('stderr')->info("SOTRE NO FILLABLE: ", [$client, $product, $order]);
            $order->save();
            return response()->json([
                "message" => "OK",
                "data" => $order
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "ERROR" . $e->getMessage(),
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }


    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order != null) {
            Order::destroy($id);
            return response()->json([
                "message" => "OK",
                "data" => $order
            ]);
        } else {
            return response()->json([
                "message" => "ERROR",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

}
