<!DOCTYPE html>
<html>
<head>
    <title>Manuals</title>
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Manual System</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
