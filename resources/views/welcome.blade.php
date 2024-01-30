<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://www.reshot.com/preview-assets/icons/CNDE2KHP3S/aerodynamic-plane-CNDE2KHP3S.svg">
        <title>AeroURLS</title>

      @vite('resources/css/app.css')
    </head>
    <body>
        <div id="app"></div>
      @vite('resources/js/app.js')
    </body>
</html>