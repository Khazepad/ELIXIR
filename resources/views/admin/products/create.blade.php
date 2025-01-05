<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Enhanced pixelated styles */
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #4b3619;
            color: #f0f0f0;
            padding: 20px;
            image-rendering: pixelated;
        }
        .container {
            background-color: #2c1e14;
            border: 4px solid #7c4700;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
        }
        h1 {
            color: #ffff;
            margin-bottom: 25px;
            font-size: 28px;
            text-shadow: 3px 3px 0 #000;
            text-align: center;
        }
        .form-group-container {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #3b2a1c;
            border: 2px solid #7c4700;
            box-shadow: 4px 4px 0 #000;
            border-radius: 8px;
        }
        .form-label {
            color: #ffff;
            margin-bottom: 5px;
        }
        .form-control {
            background-color: #1c1108;
            border: 2px solid #7c4700;
            color: #f0f0f0;
            border-radius: 0;
        }
        .form-control:focus {
            background-color: #2c1e14;
            border-color: #ffd700;
            box-shadow: none;
            color: #fff;
        }
        .btn {
            font-size: 14px;
            padding: 10px 20px;
            border: 2px solid;
            border-radius: 5;
            transition: all 0.2s ease;
        }
        .btn-primary {
            background-color: #7c4700;
            border-color: #3b2a1c;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #3b2a1c;
            border-color: #7c4700;
            color: #000;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #000;
        }
        .btn-secondary {
            background-color: #3b2a1c;
            border-color: #7c4700;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #7c4700;
            border-color: #ffd700;
            color: #fff;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #000;
        }
        .alert-danger {
            background-color: #8b0000;
            border-color: #ff0000;
            color: #fff;
            border-radius: 0;
        }
        .file-input {
            background-color: #1c1108;
            border: 2px solid #7c4700;
            color: #f0f0f0;
            padding: 5px;
            width: 100%;
        }
        .file-input::-webkit-file-upload-button {
            background-color: #7c4700;
            border: 2px solid #ffd700;
            color: #fff;
            padding: 5px 10px;
            border-radius: 0;
            cursor: pointer;
        }
        .file-input::-webkit-file-upload-button:hover {
            background-color: #ffd700;
            color: #000;
        }
    </style>
    <!-- Retro pixelated font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Create Product</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="form-group-container">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
            </div>

            <div class="form-group-container">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="form-group-container">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
            </div>

            <div class="form-group-container">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
            </div>

            <div class="form-group-container">
                <label for="category" class="form-label">Category:</label>
                <select id="category" name="category" class="form-control" required>
                    <option value="">Select a category</option>
                    <option value="healing" {{ old('category') == 'healing' ? 'selected' : '' }}>Healing Potions</option>
                    <option value="mana" {{ old('category') == 'mana' ? 'selected' : '' }}>Mana Potions</option>
                    <option value="enhancement" {{ old('category') == 'enhancement' ? 'selected' : '' }}>Enhancement Potions</option>
                    <option value="resistance" {{ old('category') == 'resistance' ? 'selected' : '' }}>Resistance Potions</option>
                    <option value="transformation" {{ old('category') == 'transformation' ? 'selected' : '' }}>Transformation Potions</option>
                </select>
            </div>

            <div class="form-group-container">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" name="image" id="image" class="file-input">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>

    <!-- Bootstrap 5.3.3 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
