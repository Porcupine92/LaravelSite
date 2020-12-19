@extends('layout.main')

@section('content')
<div style="width: 1000px; height: 1000px; margin: 100px auto; text-align:center;">
    @foreach($gamesList as $game)
    <ul>
        @foreach ($game as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    @endforeach
</div>
@endsection


