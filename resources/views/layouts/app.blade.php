<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f1f5f9;
        }

        .navbar {
            background: #1e3a8a;
            padding: 15px;
            color: white;
        }

        .navbar a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }

        .card-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            color: white;
            background: linear-gradient(to right, #3b82f6, #1e3a8a);
        }

        .btn {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .btn-add { background: #2563eb; }
        .btn-edit { background: #facc15; color:black; }
        .btn-delete { background: #ef4444; }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #1e3a8a;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .box {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="/admin">Dashboard</a>
    <a href="/admin/jasa">Jasa</a>
    <a href="/admin/kategori">Kategori</a>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>