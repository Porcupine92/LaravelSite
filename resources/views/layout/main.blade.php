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
        td {
            padding-right: 25px;
        }
    </style>
</head>
<body>
    <h1>{{ $applicationName }}</h1>

    <div class="sidebar">
        @section('sidebar')  {{-- dyrektywa section definiuje jakąś sekcje która można gdzie wkleić w innym blade'ie --}}
            <ul>
                <li><a href="#">...</a></li>
            </ul>
        @show  {{-- dyrektywa show to połączenie endsection i yield, zarazem zamyka sekcje i ją pokazuje --}}

    </div>
    <div class="container">
        @yield('content') {{-- wyświetla zawartość sekcji o podanej nazwie --}}
    </div>
</body>
</html>
