<!DOCTYPE html>
<html class="h-full bg-gray-50">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body class="h-full">
@inertia
<form action="/logout" method="POST" id="logout-form">
    @csrf
</form>
</body>
</html>
