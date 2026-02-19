<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
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
        <div class="row">
            <div class="col mt-3 bg-light">
                <form action="{{ route('login.store') }}" method="post">
                     @csrf
                    <h4>Formulario de Login</h4>
                    
                    <!-- Correo -->
                    <div class="col mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input name="email" type="email" id="email" aria-describedby="emailHelp"
                        class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}">
                        @error('email') <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Contraseñas -->
                    <div class="col mb-3">
                        <label for="pass1" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="pass1">
                        @error('password') <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                   
                    <button type="submit" class="btn btn-dark">Enviar</button>

                </form>

            </div>

        </div>
        
        
        




    </div>
</body>
</html>



