@extends('layout.main') {{-- pobiera layout main i wkleja do tego blade'a --}}

@section('title', 'użytkownik')

@section('sidebar')
    @parent
    To jest sidebar dziecka
@endsection

@section('content')
    <hr>

    <ul>
        <li>Id: {{ $user['id'] }}</li>
        <li>Imię: {{ $user['firstName'] }}</li>
        <li>Nazwisko: {{ $user['lastName'] }}</li>
        <li>Miasto: {{ $user['city'] }}</li>
        <li>Wiek: {{ $user['age'] }}</li>
    </ul>

    <div>
        {{ $user['html'] }}
    </div>

    {{-- <div>
        {!! $user['html'] !!}  {{-- trzeba uważać na tą konstrukcję ze względów bezpieczeństwa, ona pozwala na renderowanie np. JS --}}
    {{--</div> --}}
    <hr>
@endsection

