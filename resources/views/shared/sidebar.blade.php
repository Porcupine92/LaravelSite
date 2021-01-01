<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>

<div class="sb-sidenav-menu-heading">Użytkownicy</div>
<a class="nav-link" href="{{ route('get.users') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Użytkownicy
</a>

<div class="sb-sidenav-menu-heading">Gry</div>
<a class="nav-link" href="{{ route('games.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.list') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Lista
</a>

<div class="sb-sidenav-menu-heading">Gry Builder</div>
<a class="nav-link" href="{{ route('builder.b.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('builder.b.list') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Lista
</a>
{{-- <a class="nav-link" href="#">
    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
    Dodaj
</a> --}}

<div class="sb-sidenav-menu-heading">Gry Eloquent</div>
<a class="nav-link" href="{{ route('games.e.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.e.list') }}">
    <div class="sb-nav-link-icon"><i class="fab fa-xbox"></i></div>
    Lista
</a>