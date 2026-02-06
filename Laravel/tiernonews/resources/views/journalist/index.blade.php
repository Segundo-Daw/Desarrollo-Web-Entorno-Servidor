<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Journalists</title>
    <style>
        body{
            background: #DED5D3;
        }

    </style>
</head>
<body>
    @include("components.header")
    <!-- Con las dos llaves lo que hacemos es acceder a la variable y leer su contenido-->
    <div class="container">
        
        <div class="row mt-5">
            <div class="col text-center">
                <h2>Journalists</h2>
            </div>
        </div>

        <!-- Para que salga el mensaje de que se ha eliminado correctamente el periodista-->
        <div class="row mt-5">
            <div class="col text-center">
                 @if(@session('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ session('deleted') }}
                    </div>
                @endif
            </div>
        </div>
    

        <div class="row mt-3">
            @foreach ($journalists as $j)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-footer  text-white text-center bg-dark">
                            Periodista
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $j->name }} {{ $j->surname }}
                            </h5>

                            <p class="card-text">
                                <strong>Email:</strong><br>
                                {{ $j->email }}
                            </p>
                            <p class="card-text">
                                <strong>Contraseña:</strong><br>
                                {{ $j->password }}
                            </p>
                            
                            <div class="row">
                                <div class="col">
                                    <a href= "{{ route('journalist.edit', $j->id) }}"><button class="btn btn-warning">Editar</button></a>
                                </div>
                                <div class="col">
                                    <form method = "post" action="{{ route('journalist.destroy', $j->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-secondary">Eliminar</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <a href= "{{ route('journalist.show', $j->id) }}"><button class="btn btn-info">Ver</button></a>
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