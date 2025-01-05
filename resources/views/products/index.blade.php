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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #fbfbfb; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #fff; /* Text color */
            margin-bottom: 25px; /* Space below the heading */
            font-size: 36px; /* Adjust the font size as needed */
            text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px  1px 0 #000,
                1px  1px 0 #000; /* Black text stroke effect */
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

        .btn-custom, .btn-secondary, .btn-warning, .btn-danger, .btn-success, .btn-primary {
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

        .btn-custom:hover, .btn-secondary:hover, .btn-warning:hover, .btn-danger:hover, .btn-success:hover, .btn-primary:hover {
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

        /* Add these new styles */
        .input-group .form-control,
        .input-group .btn {
            border-radius: 4px; /* Reduced border radius */
        }

        .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        /* Price styling */
        .price {
            font-size: 18px;
            color: #2c1810;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Stock indicator */
        .stock-indicator {
            background: #f8f9fa;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            margin: 10px 0;
        }

        /* Quantity input styling */
        .quantity-input {
            width: 80px !important;
            text-align: center;
            margin-right: 10px;
        }

        .navbar {
           
            background-color: #7c4700;
            border-radius: 10px;
            margin-top: -10px;
            height: 60px;
            width: 102%;
            margin-left: -14px;
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white */
            color: #ffffff !important; /* Ensure text remains visible */
            transition: all 0.3s ease; /* Smooth transition effect */
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #ffffff !important;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        .dropdown-menu {
            padding: 0.5rem 0;
            margin: 0;
            
        }

        .dropdown-divider {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <!-- Add this navbar section before the container -->
    <nav class="navbar navbar-expand-lg" style="background-color: #283618; margin-bottom: 20px;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}" style="color: #f5f5f5; font-size: 25px;">
            𝕰𝖑𝖎𝖝𝖎𝖗
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}" style="color: #f5f5f5; font-size: 12px; margin-right: 15px;">
                            <i class="fas fa-shopping-cart me-1"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center">
                        @if(Auth::user()->profile_image)
                            <img src="{{ Storage::url(Auth::user()->profile_image) }}" 
                                 alt="Profile" 
                                 class="rounded-circle me-2"
                                 style="width: 32px; height: 32px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" 
                                 alt="Profile" 
                                 class="rounded-circle me-2"
                                 style="width: 32px; height: 32px; object-fit: cover;">
                        @endif
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false" style="color: #f5f5f5; font-size: 12px;">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" 
                            style="background-color: #283618; border: 2px solid #283618 ;">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}" 
                                   style="color: #f5f5f5; font-size: 12px;">Profile</a>
                            </li>
                            <li class="dropdown-divider" style="border-color: #f5f5f5 ;"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}" 
                                   style="color: #f5f5f5; font-size: 12px;">Dashboard</a>
                            </li>
                            <li><hr class="dropdown-divider" style="border-color: #f5f5f5 ;"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" 
                                            style="color: #f5f5f5; font-size: 12px;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
       

        <!-- Category Filter Buttons -->
        <div class="mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-custom {{ !request('category') ? 'active' : '' }}">All</a>
            <a href="{{ route('products.index', ['category' => 'healing']) }}" class="btn btn-custom {{ request('category') == 'healing' ? 'active' : '' }}">Healing</a>
            <a href="{{ route('products.index', ['category' => 'mana']) }}" class="btn btn-custom {{ request('category') == 'mana' ? 'active' : '' }}">Mana</a>
            <a href="{{ route('products.index', ['category' => 'enhancement']) }}" class="btn btn-custom {{ request('category') == 'enhancement   ' ? 'active' : '' }}">Enhancement</a>
            <a href="{{ route('products.index', ['category' => 'resistance']) }}" class="btn btn-custom {{ request('category') == 'resistance' ? 'active' : '' }}">Resistance</a>
            <a href="{{ route('products.index', ['category' => 'transformation']) }}" class="btn btn-custom {{ request('category') == 'transformation' ? 'active' : '' }}">Transformation</a>
        </div>
        
        <!-- Keep existing search if you have one -->
        <div class="col-md-6">
            <form action="{{ route('products.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search products...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-seacrh" style="background-color: #283618; color: white;">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Display success message if available -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- List of products -->
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="product-img">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <div class="price">₾{{ number_format($product->price, 2) }}</div>
                        <div class="stock-indicator">
                            Stock: <strong>{{ $product->stock }}</strong>
                        </div>
                        <div class="product-description">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-0">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form d-flex align-items-center justify-content-center">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                   class="form-control quantity-input">
                            <button type="submit" class="btn btn-primary" style="background-color: #283618; color: white;">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-cart-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                alert(response.message);
                // You can update a cart icon or counter here if needed
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>
</body>
</html>
