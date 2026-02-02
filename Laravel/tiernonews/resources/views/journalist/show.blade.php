<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background: #DED5D3;
        }
    </style>
</head>
<body>
    @include("components.header")
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card shadow-sm h-100">
                    <div class="card-footer text-center">
                        Periodista
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $journalist->name }} {{ $journalist->surname }}
                        </h5>

                        <p class="card-text">
                            <strong>Email:</strong><br>
                            {{ $journalist->email }}
                        </p>
                        <p class="card-text">
                            <strong>Contraseña:</strong><br>
                            {{ $journalist->password }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


            