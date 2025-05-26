<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js') --}}
    @stack('form-styles')
</head>

<body>
    <div class="main-container">
        <div class="main-container-title">
            <h1>Bienvenido a SGTech</h1>
            <p>Tu proceso de contratación inicia aquí, porfavor rellena la <b>Ficha de contratación</b></p>
        </div>
        <div class="main-container-form">
            @yield('content')
        </div>
    </div>
</body>

</html>
