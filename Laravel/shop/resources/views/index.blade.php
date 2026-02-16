<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Orders</title>
    <style>
        body{
            background: #124142;
        }

    </style>
</head>
<body>
    @include("components.header")
    <!-- Con las dos llaves lo que hacemos es acceder a la variable y leer su contenido-->
    <div class="container">
        
        <div class="row mt-5">
            <div class="col text-center text-light">
                <h2>Orders Realizadas</h2>
            </div>
        </div>

        <!-- Cards con las ordenes que hay en la base de datos-->
        <div class="row mt-3">
            @foreach ($orders as $order)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-footer  text-white text-center bg-dark">
                            Orden
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>Orden Número:</strong>
                                {{ $order->id }}
                            </h5>

                            <p class="card-text">
                                <strong>Fecha:</strong><br>
                                {{ $order->date }}
                            </p>
                            <p class="card-text">
                                <strong>Product_id:</strong><br>
                                {{ $order->product_id }}
                            </p>
                            <p class="card-text">
                                <strong>Client_id:</strong><br>
                                {{ $order->client_id }}
                            </p>
                            
                            <div class="row">
                                
                                <div class="col">
                                    <form method = "post" action="{{ route('order.destroy', $order->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-secondary">Eliminar</button>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col text-center text-light">
                <h2>Listado de Clientes</h2>
            </div>
        </div>



        <div class="row mt-3">
            @foreach ($clients as $client)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-footer  text-white text-center bg-dark">
                            Clientes
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <strong>ID cliente:</strong>
                                {{ $client->id }}
                            </h5>

                            <p class="card-text">
                                <strong>Nombre:</strong><br>
                                {{ $client->name }}
                            </p>
                            <p class="card-text">
                                <strong>Apellido:</strong><br>
                                {{ $client->surname }}
                            </p>

                            <p class="card-text">
                                <strong>Dirección:</strong><br>
                                {{ $client->address }}
                            </p>
                            
                            
                            <div class="row">
                                
                                <div class="col">
                                    <form method = "post" action="{{ route('client.destroy', $client->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-secondary">Eliminar</button>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </div>
</body>
</html>