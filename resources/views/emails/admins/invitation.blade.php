<x-mail::message>
    # Հրավեր

    Դուք հրավերված եք մեր կայքին միանալուն։

    <x-mail::button :url="$registrationLink">
        Ջեր ներկաիս գաղտնաբառն է "password" դուք կարող եք փոխել այն մուտք գործելուց հետո։
        Խնդրում եմ սեղմել ներքևի հղումը ձեր գրանցումը ավարտելու համար՝

    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
