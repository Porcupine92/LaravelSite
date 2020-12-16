<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="width: 1000px; height: 1000px; margin: 100px auto; text-align:center;">
        @foreach($gamesList as $game)
        <ul>
            @foreach ($game as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        @endforeach
    </div>
</body>
</html>
