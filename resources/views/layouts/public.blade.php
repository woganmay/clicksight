<!DOCTYPE html>
<html class="h-full bg-white">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title', 'Untitled Page') - Clicksight</title>
    </head>
    <body class="h-full">
    @yield('content')
    </body>
</html>
