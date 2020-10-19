<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <livewire:styles />

        <style>
            body: {
                font-family: 'Ninito';
            }
        </style>
    </head>
    <body>
        <div class="container max-w-7xl mx-auto">
            <h2 class="text-lg font-semibold mt-4">Users table</h2>
            <livewire:data-tables/>
        </div>
        <livewire:scripts />
    </body>
</html>
