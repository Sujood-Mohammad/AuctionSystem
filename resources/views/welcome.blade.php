<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box; /* Ensures padding and borders don't increase element width */
        }
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            overflow-x: hidden; /* Removes horizontal scroll */
        }
        .navbar {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar a {
            margin: 0 10px;
            font-size: 1rem;
            color: #333;
            text-decoration: none;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .welcome-container {
            background-color: #333;
            display: flex;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            border: 1px #333 solid;
        }
        .welcome-text {
            width: 50%;
            padding: 20px;
            color: white;
            font-size: 1.5rem;
            text-align: center;
        }
        .welcome-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .welcome-description {
            font-size: 1.2rem;
            color: wheat;
        }
        .welcome-image {
            width: 50%;
            height: auto;
            max-height: 600px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="antialiased">
    <div class="navbar">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="welcome-container">
        <img src="{{ asset('images/chocolate_cake.jpg') }}" alt="Oriental Sweets" class="welcome-image">
        <div class="welcome-text">
            <div class="welcome-title">Welcome To Oriental Sweets<br> Auction System</div>
            <div class="welcome-description">Join us as a seller or buyer and auction for the most delicious oriental sweets. Enjoy a unique experience and savor the authentic flavors.</div>
        </div>
    </div>
    @include('Layout.footer')

    </body>
</html>

</body>
</html>
