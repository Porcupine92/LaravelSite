@extends('layout.main') {{-- pobiera layout main i wkleja do tego blade'a --}}

@section('title', 'użytkownik')

@section('sidebar')
    @parent
    To jest sidebar dziecka
@endsection

@section('content')
    <hr>
    <h3>Informacje o użytkowniku</h3>

    @auth
        Informuje nas czy użytkownik jest zalogowany
    @endauth

    @guest
        Użytkownik jest nie zalogowany
    @endguest

    <ul>
        <li>Id: {{ $user['id'] }}</li>
        <li>Imię: {{ $user['firstName'] }}</li>
        <li>Nazwisko: {{ $user['lastName'] }}</li>
        <li>Miasto: {{ $user['city'] }}</li>

        @if ($user['age'] >= 18)
            <li>Wiek: {{ $user['age'] }}. Osoba dorosła</li>
        @elseif ($user['age'] >= 16)
            <li>Wiek: {{ $user['age'] }}. Prawie dorosła</li>
        @else
            <li>Wiek: {{ $user['age'] }}. Nastolatek</li>
        @endif

    </ul>

    <hr>

    @isset($nick)
        Nick: xxx
    @else
        Isset - false
    @endisset

    <hr>

    @empty($nick)
        Empty: true
    @else
        Empty: false
    @endempty
    <hr>

    <div>
        {{ $user['html'] }}
    </div>

    {{-- <div>
        {!! $user['html'] !!}  {{-- trzeba uważać na tą konstrukcję ze względów bezpieczeństwa, ona pozwala na renderowanie np. JS --}}
    {{--</div> --}}
    <hr>
@endsection

