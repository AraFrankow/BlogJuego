<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} :: Proyecto Da Vinci</title>
    <link rel="stylesheet" href="{{ url ('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url ('css/style.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Proyecto Da Vinci</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
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
                    </ul>
                </div>
            </div>
        </nav>
        <main class="p-4">
            {{ $slot }}
        </main>
        <footer class="footer text-bg-dark text-center">
            <p>Copyright &copy; Da Vinci 2025</p>
        </footer>
    </div>
    
    
    
    
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
</body>
</html>