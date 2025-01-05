<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #c4c8ac;
            color: #333;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border: 1px solid #0d120e;
            border-radius: 15px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #8B4513;
            font-size: 16px;
            margin-bottom: 15px;
        }
        h1 {
            font-size: 36px;
            color: #fff;
            text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px  1px 0 #000,
                1px  1px 0 #000;
        }
        .order-details, .shipping-details {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .total {
            font-size: 18px;
            color: #2c1810;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #45553d;
            border: 2px solid #e8e9e0;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            padding: 5px 16px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
            min-width: 100px;
        }
        .btn-primary:hover {
            background-color: #6d7e5f;
            border-color: #e8e9e0;
            color: #ffffff;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Order Confirmation</h1>
        
        <div class="order-details">
            <h2>Order Details</h2>
            <p><strong>Order Number:</strong> {{ $order->id }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <div class="shipping-details">
            <h2>Shipping Information</h2>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>City:</strong> {{ $order->city }}</p>
            <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
        </div>

        <h2>Order Items</h2>
        @foreach($order->items as $item)
            <div class="item">
                <p><strong>{{ $item->product->product_name }}</strong></p>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Price: ₾{{ number_format($item->price, 2) }}</p>
                <p>Subtotal: ₾{{ number_format($item->price * $item->quantity, 2) }}</p>
            </div>
        @endforeach
        
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
