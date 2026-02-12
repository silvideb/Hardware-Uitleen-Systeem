<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mijn Website' }}</title>
    
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: #f4f4f4;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ecf0f1;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            flex: 1;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Menu</h2>
        <a href="/">🏠 Home</a>
        <a href="/hardware_items">hardware items</a>
        <a href="/categories">categorie</a>
    </div>

    <div class="content">
        
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Oeps! Er zijn fouten:</strong>
                <ul class="mt-2 list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{ $slot }}
    </div>

</body>
</html>