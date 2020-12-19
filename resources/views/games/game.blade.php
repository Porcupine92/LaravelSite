@extends('layout.main')

@section('content')
<div style="width: 1000px; height: 1000px; margin: 100px auto; text-align:center;">
    <ul>
        @foreach ($game as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endsection
