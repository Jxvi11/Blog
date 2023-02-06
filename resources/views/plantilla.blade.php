<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <title> @yield('titulo') </title>

</head>
<body>

    @include('partials.nav')

    <div class="card-body d-flex justify-content-between align-items-right">
        <p><p>
        <p>{{ fechaActual('2023/02/06') }}</p>
    </div>

    @yield('contenido')
</body>
</html>
