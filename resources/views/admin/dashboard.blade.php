<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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

        .container {
            padding: 40px 20px;
            max-width: 1400px;
            background: transparent;
            border: none;
        }

        h2 {
            color: #fff;
            text-shadow: 
                -1px -1px 0 #000,  
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
            margin-bottom: 25px;
            margin-left: 40px;
            font-size: 36px;
        }
       
        p {
            margin-left: 40px;
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

        .sidebar {
            height: 100%;
            width: 224px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #45553d;
            padding-top: 8px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            border-top-right-radius: 15px; 
            border-bottom-right-radius: 15px;
        }

        .sidebar.collapsed {
            left: -250px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: 0.3s;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .toggle-btn {
            position: fixed;
            left: 260px;
            top: 20px;
            z-index: 1000;
            background-color: #45553d;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .toggle-btn.collapsed {
            left: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .toggle-btn {
                left: 10px;
            }
        }

        .sidebar-brand {
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 20px;
            border-bottom: 2px solid #e8e9e0;
            margin-bottom: 20px;
        }

        .nav-link {
            display: block;
            padding: 15px 25px;
            color: #f5f5f5;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 10px;
            
        }

        .nav-link:hover {
            background-color: #6d7e5f;
            color: #ffffff;
        }

        .logout-section {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 0 25px;
        }

        .dashboard-container {
            display: flex;
            gap: 30px;
            padding: 20px;
        }

        .image-container {
            flex: 0 0 300px; /* Fixed width of 300px */
            margin-right: 20px;
        }

        .content-container {
            flex: 1; /* Takes up remaining space */
        }

        .card {
            background-color: #c0cfb2;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 20px 0;
            transition: transform 0.3s ease;
            max-width: 500px;
            width: 100%;
            
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    
    <div class="sidebar">
        <div class="sidebar-brand">
       <h1> 𝕰𝖑𝖎𝖝𝖎𝖗</h1>
        </div>
        <nav>
        <a href="{{ route('admin.products.index') }}" class="nav-link" style="font-size: 10px;">
            <i class="fas fa-box-open"></i> Manage Products
        </a>
        <a href="{{ route('admin.orders.index') }}" class="nav-link" style="font-size: 10px;">
            <i class="fas fa-shopping-cart"></i> Manage Orders
        </a>
        <a href="{{ route('admin.users.index') }}" class="nav-link" style="font-size: 10px;">
            <i class="fas fa-users"></i> Manage Users
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
        <h2>Admin Dashboard</h2>
        <p>Welcome, {{ Auth::guard('admin')->user()->name }}!</p>
            
            <div class="content-container">
                <div class="card">
                    <img src="{{ asset('images/card.jpg') }}" alt="Card Image" class="card-image">
                    
                </div>
            </div>

            <div class="content-container">
                <div class="card">
                    <div class="card-content" style="font-size: 10px; margin-right: 0px;">
                        <li>Elixirs are magical or medicinal potions often found in fantasy settings. 
                            They are typically used to grant the drinker special abilities, enhance their attributes, or heal ailments.</li>
                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const toggleBtn = document.querySelector('.toggle-btn');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            toggleBtn.classList.toggle('collapsed');
        }
    </script>
</body>
</html>