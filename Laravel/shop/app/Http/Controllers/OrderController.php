<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $clients = Client::all();
        return view('index', compact('orders', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $clients = Client::all();
        return view('order.create', compact('orders', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
    
        $order = Order::find($id);
        if($order == null){
            $message = "La orden no existe";
        }else{
            // 2. Eliminamos
            Order::destroy($id);
            $message = "La orden con ID " . $order->id . " eliminado";
        }

        $orders = Order::all();
        return  redirect()->route('index')->with('deleted', $message);
    }
}
