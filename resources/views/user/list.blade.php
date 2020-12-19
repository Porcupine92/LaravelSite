@extends('layout.main')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>User List</h1>

        <table>
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Iteration</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                {{-- Laravel dostarcza zmienną $loop która pomaga odnosić się do poszcególnych
                    właściwości iteracji po tabelach. W dokumentacji wszystkie możliwości --}}
                    @if ($loop->first)
                        <tr>
                            <td>FIRST</td>
                        </tr>
                    @endif
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>Link</td>
                    </tr>
                    @if ($loop->last)
                        <tr>
                            <td>LAST</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <hr>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nick</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">EACH</td>
                    @each('user.listRow', $users, 'userData', 'user.emptyRow')
                {{-- Dyrektywa przechodzi po elementach kolekcji tablicy, działa jak array map z JS.
                    Przechodzi po elementach. Ma 4 elementy, ostatni jest opcjonalny. Pierwszy nazwa szablonu
                    dla każdego elementu, Drugi to kolekcja lub tablica, Trzeci zmienna do której przypisujemy dane
                    z każdej iteracji jak w foreach, zmienna musi być taka sama jak używamy w szablonie.
                    Czwarty element to nazwa szablonu na wypadek pustej tablicy --}}

                    <td colspan="3">FOREACH</td>
                    @foreach ($users as $user)
                        @include('user.listRow', ['userData' => $user])  {{-- include wkleja tu podany szablon --}}
                    @endforeach                     {{-- dobrym zwyczajem jest podawanie danych do includowanego szablonu --}}

                    <td colspan="3">FOR</td>
                    @for ($i = 0; $i < count($users); $i++)

                    {{-- @continue($i == 2) --}}

                    {{-- @if ($i == 1)
                        @continue {{-- kontynuuje iteracje gdy spełniony warunek --}}
                    {{-- @endif --}}
                        @include('user.listRow', ['userData' => $users[$i]])
                    {{-- @if ($i == 3)
                        @break {{-- przerywanie iteracji gdy spełniony warunek --}}
                    {{-- @endif --}}

                    @break($i == 2)

                    @endfor

                    <td colspan="3">FORELSE</td>
                    @forelse ($users as $user) {{-- Foresle to foreach połączony z empty na wypadek gdyby podany obiekt, tablica były puste --}}
                        @include('user.listRow', ['userData' => $user])
                    @empty
                        @include('user.emptyRow')
                    @endforelse

                    <td colspan="3">WHILE</td>
                    @php
                        $j = 0;
                        $count = count($users);
                    @endphp
                    @while ($j < $count)
                        @include('user.listRow', ['userData' => $users[$j]])
                    @php
                        $j++;
                    @endphp
                    @endwhile

                </tr>
            </tbody>
        </table>
        <hr>
        <hr>
    @switch($users)
        @case(1)
            Przypadek pierwszy
            @break
        @case(2)
            Przypadek drugi
            @break
        @default
            Przypadek default
    @endswitch
    </body>
    </html>
@endsection


