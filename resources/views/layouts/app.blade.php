<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Elixir')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light" style="background-image: url('path/to/your/background-image.jpg'); background-size: cover; background-position: center;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Back to Products</a></li>
                    
                    
                @else
                    
                @endauth
            </ul>
        </nav>
    </header>    
    <main class="container mt-4">
        @yield('content')
    </main>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; {{ date('Y') }} Elixir. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>