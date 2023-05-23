<x-mail::message>
    # Բարև {{  $name }}
    Ջեր ներկայիս գաղտնաբառն է "password" դուք կարող եք փոխել այն մուտք գործելուց հետո։
    Խնդրում եմ սեղմել ներքևի հղումը ձեր գրանցումը ավարտելու համար՝
    <x-mail::button :url="$registrationLink">
     Հաստատել
    </x-mail::button>
    Շնորհակալություն,<br>
    {{ config('app.name') }}
<x-mail::message>
