<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>

<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Mój profil
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
