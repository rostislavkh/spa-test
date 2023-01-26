<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SPA Test task</title>

        <!-- Style -->
        <link href="{{ mix('css/default.css') }}" rel="stylesheet">

    </head>
    <body id="app">
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
