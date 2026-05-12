<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fb;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            background:white;
            padding:20px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .logo{
            font-size:24px;
            font-weight:bold;
            color:#2563eb;
        }

        .menu{
            display:flex;
            gap:20px;
        }

        .menu a{
            text-decoration:none;
            color:#333;
            font-weight:600;
        }

        .profile{
            background:#2563eb;
            color:white;
            padding:10px 18px;
            border-radius:30px;
        }

        /* HERO */

        .hero{
            margin:40px;
            background:linear-gradient(90deg,#2563eb,#1d4ed8);
            border-radius:25px;
            padding:50px;
            color:white;
        }

        .hero h1{
            font-size:42px;
            margin-bottom:10px;
        }

        .hero p{
            opacity:0.9;
        }

        /* CARD */

        .cards{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:25px;
            margin:40px;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .card h3{
            color:#666;
            margin-bottom:15px;
        }

        .card h1{
            color:#2563eb;
            font-size:38px;
        }

        /* TABLE */

        .table-container{
            background:white;
            margin:40px;
            padding:30px;
            border-radius:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

        .table-container h2{
            margin-bottom:25px;
            color:#222;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#2563eb;
            color:white;
            padding:15px;
            text-align:left;
        }

        table td{
            padding:15px;
            border-bottom:1px solid #eee;
        }

        .status{
            padding:8px 14px;
            border-radius:20px;
            color:white;
            font-size:14px;
            font-weight:bold;
        }

        .completed{
            background:green;
        }

        .progress{
            background:orange;
        }

        .pending{
            background:red;
        }

    </style>

</head>
<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">
            JasaKu
        </div>

        <div class="menu">
            <a href="/">Home</a>
            <a href="/dashboard">Dashboard</a>
            <a href="#">History</a>
            <a href="#">Profile</a>
        </div>

        <div class="profile">
            {{ Auth::user()->name }}
        </div>

    </div>

    <!-- HERO -->

    <div class="hero">

        <h1>
            Welcome Back 👋
        </h1>

        <p>
            Kelola booking jasa dan lihat riwayat transaksi Anda dengan mudah.
        </p>

    </div>

    <!-- CARDS -->

    <div class="cards">

        <div class="card">
            <h3>Total Booking</h3>
            <h1>12</h1>
        </div>

        <div class="card">
            <h3>Completed</h3>
            <h1>8</h1>
        </div>

        <div class="card">
            <h3>On Progress</h3>
            <h1>4</h1>
        </div>

    </div>

    <!-- TABLE -->

    <div class="table-container">

        <h2>Booking History</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Date</th>
                <th>Status</th>
                <th>Price</th>
            </tr>

            <tr>
                <td>#BK001</td>
                <td>Service AC</td>
                <td>12 Mei 2026</td>
                <td>
                    <span class="status completed">
                        Completed
                    </span>
                </td>
                <td>Rp 250.000</td>
            </tr>

            <tr>
                <td>#BK002</td>
                <td>Cleaning Rumah</td>
                <td>14 Mei 2026</td>
                <td>
                    <span class="status progress">
                        Progress
                    </span>
                </td>
                <td>Rp 400.000</td>
            </tr>

            <tr>
                <td>#BK003</td>
                <td>Perbaikan Lampu</td>
                <td>16 Mei 2026</td>
                <td>
                    <span class="status pending">
                        Pending
                    </span>
                </td>
                <td>Rp 150.000</td>
            </tr>

        </table>

    </div>

</body>
</html>