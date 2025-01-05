<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #c4c8ac;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #fff;
            margin-bottom: 25px;
            font-size: 36px;
            text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px  1px 0 #000,
                1px  1px 0 #000;
        }

        .card {
            border: 1px solid #0d120e;
            background: #fff;
            border-radius: 15px;
            transition: transform 0.2s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 9px 10px rgba(0, 0, 0, 0.3);
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

        .form-control {
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            padding: 3px;
            border-width: 2px;
            margin-bottom: 8px;
        }

        .card-title {
            font-size: 16px;
            color: #8B4513;
            margin-bottom: 15px;
        }

        .price {
            font-size: 18px;
            color: #2c1810;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Shopping Cart</h1>
        
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $details['name'] }}</h5>
                        <div class="price">₾{{ $details['price'] }}</div>
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control d-inline-block" style="width: 100px;">
                            <button type="submit" class="btn">Update</button>
                        </form>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
            
            <div class="text-right mt-4">
                <h3 class="price">Total: ₾{{ $total }}</h3>
                <a href="{{ route('checkout') }}" class="btn">Proceed to Checkout</a>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
        
        <a href="{{ route('products.index') }}" class="btn mt-3">Continue Shopping</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
