<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #fbfbfb;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .card {
            background-color: #c0cfb2;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        

        .btn {
            background-color: #45553d;
            border: 2px solid #e8e9e0;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            padding: 5px 16px;
            margin: 5px 0;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #6d7e5f;
            border-color: #e8e9e0;
            color: #ffffff;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: transparent;
            border: 2px solid #f5f5f5;
            border-radius: 8px;
            color: #f5f5f5;
            box-shadow: none;
            font-size: 12px;
            padding: 5px 16px;
        }

        .btn-danger:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
            color: #ffffff;
            box-shadow: none;
        
        }

        .lead {
            font-size: 12px;
            margin: 20px 0;
        }

        .navbar {
            border-radius: 15px;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #45553d;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-link {
            color: #f5f5f5;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            font-size: 12px;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            background-color: #6d7e5f;
            color: #ffffff;
        }

        .main-content {
            margin-left: 250px;
        }

        .sidebar-brand {
            color: #f5f5f5;
            font-size: 16px;
            padding: 10px 15px;
            margin-bottom: 20px;
            text-align: center;
        }

       .elixir {
        font-size: 30px;
        font-weight: bold;
       }

       .logout-section {
        margin-top: auto;
        padding: 20px;
       }
    </style>
</head>
<body>
    <div class="sidebar">
        <nav>
        <div class="sidebar-brand" style="font-size: 25px; font-weight: bold; margin-right: 10px;">
             <span class="elixir">𝕰𝖑𝖎𝖝𝖎𝖗</span><i class="fas fa-leaf" style="font-size: 40px;"></i>
        </div>
        <a href="{{ route('products.index') }}" class="sidebar-link">
            <i class="fas fa-box"></i> Products
        </a>
        
        </nav>
        <div class="logout-section">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg" style="background-color: #45553d;">
            <div class="container">
                <a class="navbar-brand text-white" href="#">"Elixir: Power in Liquid." 🧪✨</a>
                 
            </div>
        </nav>

        <div class="container py-5">
        <div class="row justify-content-left">


                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-body">
                           
                            <div class="row g-3">
                               <p>Available in a single size that fits all.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>