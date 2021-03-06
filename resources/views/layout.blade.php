<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <ul>
        <li><a href="/">Home</a></li>
        @auth
            <li><a href="#">{{ Auth()->user()->name }}</a></li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
        @guest
            <li><a href="/login">Login</a></li>
        @endguest
    </ul>

    @yield('content')

</body>
</html>
