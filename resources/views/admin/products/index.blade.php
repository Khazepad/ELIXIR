<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Pixel Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #fbfbfb; /* Background color */
            color: #333;
            margin: 0;
            padding: 20px; /* Padding around the body */
        }


        h5 {
            font-size: 12px;
        }

        .message, .error {
            font-weight: bold;
            margin-bottom: 15px; /* Space below the message */
        }

        .error {
            color: red;
        }

        .product-img {
            max-width: 35%;
            height: auto;
            image-rendering: pixelated; /* Pixelate image */
            display: block;
            margin: 0 auto 10px; /* Center the image and add bottom margin */
        }

        .btn-custom, .btn-warning, .btn-danger, .btn-success, .btn-primary {
            background-color: #7c4700;
            border: 2px solid #3b2a1c;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            padding: 5px 16px;
            margin: 5px 0 5px 10px; /* Add left margin for spacing */
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        .btn-custom:hover, .btn-warning:hover, .btn-danger:hover, .btn-success:hover, .btn-primary:hover {
            background-color: #3b2a1c;
            border-color: #7c4700;
            color: #ffffff;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .btn-custom:active, .btn-secondary:active, .btn-warning:active, .btn-danger:active, .btn-success:active, .btn-primary:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: transparent;
            border: 2px solid #f5f5f5;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: none;
            font-size: 12px;
            padding: 5px 16px;
            margin: 5px 0 5px 10px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
            color: #ffffff;
            box-shadow: none;
    
        }

        /* Ensuring consistent button size for alignment */
        .btn { 
            min-width: 100px; /* Set a minimum width for alignment */
        }

        .alert-success {
            font-family: 'Press Start 2P', cursive;
            font-size: 14px;
            background-color: #d4edda; /* Light green background for success */
            border: 1px solid #c3e6cb; /* Green border */
            color: #155724; /* Dark green text color */
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 5 cards per row */
            gap: 15px; /* Space between cards */
            padding: 5px 0; /* Padding to ensure content isn't flush against edges */
        }

        .card {
            border: 2px solid #000; /* Reduced border width from 3px to 2px */
            background: #fff;
            border-radius: 10px; /* Reduced border radius from 15px to 10px */
            height: auto;
            transition: transform 0.2s ease-in-out;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); /* Reduced shadow spread */
            max-width: 295px; /* Added max-width to control card size */
            margin: 0 auto; /* Center the card in its column */
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 9px 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        .card-body {
            padding: 20px;
            font-size: 12px; /* Slightly larger font */
        }

        .card-title {
            font-size: 16px;
            color: #8B4513;
            margin-bottom: 15px;
        }

        .product-img {
            max-width: 80%; /* Larger images */
            height: 200px; /* Fixed height for consistency */
            object-fit: contain; /* Maintain aspect ratio */
            padding: 15px;
        }

        .product-description {
            font-size: 11px;
            height: auto;
            max-height: 100px;
            overflow-y: auto;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
        }

        .card-footer {
            background: #7c4700;
            padding: 15px;
            border-top: none;
        }

        .card-footer .form-control {
            width: 60px !important;
            display: inline-block;
            margin-right: 10px;
            text-align: center;
        }

        .card-footer .btn-primary {
            background: #3b2a1c;
            border: none;
            padding: 8px 15px;
            font-size: 11px;
        }

        .container {
            max-width: 1400px;
            padding: 20px 20px;
        }

        .form-control {
            font-family: 'Press Start 2P', cursive; 
            font-size: 12px; /* Smaller font size */
            padding: 3px; /* Reduced padding */
            border-width: 2px;
            margin-bottom: 8px; /* Reduced space below the input field */
            max-width: 500px; /* */
        }

        .form-inline .form-control {
            margin-right: 10px; /* Space to the right of input fields */
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .left-buttons .btn,
        .right-buttons .btn {
            margin-right: 15px;
        }

        .right-buttons .btn:last-child {
            margin-right: 0;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .btn-custom.active {
            background-color: #3b2a1c;
            border-color: #7c4700;
            color: #ffffff;
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            border-radius: 15px;
        }

        .btn {
            font-family: 'Press Start 2P', cursive;
            font-size: 10px;
            
        }

    
    </style>
</head>
<body>
    <!-- Add this navbar section before the container -->
    <nav class="navbar navbar-expand-lg" style="background-color: #283618; margin-bottom: 20px;">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <!-- Category Filter Buttons -->
        <div class="mb-3">
            <a href="{{ route('admin.products.index') }}" class="btn btn-custom {{ !request('category') ? 'active' : '' }}">All</a>
            <a href="{{ route('admin.products.index', ['category' => 'healing']) }}" class="btn btn-custom {{ request('category') == 'healing' ? 'active' : '' }}">Healing</a>
            <a href="{{ route('admin.products.index', ['category' => 'mana']) }}" class="btn btn-custom {{ request('category') == 'mana' ? 'active' : '' }}">Mana</a>
            <a href="{{ route('admin.products.index', ['category' => 'enhancement']) }}" class="btn btn-custom {{ request('category') == 'enhancement   ' ? 'active' : '' }}">Enhancement</a>
            <a href="{{ route('admin.products.index', ['category' => 'resistance']) }}" class="btn btn-custom {{ request('category') == 'resistance' ? 'active' : '' }}">Resistance</a>
            <a href="{{ route('admin.products.index', ['category' => 'transformation']) }}" class="btn btn-custom {{ request('category') == 'transformation' ? 'active' : '' }}">Transformation</a>
        </div>

        <!-- Updated button container with logout -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
                
            </div>
        </div>

        <!-- Display success message if available -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search products...">
                <button type="submit" class="btn btn-primary" style="margin-left: 50px;">Search</button>
            </div>
        </form>

        <!-- List of products -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        @if ($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="card-img-top product-img">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">₾{{ number_format($product->price, 2) }}</p>
                            <p class="card-text">Stock: {{ $product->stock }}</p>

                            <!-- Product Description -->
                            <div class="product-description">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
