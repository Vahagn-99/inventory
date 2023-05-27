<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Email</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #202123;
        }

        p {
            margin-bottom: 10px;
            color: #202123;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #202123;
            text-decoration: none;
            border-radius: 5px;
            color: #ffef;
        }

        a {
            color: #ffef;
        }

        .button:hover {
            background-color: #202329;
        }

        .signature {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Բարև, {{ $name }}</h1>

    <p>Ձեր ներկայիս գաղտնաբառն է "{{$password}}" դուք կարող եք փոխել այն մուտք գործելուց հետո։</p>

    <p>Խնդրում եմ սեղմել ներքևի հղումը ձեր գրանցումը ավարտելու համար՝</p>

    <p>
        <a href="{{ $registrationLink }}" class="button">Հաստատել</a>
    </p>

    <div class="signature">
        <p>Շնորհակալություն,</p>
        <p>{{ config('app.name') }}</p>
    </div>
</div>
</body>

</html>
