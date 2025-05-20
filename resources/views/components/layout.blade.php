<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} :: Blog Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url ('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url ('css/style.css') }}">
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <img src="/img/logo.png" alt="logo de la página" class="logo navbar-brand">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse centrarLogo" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <x-nav-link route="home">Home</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="blog.index">Noticias</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="contact">Contactanos</x-nav-link>
                        </li>
                        @auth
                            <li class="nav-item">
                                <form action="{{ url('/cerrar-sesion') }}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link">
                                        {{ auth()->user()->email }} (Cerrar Sesión)
                                    </button>
                                </form>
                            </li>
                        @else
                        <li class="nav-item">
                            <x-nav-link route="auth.authenticate">Iniciar Sesión</x-nav-link>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="p-4">
            @if(session()->has('feedback.message'))
                <div class="alert alert-{{ session()->get('feedback.type', 'success') }}">
                    {!! session()->get('feedback.message') !!}
                </div>
            @endif
            {{ $slot }}
        </main>
        <footer class="footer navbar-dark text-center">
            <p>Copyright &copy; Arabela Frankow</p>
        </footer>
    </div>
    
    
    
    
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>