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
    <h2>Journalists</h2>
    <p class="bg-info">Estos son las y los periodistas de mi BD</p>
    <!-- Con las dos llaves lo que hacemos es acceder a la variable y leer su contenido-->
    @foreach ($journalists as $j)
        <div class="container">
            <div class="row">
                <div class="col mt-3 bg-light">
                    <p>Nombre: {{$j->name }}</p>
                    <p>Apellido: {{$j->surname }}</p>
                    <p>Email: {{$j->email }}</p>
                    <p>Contraseña:{{$j->password }}</p>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>