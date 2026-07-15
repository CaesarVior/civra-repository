<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .container{
            width:90%;
            max-width:1000px;
            margin:40px auto;
        }

        h1{
            text-align:center;
            margin-bottom:30px;
        }

        .card-container{
            display:flex;
            justify-content:space-between;
            gap:20px;
            margin-bottom:40px;
        }

        .card{
            flex:1;
            background:white;
            border-radius:10px;
            padding:20px;
            text-align:center;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
        }

        .card h2{
            margin-bottom:10px;
        }

        .card p{
            font-size:35px;
            color:blue;
            font-weight:bold;
        }

        .menu{
            display:flex;
            justify-content:center;
            gap:20px;
        }

        .menu a{
            text-decoration:none;
            padding:12px 20px;
            background:blue;
            color:white;
            border-radius:8px;
        }

        .menu a:hover{
            background:darkblue;
        }
    </style>

</head>
<body>

<div class="container">

    <h1>Dashboard Admin</h1>

    <div class="card-container">

        <div class="card">
            <h2>Total User</h2>
            <p>{{ $totalUser }}</p>
        </div>

        <div class="card">
            <h2>Total Role</h2>
            <p>{{ $totalRole }}</p>
        </div>

        <div class="card">
            <h2>Total Event</h2>
            <p>{{ $totalEvent }}</p>
        </div>

    </div>

    <div class="menu">
        <a href="/users">Kelola User</a>
        <a href="/roles">Kelola Role</a>
        <a href="/events">Kelola Event</a>
    </div>

</div>

</body>
</html>