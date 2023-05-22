@component('mail::message')
    # Բարև {{  $name }}
    Ջեր ներկայիս գաղտնաբառն է "password" դուք կարող եք փոխել այն մուտք գործելուց հետո։
    Խնդրում եմ սեղմել ներքևի հղումը ձեր գրանցումը ավարտելու համար՝
    @component('mail::button', ['url' => $registrationLink])
        Հաստատել
    @endcomponent
    Շնորհակալություն,<br>
    {{ config('app.name') }}
@endcomponent
