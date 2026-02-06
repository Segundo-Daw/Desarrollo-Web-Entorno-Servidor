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
      <div class="col-md-8">

        <!-- Artículo -->
        <article class="card mb-4">
          <div class="card-body">
            <h2 class="card-title">Título del artículo</h2>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi libero magnam voluptates placeat maxime vitae nesciunt voluptatum aut pariatur natus, a optio velit! Ullam nesciunt fugit, dolore quod illum iste.
            </p>
          </div>
          <div class="card-footer text-muted">
            Publicado el 6 Feb 2026
          </div>
        </article>

        <!-- Repetir más artículos -->

        <!-- Paginación -->
        <nav>
          <ul class="pagination">
            <li class="page-item disabled"><a class="page-link">Anterior</a></li>
            <li class="page-item active"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">Siguiente</a></li>
          </ul>
        </nav>

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
