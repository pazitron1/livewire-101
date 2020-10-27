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

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/taggle@1.15.0/src/taggle.js" defer></script>

        <livewire:styles />

        <style>
            body: {
                font-family: 'Ninito';
            }

            .taggle_list {
              padding: 0;
              margin: 0;
              line-height: 2.5;
              width: 100%;
            }

            .taggle_input {
              border: none;
              outline: none;
              font-size: 16px;
              font-weight: 300;
            }

            .taggle_list li {
              display: inline;
              vertical-align: baseline;
              white-space: nowrap;
              font-weight: 500;
              margin-bottom: 5px;
            }

            .taggle_list .taggle {
              margin-right: 8px;
              background: #E2E1DF;
              padding: 5px 10px;
              border-radius: 3px;
              position: relative;
              cursor: pointer;
              transition: all .3s;
              -webkit-animation-duration: 1s;
                      animation-duration: 1s;
              -webkit-animation-fill-mode: both;
                      animation-fill-mode: both;
            }

            .taggle_list .taggle_hot {
              background: #cac8c4;
            }

            .taggle_list .taggle .close {
              font-size: 1.1rem;
              position: absolute;
              top: 10px;
              right: 3px;
              text-decoration: none;
              padding: 0;
              line-height: 0.5;
              color: #ccc;
              color: rgba(0, 0, 0, 0.2);
              padding-bottom: 4px;
              display: inline-block;
              opacity: 0;
              pointer-events: none;
              border: 0;
              background: none;
              cursor: pointer;
            }

            .taggle_list .taggle:hover {
              padding: 5px;
              padding-right: 15px;
              background: #ccc;
              transition: all .3s;
            }

            .taggle_list .taggle:hover > .close {
              opacity: 1;
              pointer-events: auto;
            }

            .taggle_list .taggle .close:hover {
              color: #990033;
            }

            .taggle_placeholder {
              color: #CCC;
              top: 24px;
              left: 16px;
              transition: opacity, .25s;
              -webkit-user-select: none;
                 -moz-user-select: none;
                  -ms-user-select: none;
                      user-select: none;
            }

            .taggle_input {
              padding: 8px;
              padding-left: 0;
              margin-top: -5px;
              background: none;
              max-width: 100%;
            }

            .taggle_sizer {
              padding: 0;
              margin: 0;
              position: absolute;
              top: -500px;
              z-index: -1;
              visibility: hidden;
            }
        </style>
    </head>
    <body>
        <div class="container max-w-7xl mx-auto">
            <h2 class="text-lg font-semibold mt-4">Events example with Tags</h2>
            <livewire:tags-component/>
            </div>
        </div>
        <livewire:scripts />
    </body>
</html>
