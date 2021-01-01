@isset($messageData)
    @if ($messageData)
        <div class="alert alert-success" role="alert">
            Profil został wygenerowany pomyślnie
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Nie udało się wygenerować profilu
        </div>
    @endif
@endisset
