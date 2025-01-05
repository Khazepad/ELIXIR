<!DOCTYPE html>
<html>
<head>
    <title>Choose Action - E-Commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #c4c8ac;
            color: #333;
            margin: 0;
            padding: 150px;
        }

        h1 {
            color: #fff;
            margin-bottom: 25px;
            font-size: 36px;
            text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

        .btn {
            background-color: #45553d;
            border: 2px solid #e8e9e0;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            padding: 5px 16px;
            margin: 5px 0 5px 10px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
            min-width: 100px;
        }

        .btn:hover {
            background-color: #6d7e5f;
            border-color: #e8e9e0;
            color: #ffffff;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            padding: 40px 20px;
            max-width: 1400px;
        }

        .card {
            background-color: #45553d;
            border: 2px solid #e8e9e0;
            border-radius: 8px;
            color: #f5f5f5;
            padding: 20px;
            margin: 15px;
            transition: all 0.3s ease;
            text-align: center;
            width: 250px;
        }

        .card:hover {
            background-color: #6d7e5f;
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .card-text {
            font-size: 12px;
            margin-bottom: 20px;
            color: #e8e9e0;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Choose Your Path</h1>
        @guest
            <p class="text-center">Please login or register to continue shopping.</p>
            <div class="cards-container">
                <a href="{{ route('login') }}" class="card-link">
                    <div class="card">
                        <h5 class="card-title">Login</h5>
                        <p class="card-text">Already have an account? Sign in here!</p>
                    </div>
                </a>
                <a href="{{ route('register') }}" class="card-link">
                    <div class="card">
                        <h5 class="card-title">Register</h5>
                        <p class="card-text">New to our store? Create an account!</p>
                    </div>
                </a>
                <a href="{{ route('admin.login') }}" class="card-link">
                    <div class="card">
                        <h5 class="card-title">Admin Login</h5>
                        <p class="card-text">Access administrative features</p>
                    </div>
                </a>
            </div>
        @else
            <p class="text-center">Welcome back, {{ Auth::user()->name }}!</p>
            <div class="cards-container">
                <a href="{{ route('products.index') }}" class="card-link">
                    <div class="card">
                        <h5 class="card-title">Continue Shopping</h5>
                        <p class="card-text">Browse our amazing products</p>
                    </div>
                </a>
                <a href="{{ route('admin.login') }}" class="card-link">
                    <div class="card">
                        <h5 class="card-title">Admin Login</h5>
                        <p class="card-text">Access administrative features</p>
                    </div>
                </a>
            </div>
        @endguest
    </div>
</body>
</html>
