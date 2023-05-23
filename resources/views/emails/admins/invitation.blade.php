<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include the Tailwind CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.4/tailwind.min.css"
          integrity="sha512-paVHVRRhdoOu1nOXKnqDC1Vka0nh7FAmU3nsM4n2FKxOQTeF6crMdMfkVvEsuaOXZ6oEAVL5+wLbQcule/Xdag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="w-full max-w-md mx-auto p-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Բարև {{  $name }}</h1>
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <p>Ջեր ներկայիս գաղտնաբառն է "password"<br>դուք կարող եք փոխել այն մուտք գործելուց հետո։</p>
        </div>
        <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
           href="{{ $registrationLink }}">Հաստատել</a>
        <p class="mt-4">Շնորհակալություն,<br>{{ config('app.name') }}</p>
    </div>
</div>
</body>
</html>
