<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href={{ asset('css/app.css') }}>


    <title>Posty</title>
</head>
<body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="/">Home</a>
            </li>
            <li class="p-3" >
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3" >
                <a href="{{ route('posts') }}">Posts</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li class="p-3">
                    <a href="">
                        {{ auth()->user()->name }}
                    </a>
                </li>
                <li class="p-3" >
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit" href="{{ route('login') }}">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="p-3" >
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li class="p-3" >
                    <a href="{{ route('login') }}">Login</a>
                </li>
            @endguest
            
            
        </ul>
    </nav>

    @yield('content')
</body>
</html>