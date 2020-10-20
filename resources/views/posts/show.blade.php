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
        <div class="max-w-5xl mx-auto">
            <div class="container mb-5">
                <h1 class="text-2xl text-gray-800">{{$post->title}}</h1>
                <p class="text-base text-gray-900 mt-3">{{$post->content}}</p>
            </div>
            <hr>
            <livewire:comments-section :post="$post"/>
        </div>
        <livewire:scripts />
    </body>
</html>
