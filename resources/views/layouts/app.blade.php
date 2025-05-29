<!DOCTYPE html>
<html>
<head>
    <title>Manuals</title>
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="asset('resources/css/app.css')"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- <script src="https://cdn.tailwindcss.com"></script> -->

         <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

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





   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</body>
</html>
