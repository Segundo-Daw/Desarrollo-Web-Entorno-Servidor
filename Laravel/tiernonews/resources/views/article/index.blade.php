<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body{
      background: #DED5D3;
    }

  </style>
  
</head>
<body>
  @include("components.header")
  

  <!-- Contenido -->
  <main class="container my-5">
    <div class="row">

      <!-- Artículos -->
      <div class="col md-8">
        @foreach ($articles as $a)
          <div class="card">
            <div class="card-footer text-white text-center bg-dark">
              Articulo
            </div>
            <div class="card-doby">
              <p class="card-title">Título
                {{ $a->title }}
              </p>
              <p class="card-text">
                  <strong>Número de lectores:</strong><br>
                    {{ $a->readers }}
              </p>
              <p class="card-text">
                  <strong>Contenido:</strong><br>
                    {{ $a->content }}
              </p>

              <div class="row">
                <div class="col">
                    <a href= "{{ route('article.edit', $a->id) }}"><button class="btn btn-warning">Editar</button></a>
                </div>
                <div class="col">
                  <form method = "post" action="{{ route('article.destroy', $a->id) }}">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-secondary">Eliminar</button>
                    </form>
                </div>
                <div class="col">
                  <a href= "{{ route('article.show', $a->id) }}"><button class="btn btn-info">Ver</button></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-light text-center py-3 ">
    © 2026 · Mi Blog
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
