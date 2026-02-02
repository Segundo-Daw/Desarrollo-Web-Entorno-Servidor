<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Journalist</title>
    <style>
        body{
            background: #DED5D3;
        }
    </style>
</head>
<body>
    @include("components.header")
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('journalist.update', $journalist->id)}}" method="post">
                    @csrf
                    @method('put')
                    <h4>Formulario</h4>
                    <!-- Nombre -->
                    <div class="col mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input name="name" type="text" class="form-control" id="nombre"  value="{{ $journalist->name }}" >
                    </div>

                    <!-- Apelllido -->
                    <div class="col mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input name="surname" type="text" class="form-control" id="apellido"  value="{{ $journalist->surname }}" >
                    </div>

                    <!-- Correo -->
                    <div class="col mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $journalist->email }}">
                    </div>

                    <!-- Contraseñas -->
                    <div class="col mb-3">
                        <label for="pass1" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="pass1">
                    </div>

                    <div class="col mb-3">
                        <label for="pass2" class="form-label">Repita la contraseña</label>
                        <input name="password2" type="password" class="form-control" id="pass2">
                    </div>
                   
                    <button type="submit" class="btn btn-dark">Actualizar</button>
                </form>
            </div>
        </div>
    </div>


    
</body>
</html>