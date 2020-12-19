<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', $applicationName)
    </title>
    <style>
        ul {
            list-style: none;
        }
        td {
            padding-right: 25px;
        }
    </style>
</head>
<body>
    <h1>{{ $applicationName }}</h1>

    @include('layout.sidebar')

    <div class="container">
        @yield('content') {{-- wyświetla zawartość sekcji o podanej nazwie --}}
    </div>
</body>
</html>
