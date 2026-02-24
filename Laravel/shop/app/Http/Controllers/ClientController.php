<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.create');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required",
            "surname"=>"required"
        ]);
        Client::create($request->all());
        return redirect()->route('index');
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
        //Tengo que eliminar los orders asociados a ese client_id
        Log::channel('stderr')->info('destroy', [$id]);
        Order::where('client_id', $id)->delete();

        Client::destroy($id);
        return redirect()->route('index')->with('deleted_client', 'Client deleted successfuly');
    }
}


