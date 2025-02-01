<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smartphone App')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

    @include('layouts.navbar')

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>
