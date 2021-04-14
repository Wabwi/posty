<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Posty</title>
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 mb-6 bg-white flex justify-between">
            <ul class="flex items-center">
                <li><a href="" class="p-3"></a>Home</li>
                <li><a href="" class="p-3"></a>Dashboard</li>
                <li><a href="" class="p-3"></a>Post</li>
            </ul>

            <ul class="flex items-center">
                <li><a href="" class="p-3"></a>Wabwi</li>
                <li><a href="" class="p-3"></a>Login</li>
                <li><a href="{{ route('register') }}" class="p-3"></a>Register</li>
                <li><a href="" class="p-3"></a>Logout</li>
            </ul>

        </nav>
        @yield('content')
        
    </body>
</html>