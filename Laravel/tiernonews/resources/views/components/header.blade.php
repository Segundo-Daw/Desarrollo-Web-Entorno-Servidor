<header>
    <h1 class="text-center fw-bold display-3 py-4">Tierno News</h1>
    <nav  class="navbar navbar-expand-lg navbar-light bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link text-white" href="{{ route('journalist') }}">Inicio</a></li>
            <li class="nav-item active"><a class="nav-link text-white" href="{{ route('journalist.create') }}">CrearPeriodistas</a></li>
            <li class="nav-item active"><a class="nav-link text-white" href="{{ route('article.index') }}">Articulos</a></li>
            <li class="nav-item active"><a class="nav-link text-white" href="{{ route('article.create') }}">CrearArticulo</a></li>
        </ul>
    </nav>
</header>