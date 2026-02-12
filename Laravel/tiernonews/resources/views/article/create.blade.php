<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Article</title>
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
            <div class="col md-6">
                <form action="{{ route('article.store') }}" method="post">
                    <!-- @csrf Lo que hace es añadir un campo hidden con un token imprescindible para que laravel deje continuar-->
                    @csrf
                    <h4>Formulario Creación Articulos</h4>
                    <!-- Titulo -->
                    <div class="col mb-3">
                        <label for="nombre" class="form-label">TÍTULO</label>
                        <input name="title" type="text" id="nombre" placeholder="Ingrese el título del articulo" 
                        class="form-control">
                    </div>

                    <div class="col mb-3">
                        <label for="lectores" class="form-label">Lectores</label>
                        <input name="readers" type="text" id="lectores" placeholder="Ingrese el número de lectores" 
                        class="form-control">
                    </div>

                    
                    <div class="col mb-3">
                            <label for="journalist_id" >Periodista</label>
                            <select name="journalist_id" id="journalist_id" class="form-select">
                            @foreach ( $journalists as $j )
                                <option value="{{ $j->id }}">
                                    {{ $j->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    


                    <div class="col mb-3">
                        <label for="comentario" class="form-label">ARTÍCULO</label>
                        <textarea
                            class="form-control"
                            id="comentario"
                            name="content"
                            rows="4"
                            placeholder="Comienza a escribir tu articulo..."
                        ></textarea>
                    </div>

                    
                   
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>