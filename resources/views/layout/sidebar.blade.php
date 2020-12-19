<div class="sidebar">
    @section('sidebar')  {{-- dyrektywa section definiuje jakąś sekcje która można gdzie wkleić w innym blade'ie --}}
        <ul>
            <li><a href="#">...</a></li>
        </ul>
    @show  {{-- dyrektywa show to połączenie endsection i yield, zarazem zamyka sekcje i ją pokazuje --}}
</div>
