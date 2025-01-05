<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #c4c8ac;
            color: #333;
            padding: 20px;
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
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            background-color: #45553d;
            border: 2px solid #e8e9e0;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        select {
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            padding: 5px;
            width: 100%;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 16px;
            color: #8B4513;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Checkout</h1>
        
        <div class="row">
            <div class="col-md-6">
                <h2>Order Summary</h2>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $id => $details)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $details['name'] }}</h5>
                                <p class="card-text">Price: ₾{{ $details['price'] }}</p>
                                <p class="card-text">Quantity: {{ $details['quantity'] }}</p>
                            </div>
                        </div>
                    @endforeach
                    <h3>Total: ₾{{ $total }}</h3>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            
            <div class="col-md-6">
                <h2>Shipping Information</h2>
                <form action="{{ route('place.order') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>
                    <h2>Payment Method</h2>
                    <select name="payment_method" required>
                        <option value="">Select a payment method</option>
                        <option value="paypal">PayPal</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                
                </form>
                <form>
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary mt-3">Back to Cart</a>
                </form>
            </div>
            
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
